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
    protected string $selfRepositoryClass = IFieldTypeSampleRepository::class;
    protected string $selfItemClass = FieldTypeSample::class;
    protected string $selfUID = FieldTypeSample::FIELD__NAME;
    protected string $selfSection = 'field_type_samples';
    protected string $selfName = 'field type sample';
}
