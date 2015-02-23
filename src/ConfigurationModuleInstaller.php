<?php namespace Anomaly\ConfigurationModule;

use Anomaly\Streams\Platform\Addon\Module\ModuleInstaller;

/**
 * Class ConfigurationModuleInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule
 */
class ConfigurationModuleInstaller extends ModuleInstaller
{

    /**
     * Installers to run during module installation.
     *
     * @var array
     */
    protected $installers = [
        'Anomaly\ConfigurationModule\Installer\ConfigurationFieldInstaller',
        'Anomaly\ConfigurationModule\Installer\ConfigurationStreamInstaller',
    ];

}
