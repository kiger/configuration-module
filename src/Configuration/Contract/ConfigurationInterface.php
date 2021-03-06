<?php namespace Anomaly\ConfigurationModule\Configuration\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

/**
 * Interface ConfigurationInterface
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
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
}
