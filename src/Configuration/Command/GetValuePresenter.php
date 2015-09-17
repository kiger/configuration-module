<?php namespace Anomaly\ConfigurationModule\Configuration\Command;

use Anomaly\ConfigurationModule\Configuration\Contract\ConfigurationInterface;
use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class GetValuePresenter
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\ConfigurationModule\Configuration\Command
 */
class GetValuePresenter implements SelfHandling
{

    use DispatchesJobs;

    /**
     * The configuration instance.
     *
     * @var ConfigurationInterface
     */
    protected $configuration;

    /**
     * Create a new GetValuePresenter instance.
     *
     * @param ConfigurationInterface $configuration
     */
    public function __construct(ConfigurationInterface $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Handle the command.
     *
     * @return \Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter|mixed|object
     */
    public function handle()
    {
        /* @var FieldType $type */
        if ($type = $this->dispatch(new GetValueFieldType($this->configuration))) {
            return $type->getPresenter();
        }

        return array_get($this->configuration->getAttributes(), 'value');
    }
}
