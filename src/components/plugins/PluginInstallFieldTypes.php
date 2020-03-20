<?php
namespace deflou\components\plugins;

use deflou\components\fields\types\FieldType;
use deflou\interfaces\fields\types\IFieldTypeRepository;
use extas\components\plugins\PluginInstallDefault;

/**
 * Class PluginInstallFieldTypes
 *
 * @package deflou\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallFieldTypes extends PluginInstallDefault
{
    protected string $selfRepositoryClass = IFieldTypeRepository::class;
    protected string $selfItemClass = FieldType::class;
    protected string $selfUID = FieldType::FIELD__NAME;
    protected string $selfSection = 'field_types';
    protected string $selfName = 'field type';
}
