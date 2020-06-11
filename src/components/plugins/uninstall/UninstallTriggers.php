<?php
namespace deflou\components\plugins\uninstall;

use deflou\components\triggers\Trigger;
use extas\components\plugins\uninstall\UninstallSection;

/**
 * Class UninstallTriggers
 * 
 * @package deflou\components\plugins\uninstall
 * @author jeyroik@gmail.com
 */
class UninstallTriggers extends UninstallSection
{
    protected string $selfName = 'trigger';
    protected string $selfSection = 'triggers';
    protected string $selfUID = Trigger::FIELD__NAME;
    protected string $selfItemClass = Trigger::class;
    protected string $selfRepositoryClass = 'deflouTriggerRepository';
}
