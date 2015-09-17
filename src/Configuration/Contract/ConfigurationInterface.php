<?php namespace Anomaly\ConfigurationModule\Configuration\Contract;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface ConfigurationInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule\ConfigurationInterface\Contract
 */
interface ConfigurationInterface extends EntryInterface
{

    /**
     * Get the key.
     *
     * @return mixed
     */
    public function getKey();

    /**
     * Set the key.
     *
     * @param $key
     * @return $this
     */
    public function setKey($key);

    /**
     * Get the scope.
     *
     * @return mixed
     */
    public function getScope();

    /**
     * Set the scope.
     *
     * @param $scope
     * @return $this
     */
    public function setScope($scope);

    /**
     * Get the value.
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Set the value.
     *
     * @param $value
     * @return $this
     */
    public function setValue($value);

    /**
     * Return the related value
     * field type presenter.
     *
     * @return FieldTypePresenter
     */
    public function value();
}
