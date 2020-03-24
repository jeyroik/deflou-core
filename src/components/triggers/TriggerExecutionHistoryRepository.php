<?php
namespace deflou\components\triggers;

use deflou\interfaces\triggers\ITriggerExecutionHistoryRepository;
use extas\components\repositories\Repository;

/**
 * Class TriggerExecutionHistoryRepository
 *
 * @package deflou\components\triggers
 * @author jeyroik <jeyroik@gmail.com>
 */
class TriggerExecutionHistoryRepository extends Repository implements ITriggerExecutionHistoryRepository
{
    protected string $scope = 'deflou';
    protected string $name = 'triggers_execution_histories';
    protected string $pk = TriggerExecutionHistory::FIELD__ID;
    protected string $itemClass = TriggerExecutionHistory::class;
}
