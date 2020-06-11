<?php
namespace deflou\components\plugins\install;

use deflou\components\applications\ApplicationSample;
use extas\components\plugins\install\InstallSection;

/**
 * Class InstallApplicationSamples
 * 
 * @package deflou\components\plugins\install
 * @author jeyroik@gmail.com
 */
class InstallApplicationSamples extends InstallSection
{
    protected string $selfRepositoryClass = 'deflouApplicationSampleRepository';
    protected string $selfItemClass = ApplicationSample::class;
    protected string $selfUID = ApplicationSample::FIELD__NAME;
    protected string $selfSection = 'application_samples';
    protected string $selfName = 'application sample';
}
