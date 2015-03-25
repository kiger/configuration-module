<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleConfiguration_1_0_0_CreateConfigurationStream
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleConfiguration_1_0_0_CreateConfigurationStream extends Migration
{

    /**
     * The stream definition.
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
        'value'
    ];

}
