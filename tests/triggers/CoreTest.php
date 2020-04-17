<?php
namespace tests;
use deflou\components\applications\activities\Activity;
use deflou\components\applications\activities\ActivityRepository;
use deflou\components\applications\activities\ActivitySample;
use deflou\components\applications\activities\ActivitySampleRepository;
use deflou\components\applications\anchors\Anchor;
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
use deflou\interfaces\applications\activities\IActivity;
use deflou\interfaces\applications\activities\IActivityRepository;
use deflou\interfaces\applications\activities\IActivitySampleRepository;
use deflou\interfaces\applications\anchors\IAnchor;
use deflou\interfaces\applications\IApplicationRepository;
use deflou\interfaces\applications\IApplicationSampleRepository;
use deflou\interfaces\triggers\ITrigger;
use deflou\interfaces\triggers\ITriggerRepository;
use deflou\interfaces\triggers\ITriggerResponse;
use deflou\interfaces\triggers\ITriggerResponseRepository;
use Dotenv\Dotenv;
use extas\components\players\Player;
use extas\components\players\PlayerRepository;
use extas\components\plugins\Plugin;
use extas\components\plugins\repositories\PluginFieldSampleName;
use extas\components\plugins\repositories\PluginFieldUuid;
use extas\components\samples\parameters\SampleParameter;
use extas\components\SystemContainer;
use extas\interfaces\players\IPlayerRepository;
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
class CoreTest extends TestCase
{
    protected ?IRepository $playerRepo = null;
    protected ?IRepository $appRepo = null;
    protected ?IRepository $appSampleRepo = null;
    protected ?IRepository $activityRepo = null;
    protected ?IRepository $activitySampleRepo = null;
    protected ?IRepository $triggerRepo = null;
    protected ?IRepository $pluginRepo = null;
    protected ?IRepository $triggersResponsesRepo = null;

    protected function setUp(): void
    {
        parent::setUp();
        $env = Dotenv::create(getcwd() . '/tests/');
        $env->load();

        $this->appRepo = new ApplicationRepository();
        $this->appSampleRepo = new ApplicationSampleRepository();
        $this->activityRepo = new ActivityRepository();
        $this->activitySampleRepo = new ActivitySampleRepository();
        $this->playerRepo = new PlayerRepository();
        $this->triggersResponsesRepo = new TriggerResponseRepository();
        $this->pluginRepo = new PluginRepository();
        $this->triggerRepo = new TriggerRepository();

        SystemContainer::addItem(
            IApplicationRepository::class,
            ApplicationRepository::class
        );
        SystemContainer::addItem(
            IApplicationSampleRepository::class,
            ApplicationSampleRepository::class
        );
        SystemContainer::addItem(
            IActivityRepository::class,
            ActivityRepository::class
        );
        SystemContainer::addItem(
            IActivitySampleRepository::class,
            ActivitySampleRepository::class
        );
        SystemContainer::addItem(
            ITriggerRepository::class,
            TriggerRepository::class
        );
        SystemContainer::addItem(
            IPlayerRepository::class,
            PlayerRepository::class
        );
        SystemContainer::addItem(
            ITriggerResponseRepository::class,
            TriggerResponseRepository::class
        );
    }

    public function tearDown(): void
    {
        $this->appRepo->delete([Application::FIELD__SAMPLE_NAME => 'test_app']);
        $this->appRepo->delete([Application::FIELD__NAME => 'test']);
        $this->appSampleRepo->delete([ApplicationSample::FIELD__NAME => 'test']);
        $this->activityRepo->delete([Activity::FIELD__NAME => 'test']);
        $this->activitySampleRepo->delete([ActivitySample::FIELD__NAME => 'test']);
        $this->playerRepo->delete([Player::FIELD__NAME => 'test']);
        $this->triggersResponsesRepo->delete([TriggerResponse::FIELD__PLAYER_NAME => 'test_player']);
        $this->pluginRepo->delete([Plugin::FIELD__STAGE => 'extas.triggers_responses.create.before']);
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
        $responseFromDb = $this->triggersResponsesRepo->one([TriggerResponse::FIELD__ID => $response->getId()]);
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

        $this->appRepo->create(new Application([
            Application::FIELD__NAME => 'test',
            Application::FIELD__SAMPLE_NAME => 'test'
        ]));

        $this->assertNotEmpty($response->getActionApplication());
        $this->assertEquals('test', $response->getActionApplication()->getName());

        $response->setActionName('test');
        $this->assertEquals('test', $response->getActionName());

        $this->activityRepo->create(new Activity([
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

        $this->activitySampleRepo->create(new ActivitySample([
            ActivitySample::FIELD__NAME => 'test'
        ]));

        $this->assertNotEmpty($response->getActionSample());
        $this->assertEquals('test', $response->getActionSample()->getName());

        $response->setActionApplicationSampleName('test');
        $this->assertEquals('test', $response->getActionApplicationSampleName());

        $this->appSampleRepo->create(new ApplicationSample([
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

        $this->activityRepo->create(new Activity([
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

        $this->triggerRepo->create(new Trigger([
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

        $this->playerRepo->create(new Player([
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
    }
}
