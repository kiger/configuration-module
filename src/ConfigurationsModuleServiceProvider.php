<?php namespace Anomaly\ConfigurationsModule;

use Illuminate\Support\ServiceProvider;

/**
 * Class ConfigurationsModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationsModule
 */
class ConfigurationsModuleServiceProvider extends ServiceProvider
{

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        if (app('Anomaly\Streams\Platform\Application\Application')->isInstalled()) {
            $this->app->make('twig')->addExtension($this->app->make('\Anomaly\ConfigurationsModule\ConfigurationModulePlugin'));
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}
