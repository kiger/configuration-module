<?php namespace Anomaly\ConfigurationModule\Configuration\Form;

use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Ui\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Illuminate\Config\Repository;
use Illuminate\Container\Container;

/**
 * Class ConfigurationFormRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule\Configuration\Form
 */
class ConfigurationFormRepository implements FormRepositoryInterface
{

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * The application container.
     *
     * @var Container
     */
    protected $container;

    /**
     * The configurations repository.
     *
     * @var ConfigurationRepositoryInterface
     */
    protected $configurations;

    /**
     * Create a new ConfigurationFormRepositoryInterface instance.
     *
     * @param Repository                       $config
     * @param Container                        $container
     * @param ConfigurationRepositoryInterface $configurations
     */
    public function __construct(
        Repository $config,
        Container $container,
        ConfigurationRepositoryInterface $configurations
    ) {
        $this->config         = $config;
        $this->configurations = $configurations;
        $this->container      = $container;
    }

    /**
     * Find an entry or return a new one.
     *
     * @param $id
     * @return string
     */
    public function findOrNew($id)
    {
        return $id;
    }

    /**
     * Save the form.
     *
     * @param FormBuilder|ConfigurationFormBuilder $builder
     * @return bool|mixed
     */
    public function save(FormBuilder $builder)
    {
        $namespace = $builder->getFormEntry() . '::';

        /* @var FieldType $field */
        foreach ($builder->getFormFields() as $field) {
            $this->configurations->set(
                $namespace . $field->getField(),
                $builder->getScope(),
                $builder->getFormValue($field->getInputName())
            );
        }
    }
}
