<?php namespace Anomaly\ConfigurationModule\Configuration;

use Illuminate\Support\Collection;

/**
 * Class ConfigurationCollection
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule\ConfigurationInterface
 */
class ConfigurationCollection extends Collection
{

    /**
     * Create a new ConfigurationCollection instance.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        foreach ($items as $key => $value) {
            $this->items[substr($key, strpos($key, '::') + 2)] = $value;
        }
    }
}
