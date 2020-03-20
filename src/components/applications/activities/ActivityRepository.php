<?php
namespace deflou\components\applications\activities;

use deflou\interfaces\applications\activities\IActivityRepository;
use extas\components\repositories\Repository;

/**
 * Class ActivityRepository
 *
 * @package deflou\components\applications\activities
 * @author jeyroik@gmail.com
 */
class ActivityRepository extends Repository implements IActivityRepository
{
    protected string $scope = 'deflou';
    protected string $name = 'activities';
    protected string $pk = Activity::FIELD__NAME;
    protected string $idAs = '';
    protected string $itemClass = Activity::class;
}
