<?php
namespace deflou\components\plugins\install;

use deflou\components\applications\activities\Activity;
use extas\components\plugins\install\InstallSection;

/**
 * Class InstallActivities
 * 
 * @package deflou\components\plugins\install
 * @author jeyroik@gmail.com
 */
class InstallActivities extends InstallSection
{
    protected string $selfRepositoryClass = 'deflouActivityRepository';
    protected string $selfItemClass = Activity::class;
    protected string $selfUID = Activity::FIELD__NAME;
    protected string $selfSection = 'application_activities';
    protected string $selfName = 'application activity';
}
