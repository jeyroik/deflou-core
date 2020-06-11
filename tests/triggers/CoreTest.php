<?php
namespace tests;

use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\applications\activities\IHasAction;
use deflou\interfaces\applications\activities\IHasEvent;
use deflou\interfaces\applications\anchors\IAnchor;
use deflou\interfaces\applications\anchors\IHasAnchor;
use deflou\interfaces\triggers\ITrigger;
use deflou\interfaces\triggers\ITriggerResponse;

use deflou\components\applications\activities\Activity;
use deflou\components\applications\activities\ActivityRepository;
use deflou\components\applications\activities\ActivitySample;
use deflou\components\applications\activities\ActivitySampleRepository;
use deflou\components\applications\activities\THasAction;
use deflou\components\applications\activities\THasEvent;
use deflou\components\applications\anchors\Anchor;
use deflou\components\applications\anchors\AnchorRepository;
use deflou\components\applications\anchors\THasAnchor;
use deflou\components\applications\Application;
use deflou\components\applications\ApplicationRepository;
use deflou\components\applications\ApplicationSample;
use deflou\components\applications\ApplicationSampleRepository;
use deflou\components\triggers\TriggerAction;
use deflou\components\triggers\TriggerRepository;
use deflou\components\triggers\TriggerResponse;
use deflou\components\triggers\TriggerResponseRepository;
use deflou\components\triggers\TriggerSample;
use deflou\components\triggers\TriggerStateHistory;
use deflou\components\triggers\Trigger;

use extas\interfaces\samples\parameters\ISampleParameter;

use extas\components\plugins\PluginRepository;
use extas\components\Item;
use extas\components\players\Player;
use extas\components\players\PlayerRepository;
use extas\components\plugins\repositories\PluginFieldSampleName;
use extas\components\plugins\repositories\PluginFieldUuid;
use extas\components\plugins\TSnuffPlugins;
use extas\components\repositories\TSnuffRepository;
use extas\components\samples\parameters\SampleParameter;

use Dotenv\Dotenv;
use PHPUnit\Framework\TestCase;

/**
 * Class TriggerTest
 *
 * @package tests
 * @author jeyroik@gmail.com
 */
class CoreTest extends TestCase
{
    use TSnuffRepository;
    use TSnuffPlugins;

    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();
        $this->registerSnuffRepos([
            'deflouAnchorRepository' => AnchorRepository::class,
            'deflouApplicationRepository' => ApplicationRepository::class,
            'deflouApplicationSampleRepository' => ApplicationSampleRepository::class,
            'deflouActivityRepository' => ActivityRepository::class,
            'deflouActivitySampleRepository' => ActivitySampleRepository::class,
            'deflouTriggerRepository' => TriggerRepository::class,
            'playerRepository' => PlayerRepository::class,
            'deflouTriggerResponseRepository' => TriggerResponseRepository::class,
            'pluginRepository' => PluginRepository::class
        ]);
    }

    public function tearDown(): void
    {
        $this->unregisterSnuffRepos();
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
        $this->assertEquals('test1-v', $sample->getEventParameter('test1')->getValue());
        $this->assertEquals(null, $sample->getEventParameter('test1-unknown'));

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
        $this->assertEquals('test1-v', $sample->getActionParameter('test1')->getValue());
        $this->assertEquals(null, $sample->getActionParameter('test1-unknown'));
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
        $this->createWithSnuffRepo('deflouApplicationRepository', $app);
        $this->createSnuffPlugin(PluginFieldUuid::class, ['extas.triggers_responses.create.before']);

        $response = $action(
            new Activity([
                Activity::FIELD__TYPE => Activity::TYPE__EVENT,
                Activity::FIELD__NAME => 'test_action',
                Activity::FIELD__APPLICATION_NAME => $app->getName(),
                Activity::FIELD__SAMPLE_NAME => 'test_action_sample'
            ]),
            new Activity([
                Activity::FIELD__TYPE => Activity::TYPE__EVENT,
                Activity::FIELD__NAME => 'test_event',
                Activity::FIELD__APPLICATION_NAME => $app->getName(),
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
        $responseFromDb = $this->oneSnuffRepos(
            'deflouTriggerResponseRepository',
            [TriggerResponse::FIELD__ID => $response->getId()]
        );
        $this->assertEquals('test_player', $responseFromDb->getPlayerName());
    }

    /**
     * @throws
     */
    public function testTriggerResponse()
    {
        $response = new TriggerResponse();

        // action

        $response->setActionApplicationName('test');
        $this->assertEquals('test', $response->getActionApplicationName());

        $this->createWithSnuffRepo('deflouApplicationRepository', new Application([
            Application::FIELD__NAME => 'test',
            Application::FIELD__SAMPLE_NAME => 'test'
        ]));

        $this->assertNotEmpty($response->getActionApplication());
        $this->assertEquals('test', $response->getActionApplication()->getName());

        $response->setActionName('test');
        $this->assertEquals('test', $response->getActionName());

        $this->createWithSnuffRepo('deflouActivityRepository', new Activity([
            Activity::FIELD__NAME => 'test',
            Activity::FIELD__TYPE => Activity::TYPE__ACTION,
            Activity::FIELD__APPLICATION_NAME => 'test'
        ]));

        $this->assertNotEmpty($response->getAction());
        $this->assertEquals('test', $response->getAction()->getName());
        $this->assertEquals('test', $response->getAction()->getApplicationName());
        $this->assertEquals('test', $response->getAction()->getApplication()->getName());

        $action = $response->getAction();
        $action->setApplicationName('test2');
        $this->assertEquals('test2', $action->getApplicationName());

        $response->setActionSampleName('test');
        $this->assertEquals('test', $response->getActionSampleName());

        $this->createWithSnuffRepo('deflouActivitySampleRepository', new ActivitySample([
            ActivitySample::FIELD__NAME => 'test'
        ]));

        $this->assertNotEmpty($response->getActionSample());
        $this->assertEquals('test', $response->getActionSample()->getName());

        $response->setActionApplicationSampleName('test');
        $this->assertEquals('test', $response->getActionApplicationSampleName());

        $this->createWithSnuffRepo('deflouApplicationSampleRepository', new ApplicationSample([
            ApplicationSample::FIELD__NAME => 'test'
        ]));

        $this->assertNotEmpty($response->getActionApplicationSample());
        $this->assertEquals('test', $response->getActionApplicationSample()->getName());

        // event

        $response->setEventApplicationName('test');
        $this->assertEquals('test', $response->getEventApplicationName());

        $this->assertNotEmpty($response->getEventApplication());
        $this->assertEquals('test', $response->getEventApplication()->getName());

        $response->setEventName('test');
        $this->assertEquals('test', $response->getEventName());

        $this->createWithSnuffRepo('deflouActivityRepository', new Activity([
            Activity::FIELD__NAME => 'test',
            Activity::FIELD__TYPE => Activity::TYPE__EVENT,
            Activity::FIELD__APPLICATION_NAME => 'test'
        ]));

        $this->assertNotEmpty($response->getEvent());
        $this->assertEquals('test', $response->getEvent()->getName());

        $response->setEventSampleName('test');
        $this->assertEquals('test', $response->getEventSampleName());

        $this->assertNotEmpty($response->getEventSample());
        $this->assertEquals('test', $response->getEventSample()->getName());

        $response->setEventApplicationSampleName('test');
        $this->assertEquals('test', $response->getEventApplicationSampleName());

        $this->assertNotEmpty($response->getEventApplicationSample());
        $this->assertEquals('test', $response->getEventApplicationSample()->getName());

        // trigger

        $response->setTriggerName('test');
        $this->assertEquals('test', $response->getTriggerName());

        $this->createWithSnuffRepo('deflouTriggerRepository', new Trigger([
            Trigger::FIELD__NAME => 'test'
        ]));

        $this->assertNotEmpty($response->getTrigger());
        $this->assertEquals('test', $response->getTrigger()->getName());

        // response

        $response->setResponseBody('test');
        $this->assertEquals('test', $response->getResponseBody());

        $response->setResponseStatus(200);
        $this->assertEquals(200, $response->getResponseStatus());
        $this->assertTrue($response->isSuccess());

        // player

        $response->setPlayerName('test');
        $this->assertEquals('test', $response->getPlayerName());

        $this->createWithSnuffRepo('playerRepository', new Player([
            Player::FIELD__NAME => 'test'
        ]));

        $this->assertNotEmpty($response->getPlayer());
        $this->assertEquals('test', $response->getPlayer()->getName());
    }

    public function testAnchor()
    {
        $anchor = new Anchor();
        $anchor->setCallsNumber(1);
        $this->assertEquals(1, $anchor->getCallsNumber());
        $anchor->incCallsNumber();
        $this->assertEquals(2, $anchor->getCallsNumber());

        $now = time();
        $anchor->setLastCallTime($now);
        $this->assertEquals($now, $anchor->getLastCallTime());

        $hasAnchor = new class extends Item implements IHasAnchor {
            use THasAnchor;
            protected function getSubjectForExtension(): string
            {
                return '';
            }
        };

        $hasAnchor->setAnchorId('test');
        $this->assertEquals('test', $hasAnchor->getAnchorId());
        $this->createWithSnuffRepo('deflouAnchorRepository', new Anchor([
            Anchor::FIELD__ID => 'test'
        ]));
        $this->assertNotEmpty($hasAnchor->getAnchor());
        $this->assertEquals('test', $hasAnchor->getAnchor()->getId());
    }

    public function testHasNotEvent()
    {
        $hasEvent = new class([
            IHasEvent::FIELD__EVENT_NAME => 'unknown'
        ]) extends Item implements IHasEvent {
            use THasEvent;
            protected function getSubjectForExtension(): string
            {
                return '';
            }
        };

        $this->expectExceptionMessage('Missed or unknown event unknown');
        $hasEvent->getEvent(true);
    }

    public function testHasNotAction()
    {
        $hasAction = new class([
            IHasAction::FIELD__ACTION_NAME => 'unknown'
        ]) extends Item implements IHasAction {
            use THasAction;
            protected function getSubjectForExtension(): string
            {
                return '';
            }
        };

        $this->expectExceptionMessage('Missed or unknown action unknown');
        $hasAction->getAction(true);
    }
}
