<?php namespace Anomaly\ConfigurationsModule;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

/**
 * Class ConfigurationsModuleInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationsModule
 */
class ConfigurationsModuleInstaller extends ModuleInstaller
{

    /**
     * Installers to run during module installation.
     *
     * @var array
     */
    protected $installers = [
        'Anomaly\ConfigurationsModule\Installer\ConfigurationsFieldInstaller',
        'Anomaly\ConfigurationsModule\Installer\ConfigurationsStreamInstaller',
    ];

}
