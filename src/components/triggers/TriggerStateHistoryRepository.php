<?php
namespace deflou\components\triggers;

use deflou\interfaces\triggers\ITriggerStateHistoryRepository;
use extas\components\repositories\Repository;

/**
 * Class TriggerStateHistoryRepository
 * 
 * @package deflou\components\triggers
 * @author jeyroik@gmail.com
 */
class TriggerStateHistoryRepository extends Repository implements ITriggerStateHistoryRepository
{
    protected string $itemClass = TriggerStateHistory::class;
    protected string $pk = TriggerStateHistory::FIELD__ID;
    protected string $name = 'triggers_state_histories';
    protected string $scope = 'deflou';
}
