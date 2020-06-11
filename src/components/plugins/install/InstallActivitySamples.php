<?php
namespace deflou\components\plugins\install;

use deflou\components\applications\activities\ActivitySample;
use extas\components\plugins\install\InstallSection;

/**
 * Class InstallActivitySamples
 *
 * @package deflou\components\plugins\install
 * @author jeyroik@gmail.com
 */
class InstallActivitySamples extends InstallSection
{
    protected string $selfName = 'application activity sample';
    protected string $selfSection = 'application_activity_samples';
    protected string $selfUID = ActivitySample::FIELD__NAME;
    protected string $selfItemClass = ActivitySample::class;
    protected string $selfRepositoryClass = 'deflouActivitySampleRepository';
}
