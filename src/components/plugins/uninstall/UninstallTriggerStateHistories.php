<?php
namespace deflou\components\plugins\uninstall;

use deflou\components\triggers\TriggerStateHistory;
use extas\components\plugins\uninstall\UninstallSection;

/**
 * Class UninstallTriggerStateHistories
 * 
 * @package deflou\components\plugins\uninstall
 * @author jeyroik@gmail.com
 */
class UninstallTriggerStateHistories extends UninstallSection
{
    protected string $selfRepositoryClass = 'deflouTriggerStateHistoryRepository';
    protected string $selfItemClass = TriggerStateHistory::class;
    protected string $selfUID = TriggerStateHistory::FIELD__ID;
    protected string $selfSection = 'trigger_state_histories';
    protected string $selfName = 'trigger state history';
}
