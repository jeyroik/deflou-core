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
    protected $selfRepositoryClass = IActivityRepository::class;
    protected $selfItemClass = Activity::class;
    protected $selfUID = Activity::FIELD__NAME;
    protected $selfSection = 'application_activities';
    protected $selfName = 'application activity';
}
