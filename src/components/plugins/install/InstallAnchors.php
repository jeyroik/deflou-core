<?php
namespace deflou\components\plugins\install;

use deflou\components\applications\anchors\Anchor;
use extas\components\plugins\install\InstallSection;

/**
 * Class InstallAnchors
 * 
 * @package deflou\components\plugins\install
 * @author jeyroik@gmail.com
 */
class InstallAnchors extends InstallSection
{
    protected string $selfRepositoryClass = 'deflouAnchorRepository';
    protected string $selfItemClass = Anchor::class;
    protected string $selfUID = Anchor::FIELD__ID;
    protected string $selfSection = 'application_anchors';
    protected string $selfName = 'application anchor';
}
