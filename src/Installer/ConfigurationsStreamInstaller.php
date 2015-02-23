<?php namespace Anomaly\ConfigurationsModule\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class ConfigurationsStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Configurations\Module\Installer
 */
class ConfigurationsStreamInstaller extends StreamInstaller
{

    /**
     * Stream information.
     *
     * @var array
     */
    protected $stream = [
        'slug'   => 'configurations',
        'locked' => true
    ];

    /**
     * Stream field assignments.
     *
     * @var array
     */
    protected $assignments = [
        'key'   => [
            'required' => true,
            'unique'   => true
        ],
        'value' => []
    ];

}
