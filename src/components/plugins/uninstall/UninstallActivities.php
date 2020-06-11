<?php
namespace deflou\components\plugins\uninstall;

use deflou\components\applications\activities\Activity;
use extas\components\plugins\uninstall\UninstallSection;

/**
 * Class UninstallActivities
 * 
 * @package deflou\components\plugins\uninstall
 * @author jeyroik@gmail.com
 */
class UninstallActivities extends UninstallSection
{
    protected string $selfRepositoryClass = 'deflouActivityRepository';
    protected string $selfItemClass = Activity::class;
    protected string $selfUID = Activity::FIELD__NAME;
    protected string $selfSection = 'application_activities';
    protected string $selfName = 'application activity';
}
