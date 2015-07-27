<?php namespace Anomaly\ConfigurationModule\Configuration;

use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
use Anomaly\Streams\Platform\Entry\EntryRepository;
use Illuminate\Config\Repository;

/**
 * Class ConfigurationRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule\ConfigurationInterface
 */
class ConfigurationRepository extends EntryRepository implements ConfigurationRepositoryInterface
{

    /**
     * The configuration model.
     *
     * @var ConfigurationModel
     */
    protected $model;

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The field type collection.
     *
     * @var FieldTypeCollection
     */
    protected $fieldTypes;

    /**
     * Create a new ConfigurationRepositoryInterface instance.
     *
     * @param ConfigurationModel  $model
     * @param Repository          $config
     * @param FieldTypeCollection $fieldTypes
     */
    public function __construct(ConfigurationModel $model, Repository $config, FieldTypeCollection $fieldTypes)
    {
        $this->model      = $model;
        $this->config     = $config;
        $this->fieldTypes = $fieldTypes;
    }

    /**
     * Get a configuration value.
     *
     * @param      $key
     * @param      $scope
     * @param null $default
     * @return mixed
     */
    public function get($key, $scope, $default = null)
    {
        /* @var ConfigurationInterface $configuration */
        $configuration = $this->model->where('scope', $scope)->where('key', $key)->first();

        if (!$configuration) {
            return $this->config->get($key, $default);
        } else {
            $value = $configuration->getValue();
        }

        /**
         * Next try and find the field definition
         * from the configurations.php configuration file.
         */
        if (!$field = config(str_replace('::', '::configurations/configurations.', $key))) {
            $field = config(str_replace('::', '::configurations.', $key));
        }

        if (is_string($field)) {
            $field = [
                'type' => $field
            ];
        }

        /**
         * Try and get the field type that
         * the configuration uses. If no exists then
         * just return the value as is.
         */
        $type = $this->fieldTypes->get(array_get($field, 'type'));

        if (!$type instanceof FieldType) {
            return $value;
        }

        $type->setEntry($configuration);

        /**
         * If the type CAN be determined then
         * get the modifier and restore the value
         * before returning it.
         */
        $modifier = $type->getModifier();

        $type->setValue($modifier->restore($value));

        return $type->getPresenter();
    }

    /**
     * Set a configuration value.
     *
     * @param $key
     * @param $scope
     * @param $value
     * @return $this
     */
    public function set($key, $scope, $value)
    {
        /* @var ConfigurationInterface $configuration */
        $configuration = $this->model->where('scope', $scope)->where('key', $key)->first();

        /**
         * If nothing exists yet then
         * create a new instance.
         */
        if (!$configuration && $configuration = $this->model->newInstance()) {
            $configuration
                ->setKey($key)
                ->setScope($scope);
        }

        /**
         * Next try and find the field definition
         * from the configurations.php configuration file.
         */
        if (!$field = config(str_replace('::', '::configurations/configurations.', $key))) {
            $field = config(str_replace('::', '::configurations.', $key));
        }

        if (is_string($field)) {
            $field = [
                'type' => $field
            ];
        }

        /**
         * Try and get the field type that
         * the configuration uses. If no exists then
         * just save the value as it is. If a
         * field type is found then modify the
         * value for storage in the database.
         */
        $type = $this->fieldTypes->get(array_get($field, 'type'));

        if ($type instanceof FieldType) {

            $modifier = $type->getModifier();

            if ($modifier instanceof FieldTypeModifier) {
                $value = $modifier->modify($value);
            }
        }

        $configuration->setValue($value);

        $this->save($configuration);

        return $this;
    }
}
