<?php
namespace deflou\components\plugins;

use deflou\components\fields\FieldSample;
use deflou\interfaces\fields\IFieldSampleRepository;
use extas\components\plugins\PluginInstallDefault;

/**
 * Class PluginInstallFieldSamples
 *
 * @package deflou\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallFieldSamples extends PluginInstallDefault
{
    protected string $selfName = 'field sample';
    protected string $selfSection = 'field_samples';
    protected string $selfUID = FieldSample::FIELD__NAME;
    protected string $selfItemClass = FieldSample::class;
    protected string $selfRepositoryClass = IFieldSampleRepository::class;
}
