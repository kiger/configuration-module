<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

/**
 * Class AnomalyModuleConfigurationCreateConfigurationFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class AnomalyModuleConfigurationCreateConfigurationFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'scope' => 'anomaly.field_type.text',
        'key'   => 'anomaly.field_type.text',
        'value' => 'anomaly.field_type.textarea'
    ];

}
