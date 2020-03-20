<?php
namespace deflou\components\plugins;

use deflou\components\fields\Field;
use deflou\interfaces\fields\IFieldRepository;
use extas\components\plugins\PluginInstallDefault;

/**
 * Class PluginInstallFields
 * 
 * @package deflou\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallFields extends PluginInstallDefault
{
    protected string $selfName = 'field';
    protected string $selfSection = 'fields';
    protected string $selfUID = Field::FIELD__NAME;
    protected string $selfItemClass = Field::class;
    protected string $selfRepositoryClass = IFieldRepository::class;
}
