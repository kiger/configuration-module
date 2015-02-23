<?php namespace Anomaly\ConfigurationsModule\Configuration;

use Anomaly\ConfigurationsModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\Streams\Platform\Model\Configurations\ConfigurationsConfigurationsEntryModel;

/**
 * Class ConfigurationModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationsModule\ConfigurationInterface
 */
class ConfigurationModel extends ConfigurationsConfigurationsEntryModel implements ConfigurationInterface
{

    /**
     * The cache minutes.
     *
     * @var int
     */
    protected $cacheMinutes = 99999;

}
