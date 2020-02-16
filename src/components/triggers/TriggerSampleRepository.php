<?php
namespace deflou\components\triggers;

use deflou\interfaces\triggers\ITriggerSampleRepository;
use extas\components\repositories\Repository;

/**
 * Class TriggerSampleRepository
 * 
 * @package deflou\components\triggers
 * @author jeyroik@gmail.com
 */
class TriggerSampleRepository extends Repository implements ITriggerSampleRepository
{
    protected $scope = 'deflou';
    protected $name = 'triggers_samples';
    protected $pk = TriggerSample::FIELD__NAME;
    protected $idAs = '';
    protected $itemClass = TriggerSample::class;
}
