<?php
namespace deflou\components\applications\activities;

use deflou\interfaces\applications\activities\IActivitySampleRepository;
use extas\components\repositories\Repository;

/**
 * Class ActivitySampleRepository
 * 
 * @package deflou\components\applications\activities
 * @author jeyroik@gmail.com
 */
class ActivitySampleRepository extends Repository implements IActivitySampleRepository
{
    protected $itemClass = ActivitySample::FIELD__NAME;
    protected $idAs = '';
    protected $pk = ActivitySample::FIELD__NAME;
    protected $name = 'activities_samples';
    protected $scope = 'deflou';
}
