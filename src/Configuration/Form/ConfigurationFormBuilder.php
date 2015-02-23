<?php namespace Anomaly\ConfigurationModule\Configuration\Form;

use Anomaly\Streams\Platform\Ui\Form\Form;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class ConfigurationFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule\Configuration\Form
 */
class ConfigurationFormBuilder extends FormBuilder
{

    /**
     * The form actions handler.
     *
     * @var string
     */
    protected $actions = [
        'save'
    ];

    /**
     * The form buttons handler.
     *
     * @var string
     */
    protected $buttons = [
        'cancel'
    ];

    /**
     * The form fields handler.
     *
     * @var string
     */
    protected $fields = 'Anomaly\ConfigurationModule\Configuration\Form\ConfigurationFormFields@handle';

    /**
     * Create a new ConfigurationFormBuilder instance.
     *
     * @param Form $form
     */
    public function __construct(Form $form)
    {
        /**
         * Set these explicitly so extending forms won't
         * break automation with normal defaulting patterns.
         */
        $form->setOption('data', 'Anomaly\ConfigurationModule\Configuration\Form\ConfigurationFormData@handle');
        $form->setOption('repository', 'Anomaly\ConfigurationModule\Configuration\Form\ConfigurationFormRepository');
        $form->setOption('wrapper_view', 'anomaly.module.configurations::admin/configurations/form/wrapper');

        parent::__construct($form);
    }

    /**
     * Render the form for editing configuration.
     *
     * @param $entry
     * @param $scope
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function render($entry, $scope)
    {
        $this->form->setOption('scope', $scope);

        return parent::render($entry);
    }
}
