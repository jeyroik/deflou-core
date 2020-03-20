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
    protected string $selfName = 'application';
    protected string $selfSection = 'applications';
    protected string $selfUID = Application::FIELD__NAME;
    protected string $selfItemClass = Application::class;
    protected string $selfRepositoryClass = IApplicationRepository::class;
}
