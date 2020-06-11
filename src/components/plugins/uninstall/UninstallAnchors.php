<?php
namespace deflou\components\plugins\uninstall;

use deflou\components\applications\anchors\Anchor;
use extas\components\plugins\uninstall\UninstallSection;

/**
 * Class UninstallAnchors
 * 
 * @package deflou\components\plugins\uninstall
 * @author jeyroik@gmail.com
 */
class UninstallAnchors extends UninstallSection
{
    protected string $selfRepositoryClass = 'deflouAnchorRepository';
    protected string $selfItemClass = Anchor::class;
    protected string $selfUID = Anchor::FIELD__ID;
    protected string $selfSection = 'application_anchors';
    protected string $selfName = 'application anchor';
}
