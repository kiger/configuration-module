<?php namespace Anomaly\ConfigurationModule\Installer;

use Anomaly\Streams\Platform\Field\FieldInstaller;

/**
 * Class ConfigurationFieldInstaller
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Configurations\Module\Installer
 */
class ConfigurationFieldInstaller extends FieldInstaller
{

    /**
     * Fields to install.
     *
     * @var array
     */
    protected $fields = [
        'scope' => [
            'type' => 'anomaly.field_type.text'
        ],
        'key'   => [
            'type' => 'anomaly.field_type.text'
        ],
        'value' => [
            'type' => 'anomaly.field_type.textarea'
        ]
    ];

}
