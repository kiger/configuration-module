<?php namespace Anomaly\ConfigurationModule\Configuration\Contract;

use Anomaly\ConfigurationModule\Configuration\ConfigurationCollection;

/**
 * Interface ConfigurationRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule\ConfigurationInterface\Contract
 */
interface ConfigurationRepositoryInterface
{

    /**
     * Find a configuration by it's key
     * or return a new instance.
     *
     * @param $key
     * @param $scope
     * @return ConfigurationInterface
     */
    public function findOrNew($key, $scope);

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
     * Set a configuration value.
     *
     * @param $key
     * @param $scope
     * @param $value
     * @return $this
     */
    public function set($key, $scope, $value);

    /**
     * Get all configurations for a namespace.
     *
     * @param $namespace
     * @param $scope
     * @return ConfigurationCollection
     */
    public function getAll($namespace, $scope);
}
