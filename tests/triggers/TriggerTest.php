<?php
namespace tests;

use deflou\components\applications\activities\Activity;
use deflou\components\applications\anchors\Anchor;
use deflou\components\applications\Application;
use deflou\components\applications\ApplicationRepository;
use deflou\components\triggers\TriggerAction;
use deflou\components\triggers\TriggerResponse;
use deflou\components\triggers\TriggerResponseRepository;
use deflou\components\triggers\TriggerSample;
use deflou\components\triggers\TriggerStateHistory;
use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\applications\anchors\IAnchor;
use deflou\interfaces\applications\IApplicationRepository;
use deflou\interfaces\triggers\ITrigger;
use deflou\interfaces\triggers\ITriggerResponse;
use deflou\interfaces\triggers\ITriggerResponseRepository;
use Dotenv\Dotenv;
use extas\components\plugins\Plugin;
use extas\components\plugins\repositories\PluginFieldSampleName;
use extas\components\plugins\repositories\PluginFieldUuid;
use extas\components\samples\parameters\SampleParameter;
use extas\components\SystemContainer;
use extas\interfaces\samples\parameters\ISampleParameter;
use PHPUnit\Framework\TestCase;
use deflou\components\triggers\Trigger;
use extas\interfaces\repositories\IRepository;
use extas\components\plugins\PluginRepository;

/**
 * Class TriggerTest
 *
 * @package tests
 * @author jeyroik@gmail.com
 */
class TriggerTest extends TestCase
{
    protected ?IRepository $appRepo = null;
    protected ?IRepository $pluginRepo = null;
    protected ?IRepository $triggersResponsesRepo = null;

    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();

        $this->appRepo = new ApplicationRepository();
        $this->triggersResponsesRepo = new TriggerResponseRepository();
        $this->pluginRepo = new PluginRepository();

        SystemContainer::addItem(
            IApplicationRepository::class,
            ApplicationRepository::class
        );
        SystemContainer::addItem(
            ITriggerResponseRepository::class,
            TriggerResponseRepository::class
        );
    }

    public function tearDown(): void
    {
        $this->appRepo->delete([Application::FIELD__SAMPLE_NAME => 'test_app']);
        $this->triggersResponsesRepo->delete([TriggerResponse::FIELD__PLAYER_NAME => 'test_player']);
    }

    public function testSetAndGetExecutionTime()
    {
        $now = time();
        $trigger = new Trigger();
        $trigger->setExecutionCount(1);
        $trigger->setExecutionLastTime($now);
        $this->assertEquals(1, $trigger->getExecutionCount());
        $this->assertEquals($now, $trigger->getExecutionLastTime());
    }

    public function testSampleGettersAndSetters()
    {
        $sample = new TriggerSample();
        $sample->setEventParametersOptions([
            [
                ISampleParameter::FIELD__NAME => 'test',
                ISampleParameter::FIELD__VALUE => 'test-v'
            ]
        ]);
        $this->assertCount(1, $sample->getEventParametersOptions());
        $this->assertCount(1, $sample->getEventParameters());

        $sample->setEventParameters([
            new SampleParameter([
                ISampleParameter::FIELD__NAME => 'test1',
                ISampleParameter::FIELD__VALUE => 'test1-v'
            ]),
            new SampleParameter([
                ISampleParameter::FIELD__NAME => 'test2',
                ISampleParameter::FIELD__VALUE => 'test2-v'
            ])
        ]);
        $this->assertCount(2, $sample->getEventParameters());

        $sample->setActionParametersOptions([
            [
                ISampleParameter::FIELD__NAME => 'test',
                ISampleParameter::FIELD__VALUE => 'test-v'
            ]
        ]);
        $this->assertCount(1, $sample->getActionParametersOptions());
        $this->assertCount(1, $sample->getActionParameters());

        $sample->setActionParameters([
            new SampleParameter([
                ISampleParameter::FIELD__NAME => 'test1',
                ISampleParameter::FIELD__VALUE => 'test1-v'
            ]),
            new SampleParameter([
                ISampleParameter::FIELD__NAME => 'test2',
                ISampleParameter::FIELD__VALUE => 'test2-v'
            ])
        ]);
        $this->assertCount(2, $sample->getActionParameters());
    }

    public function testStateHistory()
    {
        $history = new TriggerStateHistory();
        $history->setStateTo('test_to');
        $history->setStateFrom('test_from');

        $this->assertEquals('test_to', $history->getStateTo());
        $this->assertEquals('test_from', $history->getStateFrom());
    }

    public function testTriggerAction()
    {
        $action = new class () extends TriggerAction {
            public function __invoke(
                IActivity $action,
                IActivity $event,
                ITrigger $trigger,
                IAnchor $anchor
            ): ITriggerResponse
            {
                return $this->getTriggerResponse(
                    $action,
                    $event,
                    $trigger,
                    $anchor,
                    'test',
                    200
                );
            }
        };

        $app = new Application([
            Application::FIELD__NAME => '@sample(uuid6)',
            Application::FIELD__SAMPLE_NAME => 'test_app'
        ]);
        $samplePlugin = new PluginFieldSampleName();
        $samplePlugin($app);
        $this->appRepo->create($app);
        $this->pluginRepo->create(new Plugin([
            Plugin::FIELD__CLASS => PluginFieldUuid::class,
            Plugin::FIELD__STAGE => 'extas.triggers_responses.create.before'
        ]));

        $response = $action(
            new Activity([
                Activity::FIELD__TYPE => Activity::TYPE__EVENT,
                Activity::FIELD__NAME => 'test_action',
                Activity::FIELD__APPLICATION_NAME => 'test_app',
                Activity::FIELD__SAMPLE_NAME => 'test_action_sample'
            ]),
            new Activity([
                Activity::FIELD__TYPE => Activity::TYPE__EVENT,
                Activity::FIELD__NAME => 'test_event',
                Activity::FIELD__APPLICATION_NAME => 'test_app',
                Activity::FIELD__SAMPLE_NAME => 'test_event_sample'
            ]),
            new Trigger([
                Trigger::FIELD__NAME => 'test'
            ]),
            new Anchor([
                Anchor::FIELD__PLAYER_NAME => 'test_player'
            ])
        );

        $this->assertEquals(200, $response->getResponseStatus());

        /**
         * @var ITriggerResponse $responseFromDb
         */
        $responseFromDb = $this->triggersResponsesRepo->one([TriggerResponse::FIELD__ID => $response->getId()]);
        $this->assertEquals('test_player', $responseFromDb->getPlayerName());
    }
}
