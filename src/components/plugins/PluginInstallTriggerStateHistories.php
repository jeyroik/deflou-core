<?php
namespace deflou\components\plugins;

use deflou\components\triggers\TriggerStateHistory;
use deflou\interfaces\triggers\ITriggerStateHistoryRepository;
use extas\components\plugins\PluginInstallDefault;

/**
 * Class PluginInstallTriggerStateHistories
 * 
 * @package deflou\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallTriggerStateHistories extends PluginInstallDefault
{
    protected $selfRepositoryClass = ITriggerStateHistoryRepository::class;
    protected $selfItemClass = TriggerStateHistory::class;
    protected $selfUID = TriggerStateHistory::FIELD__ID;
    protected $selfSection = 'trigger_state_histories';
    protected $selfName = 'trigger state history';
}
