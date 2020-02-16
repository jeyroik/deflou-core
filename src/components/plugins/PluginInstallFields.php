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
    protected $selfName = 'field';
    protected $selfSection = 'fields';
    protected $selfUID = Field::FIELD__NAME;
    protected $selfItemClass = Field::class;
    protected $selfRepositoryClass = IFieldRepository::class;
}
