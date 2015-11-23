<?php namespace Anomaly\ConfigurationModule\Configuration\Form;

use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationRepositoryInterface;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class ConfigurationFormFields
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule\Configuration\Form
 */
class ConfigurationFormFields implements SelfHandling
{

    /**
     * The config repository.
     *
     * @var Repository
     */
    protected $config;

    /**
     * Create a new ConfigurationFormFields instance.
     *
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * Return the form fields.
     *
     * @param ConfigurationFormBuilder $builder
     */
    public function handle(ConfigurationFormBuilder $builder, ConfigurationRepositoryInterface $configuration)
    {
        $scope     = $builder->getScope();
        $namespace = $builder->getFormEntry() . '::';

        /**
         * Get the fields from the config system. Sections are
         * optionally defined the same way.
         */
        if (!$fields = $this->config->get($namespace . 'configuration/configuration')) {
            $fields = $fields = $this->config->get($namespace . 'configuration', []);
        }

        if ($sections = $this->config->get($namespace . 'configuration/sections')) {
            $builder->setSections($sections);
        }

        /**
         * Finish each field.
         */
        foreach ($fields as $slug => &$field) {

            /**
             * Force an array. This is done later
             * too in normalization but we need it now
             * because we are normalizing / guessing our
             * own parameters somewhat.
             */
            if (is_string($field)) {
                $field = [
                    'type' => $field
                ];
            }

            // Make sure we have a config property.
            $field['config'] = array_get($field, 'config', []);

            // Default the label.
            if (trans()->has(
                $label = array_get(
                    $field,
                    'label',
                    $namespace . 'configuration.' . $slug . '.label'
                )
            )
            ) {
                $field['label'] = trans($label);
            }

            // Default the label.
            $field['label'] = trans(
                array_get(
                    $field,
                    'label',
                    $namespace . 'configuration.' . $slug . '.name'
                )
            );

            // Default the warning.
            if (trans()->has(
                $warning = array_get(
                    $field,
                    'warning',
                    $namespace . 'configuration.' . $slug . '.warning'
                )
            )
            ) {
                $field['warning'] = trans($warning);
            }

            // Default the placeholder.
            $field['config']['placeholder'] = trans(
                array_get(
                    $field,
                    'placeholder',
                    $namespace . 'configuration.' . $slug . '.placeholder'
                )
            );

            // Default the instructions.
            if (trans()->has(
                $instructions = array_get(
                    $field,
                    'instructions',
                    $namespace . 'configuration.' . $slug . '.instructions'
                )
            )
            ) {
                $field['instructions'] = trans($instructions);
            }

            // Get the value defaulting to the default value.
            if ($applied = $configuration->get($namespace . $slug, $scope)) {
                $field['value'] = $applied->getValue();
            } else {
                $field['value'] = array_get($field['config'], 'default_value');
            }
        }

        $builder->setFields($fields);
    }
}
