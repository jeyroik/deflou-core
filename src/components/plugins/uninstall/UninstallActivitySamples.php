<?php
namespace deflou\components\plugins\uninstall;

use deflou\components\applications\activities\ActivitySample;
use extas\components\plugins\uninstall\UninstallSection;

/**
 * Class UninstallActivitySamples
 *
 * @package deflou\components\plugins\uninstall
 * @author jeyroik@gmail.com
 */
class UninstallActivitySamples extends UninstallSection
{
    protected string $selfName = 'application activity sample';
    protected string $selfSection = 'application_activity_samples';
    protected string $selfUID = ActivitySample::FIELD__NAME;
    protected string $selfItemClass = ActivitySample::class;
    protected string $selfRepositoryClass = 'deflouActivitySampleRepository';
}
