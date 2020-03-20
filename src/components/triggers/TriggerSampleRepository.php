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
    protected string $scope = 'deflou';
    protected string $name = 'triggers_samples';
    protected string $pk = TriggerSample::FIELD__NAME;
    protected string $idAs = '';
    protected string $itemClass = TriggerSample::class;
}
