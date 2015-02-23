<?php namespace Anomaly\ConfigurationsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

/**
 * Class ConfigurationsModule
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Configurations\Module
 */
class ConfigurationsModule extends Module
{

    /**
     * The module navigation.
     *
     * @var string
     */
    protected $navigation = 'streams::navigation.system';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'configurations'
    ];

}
