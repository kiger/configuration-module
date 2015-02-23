<?php namespace Anomaly\ConfigurationsModule\Configuration\Contract;

use Anomaly\ConfigurationsModule\Configuration\ConfigurationCollection;

/**
 * Interface ConfigurationRepositoryInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationsModule\ConfigurationInterface\Contract
 */
interface ConfigurationRepositoryInterface
{

    /**
     * Find a configuration by it's key
     * or return a new instance.
     *
     * @param $key
     * @return ConfigurationInterface
     */
    public function findOrNew($key);

    /**
     * Get a configuration value.
     *
     * @param      $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * Set a configuration value.
     *
     * @param $key
     * @param $value
     * @return $this
     */
    public function set($key, $value);

    /**
     * Get all configurations for a namespace.
     *
     * @param $getNamespace
     * @return ConfigurationCollection
     */
    public function getAll($namespace);
}
