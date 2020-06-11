<?php
namespace deflou\components\plugins\install;

use deflou\components\triggers\Trigger;
use extas\components\plugins\install\InstallSection;

/**
 * Class InstallTriggers
 * 
 * @package deflou\components\plugins\install
 * @author jeyroik@gmail.com
 */
class InstallTriggers extends InstallSection
{
    protected string $selfName = 'trigger';
    protected string $selfSection = 'triggers';
    protected string $selfUID = Trigger::FIELD__NAME;
    protected string $selfItemClass = Trigger::class;
    protected string $selfRepositoryClass = 'deflouTriggerRepository';
}
