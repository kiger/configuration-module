<?php namespace Anomaly\ConfigurationModule\Configuration;

use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\Streams\Platform\Entry\EntryCollection;

/**
 * Class ConfigurationCollection
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule\Configuration
 */
class ConfigurationCollection extends EntryCollection
{

    /**
     * Create a new ConfigurationCollection instance.
     *
     * @param array $items
     */
    public function __construct($items = [])
    {
        /* @var ConfigurationInterface $item */
        foreach ($items as $item) {
            $this->items[$item->getKey() . $item->getScope()] = $item;
        }
    }
}
