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
    protected $itemClass = Trigger::class;
    protected $idAs = '';
    protected $pk = Trigger::FIELD__NAME;
    protected $name = 'triggers';
    protected $scope = 'deflou';
}
