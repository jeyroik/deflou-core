<?php
namespace deflou\components\plugins;

use deflou\components\fields\types\FieldTypeSample;
use deflou\interfaces\fields\types\IFieldTypeSampleRepository;
use extas\components\plugins\PluginInstallDefault;

/**
 * Class PluginInstallFieldTypeSamples
 *
 * @package deflou\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallFieldTypeSamples extends PluginInstallDefault
{
    protected $selfRepositoryClass = IFieldTypeSampleRepository::class;
    protected $selfItemClass = FieldTypeSample::class;
    protected $selfUID = FieldTypeSample::FIELD__NAME;
    protected $selfSection = 'field_type_samples';
    protected $selfName = 'field type sample';
}
