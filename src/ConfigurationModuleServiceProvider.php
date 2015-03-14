<?php namespace Anomaly\ConfigurationModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class ConfigurationModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule
 */
class ConfigurationModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugin.
     *
     * @var array
     */
    protected $plugins = [
        'Anomaly\ConfigurationModule\ConfigurationModulePlugin'
    ];

    /**
     * The class bindings.
     *
     * @var array
     */
    protected $bindings = [
        'Anomaly\ConfigurationModule\Configuration\ConfigurationModel' => 'Anomaly\ConfigurationModule\Configuration\ConfigurationModel'
    ];

    /**
     * The singleton bindings.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface' => 'Anomaly\ConfigurationModule\Configuration\ConfigurationRepository'
    ];
}
