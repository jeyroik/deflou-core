<?php
namespace deflou\components\plugins;

use deflou\components\applications\Application;
use deflou\interfaces\applications\IApplicationRepository;
use extas\components\plugins\PluginInstallDefault;

/**
 * Class PluginInstallApplications
 *
 * @package deflou\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallApplications extends PluginInstallDefault
{
    protected $selfName = 'application';
    protected $selfSection = 'applications';
    protected $selfUID = Application::FIELD__NAME;
    protected $selfItemClass = Application::class;
    protected $selfRepositoryClass = IApplicationRepository::class;
}
