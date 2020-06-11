<?php
namespace deflou\components\plugins\uninstall;

use deflou\components\applications\ApplicationSample;
use extas\components\plugins\uninstall\UninstallSection;

/**
 * Class UninstallApplicationSamples
 * 
 * @package deflou\components\plugins\uninstall
 * @author jeyroik@gmail.com
 */
class UninstallApplicationSamples extends UninstallSection
{
    protected string $selfRepositoryClass = 'deflouApplicationSampleRepository';
    protected string $selfItemClass = ApplicationSample::class;
    protected string $selfUID = ApplicationSample::FIELD__NAME;
    protected string $selfSection = 'application_samples';
    protected string $selfName = 'application sample';
}
