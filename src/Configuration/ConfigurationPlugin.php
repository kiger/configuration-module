<?php namespace Anomaly\ConfigurationModule\Configuration;

use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;

/**
 * Class ConfigurationPlugin
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule\Configuration
 */
class ConfigurationPlugin extends Plugin
{

    /**
     * The configurations repository.
     *
     * @var ConfigurationRepositoryInterface
     */
    protected $configurations;

    /**
     * Create a new ConfigurationPlugin instance.
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
