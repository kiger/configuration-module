<?php namespace Anomaly\ConfigurationsModule;

use Anomaly\ConfigurationsModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class ConfigurationModulePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationsModule
 */
class ConfigurationModulePlugin extends Plugin
{

    /**
     * The configurations repository.
     *
     * @var ConfigurationRepositoryInterface
     */
    protected $configurations;

    /**
     * Create a new ConfigurationModulePlugin instance.
     *
     * @param ConfigurationRepositoryInterface $configurations
     */
    public function __construct(ConfigurationRepositoryInterface $configurations)
    {
        $this->configurations = $configurations;
    }

    /**
     * Get the plugin functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('configuration_get', [$this->configurations, 'get'])
        ];
    }
}
