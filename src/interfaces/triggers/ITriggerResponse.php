<?php
namespace deflou\interfaces\triggers;

use extas\interfaces\IItem;

/**
 * Interface ITriggerResponse
 *
 * @package deflou\interfaces\triggers
 * @author jeyroik <jeyroik@gmail.com>
 */
interface ITriggerResponse extends IItem, IHasTriggerResponse
{
    public const SUBJECT = 'deflou.trigger.response';

    public const STATUS__OK = 200;
    public const STATUS__ERROR = 400;
}
