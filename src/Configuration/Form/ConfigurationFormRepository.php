<?php namespace Anomaly\ConfigurationsModule\Configuration\Form;

use Anomaly\ConfigurationsModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Form\Contract\FormRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Form\Form;
use Illuminate\Config\Repository;
use Illuminate\Container\Container;

/**
 * Class ConfigurationFormRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationsModule\Configuration\Form
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
     * The configurations repository.
     *
     * @var ConfigurationRepositoryInterface
     */
    protected $configurations;

    /**
     * The application container.
     *
     * @var Container
     */
    protected $container;

    /**
     * Create a new ConfigurationFormRepositoryInterface instance.
     *
     * @param Repository                 $config
     * @param Container                  $container
     * @param ConfigurationRepositoryInterface $configurations
     */
    public function __construct(Repository $config, Container $container, ConfigurationRepositoryInterface $configurations)
    {
        $this->config    = $config;
        $this->configurations  = $configurations;
        $this->container = $container;
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
     * @param Form $form
     * @return bool|mixed
     */
    public function save(Form $form)
    {
        $request   = $form->getRequest();
        $namespace = $form->getEntry() . '::';

        foreach ($form->getFields() as $field) {
            $this->configurations->set(
                $namespace . $field->getField(),
                $request->get($field->getInputName())
            );
        }
    }
}
