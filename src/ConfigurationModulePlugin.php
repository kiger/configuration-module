<?php namespace Anomaly\ConfigurationModule;

use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class ConfigurationModulePlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule
 */
class ConfigurationModulePlugin extends Plugin
{

    /**
     * The configuration repository.
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
            new \Twig_SimpleFunction('configurations_get', [$this->configurations, 'get']),
            new \Twig_SimpleFunction('configurations_value', [$this->configurations, 'value'])
        ];
    }
}
