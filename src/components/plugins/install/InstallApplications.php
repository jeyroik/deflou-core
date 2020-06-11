<?php
namespace deflou\components\plugins\install;

use deflou\components\applications\Application;
use extas\components\plugins\install\InstallSection;

/**
 * Class InstallApplications
 *
 * @package deflou\components\plugins\install
 * @author jeyroik@gmail.com
 */
class InstallApplications extends InstallSection
{
    protected string $selfName = 'application';
    protected string $selfSection = 'applications';
    protected string $selfUID = Application::FIELD__NAME;
    protected string $selfItemClass = Application::class;
    protected string $selfRepositoryClass = 'deflouApplicationRepository';
}
