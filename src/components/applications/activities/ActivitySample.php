<?php
namespace deflou\components\applications\activities;

use deflou\interfaces\applications\activities\IActivitySample;
use deflou\interfaces\applications\IApplication;
use deflou\interfaces\applications\IApplicationRepository;
use extas\components\players\THasOwner;
use extas\components\players\THasPlayer;
use extas\components\samples\Sample;
use extas\components\SystemContainer;
use extas\components\THasClass;
use extas\components\THasType;
use extas\interfaces\repositories\IRepository;

/**
 * Class ActivitySample
 *
 * @package deflou\components\applications\activities
 * @author jeyroik@gmail.com
 */
class ActivitySample extends Sample implements IActivitySample
{
    use THasPlayer;
    use THasType;
    use THasClass;
}
