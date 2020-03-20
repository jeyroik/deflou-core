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
    protected string $itemClass = ActivitySample::FIELD__NAME;
    protected string $idAs = '';
    protected string $pk = ActivitySample::FIELD__NAME;
    protected string $name = 'activities_samples';
    protected string $scope = 'deflou';
}
