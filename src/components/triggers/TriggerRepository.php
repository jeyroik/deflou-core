<?php
namespace deflou\components\triggers;

use deflou\interfaces\triggers\ITriggerRepository;
use extas\components\repositories\Repository;

/**
 * Class TriggerRepository
 *
 * @package deflou\components\triggers
 * @author jeyroik@gmail.com
 */
class TriggerRepository extends Repository implements ITriggerRepository
{
    protected string $itemClass = Trigger::class;
    protected string $pk = Trigger::FIELD__NAME;
    protected string $name = 'triggers';
    protected string $scope = 'deflou';
}
