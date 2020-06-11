<?php
namespace deflou\components\plugins\uninstall;

use deflou\components\applications\Application;
use extas\components\plugins\uninstall\UninstallSection;

/**
 * Class UninstallApplications
 *
 * @package deflou\components\plugins\uninstall
 * @author jeyroik@gmail.com
 */
class UninstallApplications extends UninstallSection
{
    protected string $selfName = 'application';
    protected string $selfSection = 'applications';
    protected string $selfUID = Application::FIELD__NAME;
    protected string $selfItemClass = Application::class;
    protected string $selfRepositoryClass = 'deflouApplicationRepository';
}
