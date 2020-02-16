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
    protected $scope = 'deflou';
    protected $name = 'activities';
    protected $pk = Activity::FIELD__NAME;
    protected $idAs = '';
    protected $itemClass = Activity::class;
}
