<?php
namespace deflou\components\plugins\install;

use deflou\components\triggers\TriggerStateHistory;
use extas\components\plugins\install\InstallSection;

/**
 * Class InstallTriggerStateHistories
 * 
 * @package deflou\components\plugins\install
 * @author jeyroik@gmail.com
 */
class InstallTriggerStateHistories extends InstallSection
{
    protected string $selfRepositoryClass = 'deflouTriggerStateHistoryRepository';
    protected string $selfItemClass = TriggerStateHistory::class;
    protected string $selfUID = TriggerStateHistory::FIELD__ID;
    protected string $selfSection = 'trigger_state_histories';
    protected string $selfName = 'trigger state history';
}
