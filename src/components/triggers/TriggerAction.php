<?php
namespace deflou\components\triggers;

use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\applications\anchors\IAnchor;
use deflou\interfaces\triggers\ITrigger;
use deflou\interfaces\triggers\ITriggerAction;
use deflou\interfaces\triggers\ITriggerResponse;
use deflou\interfaces\triggers\ITriggerResponseRepository;
use extas\components\Item;
use extas\components\SystemContainer;

/**
 * Class TriggerAction
 *
 * @package deflou\components\triggers
 * @author jeyroik@gmail.com
 */
abstract class TriggerAction extends Item implements ITriggerAction
{
    /**
     * @param IActivity $action
     * @param IActivity $event
     * @param ITrigger $trigger
     * @param IAnchor $anchor
     * @param string $body
     * @param int $status
     * @return ITriggerResponse
     */
    protected function getTriggerResponse(
        IActivity $action,
        IActivity $event,
        ITrigger $trigger,
        IAnchor $anchor,
        string $body,
        int $status
    ): ITriggerResponse
    {
        /**
         * @var ITriggerResponseRepository $repo
         * @var ITriggerResponse $response
         */
        $repo = SystemContainer::getItem(ITriggerResponseRepository::class);
        return $repo->create(new TriggerResponse([
            TriggerResponse::FIELD__ID => '@uuid6',
            TriggerResponse::FIELD__PLAYER_NAME => $anchor->getPlayerName(),
            TriggerResponse::FIELD__TRIGGER_NAME => $trigger->getName(),
            TriggerResponse::FIELD__EVENT_NAME => $event->getName(),
            TriggerResponse::FIELD__EVENT_SAMPLE_NAME => $event->getSampleName(),
            TriggerResponse::FIELD__EVENT_APPLICATION_NAME => $event->getApplicationName(),
            TriggerResponse::FIELD__EVENT_APPLICATION_SAMPLE_NAME => $event->getApplication()->getSampleName(),
            TriggerResponse::FIELD__ACTION_NAME => $action->getName(),
            TriggerResponse::FIELD__ACTION_SAMPLE_NAME => $action->getSampleName(),
            TriggerResponse::FIELD__ACTION_APPLICATION_NAME => $action->getApplicationName(),
            TriggerResponse::FIELD__ACTION_APPLICATION_SAMPLE_NAME => $action->getApplication()->getSampleName(),
            TriggerResponse::FIELD__RESPONSE_BODY => $body,
            TriggerResponse::FIELD__RESPONSE_STATUS => $status,
            TriggerResponse::FIELD__IS_SUCCESS => $status == 200,
            TriggerResponse::FIELD__CREATED_AT => time()
        ]));
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
