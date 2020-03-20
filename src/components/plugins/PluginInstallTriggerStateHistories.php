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
    protected string $selfRepositoryClass = ITriggerStateHistoryRepository::class;
    protected string $selfItemClass = TriggerStateHistory::class;
    protected string $selfUID = TriggerStateHistory::FIELD__ID;
    protected string $selfSection = 'trigger_state_histories';
    protected string $selfName = 'trigger state history';
}
