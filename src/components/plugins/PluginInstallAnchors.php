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
    protected $selfRepositoryClass = IAnchorRepository::class;
    protected $selfItemClass = Anchor::class;
    protected $selfUID = Anchor::FIELD__ID;
    protected $selfSection = 'application_anchors';
    protected $selfName = 'application anchor';
}
