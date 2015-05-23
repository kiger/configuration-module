<?php namespace Anomaly\ConfigurationModule\Configuration;

use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeModifier;
use Illuminate\Config\Repository;

/**
 * Class ConfigurationRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule\ConfigurationInterface
 */
class ConfigurationRepository implements ConfigurationRepositoryInterface
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
     * Create a new ConfigurationRepositoryInterface instance.
     *
     * @param ConfigurationModel $model
     * @param Repository         $config
     */
    public function __construct(ConfigurationModel $model, Repository $config)
    {
        $this->model  = $model;
        $this->config = $config;
    }

    /**
     * Find a configuration by it's key
     * or return a new instance.
     *
     * @param $key
     * @param $scope
     * @return ConfigurationInterface
     */
    public function findOrNew($key, $scope)
    {
        $configuration = $this->model->where('scope', $scope)->where('key', $key)->first();

        if (!$configuration) {
            return $this->model->newInstance();
        }

        return $configuration;
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
        $configuration = $this->model->where('scope', $scope)->where('key', $key)->first();

        if (!$configuration) {
            return $this->config->get($key, $default);
        }

        if (!$field = config(str_replace('::', '::configuration/configuration.', $key))) {
            $field = config(str_replace('::', '::configuration.', $key));
        }

        if (is_string($field)) {
            $field = [
                'type' => $field
            ];
        }

        $type = app(array_get($field, 'type'));

        $modifier = $type->getModifier();

        if ($modifier instanceof FieldTypeModifier) {
            return $modifier->restore($configuration->value);
        }

        return $configuration->value;
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
        $configuration = $this->model->where('scope', $scope)->where('key', $key)->first();

        if (!$configuration) {

            $configuration = $this->model->newInstance();

            $configuration->key   = $key;
            $configuration->scope = $scope;
        }

        if (!$field = config(str_replace('::', '::configuration/configuration.', $key))) {
            $field = config(str_replace('::', '::configuration.', $key));
        }

        if (is_string($field)) {
            $field = [
                'type' => $field
            ];
        }

        $type = app(array_get($field, 'type'));

        $modifier = $type->getModifier();

        if ($modifier instanceof FieldTypeModifier) {
            $value = $modifier->modify($value);
        }

        $configuration->value = $value;

        $configuration->save();

        return $this;
    }

    /**
     * Get all configurations for a namespace.
     *
     * @param $namespace
     * @param $scope
     * @return ConfigurationCollection
     */
    public function getAll($namespace, $scope)
    {
        $configurations = $this->model->where('scope', $scope)->where('key', 'LIKE', $namespace . '::%')->get();

        return new ConfigurationCollection($configurations->lists('value', 'key'));
    }
}
