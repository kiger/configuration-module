<?php namespace Anomaly\ConfigurationModule\Configuration;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class ConfigurationRouteProvider
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule\Configuration
 */
class ConfigurationRouteProvider extends RouteServiceProvider
{

    /**
     * Map the system configuration routes.
     *
     * @param Router $router
     */
    public function map(Router $router)
    {
        $router->any(
            'admin/configurations',
            function () {
                return redirect('admin/configurations/streams');
            }
        );

        $router->any(
            'admin/configurations/{addon}',
            'Anomaly\ConfigurationModule\Http\Controller\Admin\ConfigurationsController@edit'
        );
    }
}
