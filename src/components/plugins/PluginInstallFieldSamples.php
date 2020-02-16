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
    protected $selfName = 'field sample';
    protected $selfSection = 'field_samples';
    protected $selfUID = FieldSample::FIELD__NAME;
    protected $selfItemClass = FieldSample::class;
    protected $selfRepositoryClass = IFieldSampleRepository::class;
}
