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
    protected $selfName = 'trigger';
    protected $selfSection = 'triggers';
    protected $selfUID = Trigger::FIELD__NAME;
    protected $selfItemClass = Trigger::class;
    protected $selfRepositoryClass = ITriggerRepository::class;
}
