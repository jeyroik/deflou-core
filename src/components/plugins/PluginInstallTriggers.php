<?php
namespace deflou\components\plugins;

use deflou\components\triggers\Trigger;
use deflou\interfaces\triggers\ITriggerRepository;
use extas\components\plugins\PluginInstallDefault;

/**
 * Class PluginInstallTriggers
 * 
 * @package deflou\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallTriggers extends PluginInstallDefault
{
    protected string $selfName = 'trigger';
    protected string $selfSection = 'triggers';
    protected string $selfUID = Trigger::FIELD__NAME;
    protected string $selfItemClass = Trigger::class;
    protected string $selfRepositoryClass = ITriggerRepository::class;
}
