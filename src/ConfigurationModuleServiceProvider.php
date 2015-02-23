<?php namespace Anomaly\ConfigurationModule;

use Illuminate\Support\ServiceProvider;

/**
 * Class ConfigurationModuleServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule
 */
class ConfigurationModuleServiceProvider extends ServiceProvider
{

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        if (app('Anomaly\Streams\Platform\Application\Application')->isInstalled()) {
            $this->app->make('twig')->addExtension(
                $this->app->make('\Anomaly\ConfigurationModule\ConfigurationModulePlugin')
            );
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Anomaly\ConfigurationModule\Configuration\ConfigurationServiceProvider');
    }
}
