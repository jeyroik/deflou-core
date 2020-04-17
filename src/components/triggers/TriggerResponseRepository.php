<?php
namespace deflou\components\triggers;

use deflou\interfaces\triggers\ITriggerResponseRepository;
use extas\components\repositories\Repository;
use deflou\components\triggers\TriggerResponse;

/**
 * Class TriggerResponseRepository
 *
 * @package deflou\components\triggers
 * @author jeyroik@gmail.com
 */
class TriggerResponseRepository extends Repository implements ITriggerResponseRepository
{
    protected string $name = 'triggers_reponses';
    protected string $scope = 'extas';
    protected string $pk = TriggerResponse::FIELD__ID;
    protected string $itemClass = TriggerResponse::class;
}
