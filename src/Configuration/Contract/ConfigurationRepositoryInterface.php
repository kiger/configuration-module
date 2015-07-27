<?php namespace Anomaly\ConfigurationModule\Configuration\Contract;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;
use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface ConfigurationRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule\ConfigurationInterface\Contract
 */
interface ConfigurationRepositoryInterface extends EntryRepositoryInterface
{

    /**
     * Get a configuration value.
     *
     * @param      $key
     * @param      $scope
     * @param null $default
     * @return mixed
     */
    public function get($key, $scope, $default = null);

    /**
     * Get a configuration's raw value.
     *
     * @param      $key
     * @param      $scope
     * @param null $default
     * @return FieldTypePresenter
     */
    public function field($key, $scope, $default = null);

    /**
     * Set a configuration value.
     *
     * @param $key
     * @param $scope
     * @param $value
     * @return $this
     */
    public function set($key, $scope, $value);
}
