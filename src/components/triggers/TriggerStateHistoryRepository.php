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
    protected $itemClass = TriggerStateHistory::class;
    protected $idAs = '';
    protected $pk = TriggerStateHistory::FIELD__ID;
    protected $name = 'triggers_state_histories';
    protected $scope = 'deflou';
}
