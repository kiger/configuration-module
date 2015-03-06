<?php namespace Anomaly\ConfigurationModule\Configuration;

use Illuminate\Support\ServiceProvider;

/**
 * Class ConfigurationServiceProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule\Configuration
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
            'Anomaly\ConfigurationModule\Configuration\ConfigurationModel',
            'Anomaly\ConfigurationModule\Configuration\ConfigurationModel'
        );

        $this->app->singleton(
            'Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface',
            'Anomaly\ConfigurationModule\Configuration\ConfigurationRepository'
        );
    }
}
