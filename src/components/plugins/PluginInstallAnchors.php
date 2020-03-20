<?php
namespace deflou\components\plugins;

use deflou\components\applications\anchors\Anchor;
use deflou\interfaces\applications\anchors\IAnchorRepository;
use extas\components\plugins\PluginInstallDefault;

/**
 * Class PluginInstallAnchors
 * 
 * @package deflou\components\plugins
 * @author jeyroik@gmail.com
 */
class PluginInstallAnchors extends PluginInstallDefault
{
    protected string $selfRepositoryClass = IAnchorRepository::class;
    protected string $selfItemClass = Anchor::class;
    protected string $selfUID = Anchor::FIELD__ID;
    protected string $selfSection = 'application_anchors';
    protected string $selfName = 'application anchor';
}
