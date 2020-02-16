<?php
namespace deflou\components\plugins;

use deflou\components\fields\FieldType;
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
    protected $selfRepositoryClass = IFieldTypeRepository::class;
    protected $selfItemClass = FieldType::class;
    protected $selfUID = FieldType::FIELD__NAME;
    protected $selfSection = 'field_types';
    protected $selfName = 'field type';
}
