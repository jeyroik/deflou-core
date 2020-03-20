<?php
namespace deflou\components\plugins;

use deflou\components\applications\activities\Activity;
use deflou\interfaces\applications\activities\IActivityRepository;
use extas\components\plugins\PluginInstallDefault;

/**
 * Class PluginInstallActivities
 * 
 * @package deflou\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallActivities extends PluginInstallDefault
{
    protected string $selfRepositoryClass = IActivityRepository::class;
    protected string $selfItemClass = Activity::class;
    protected string $selfUID = Activity::FIELD__NAME;
    protected string $selfSection = 'application_activities';
    protected string $selfName = 'application activity';
}
