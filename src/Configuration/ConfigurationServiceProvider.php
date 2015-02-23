<?php namespace Anomaly\ConfigurationsModule\Configuration;

use Illuminate\Support\ServiceProvider;

/**
 * Class ConfigurationServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationsModule\Configuration
 */
class ConfigurationServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Anomaly\ConfigurationsModule\Configuration\ConfigurationModel',
            'Anomaly\ConfigurationsModule\Configuration\ConfigurationModel'
        );

        $this->app->singleton(
            'Anomaly\ConfigurationsModule\Configuration\Contract\ConfigurationRepositoryInterface',
            'Anomaly\ConfigurationsModule\Configuration\ConfigurationRepository'
        );

        $this->app->register('Anomaly\ConfigurationsModule\Configuration\ConfigurationRouteProvider');
    }
}
