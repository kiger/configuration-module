<?php namespace Anomaly\ConfigurationModule\Installer;

use Anomaly\Streams\Platform\Stream\StreamInstaller;

/**
 * Class ConfigurationStreamInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Configurations\Module\Installer
 */
class ConfigurationStreamInstaller extends StreamInstaller
{

    /**
     * Stream information.
     *
     * @var array
     */
    protected $stream = [
        'slug'   => 'configuration',
        'locked' => true
    ];

    /**
     * Stream field assignments.
     *
     * @var array
     */
    protected $assignments = [
        'scope' => [
            'required' => true
        ],
        'key'   => [
            'required' => true
        ],
        'value' => []
    ];

}
