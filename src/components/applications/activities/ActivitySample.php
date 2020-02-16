<?php
namespace deflou\components\applications\activities;

use deflou\interfaces\applications\activities\IActivitySample;
use extas\components\players\THasOwner;
use extas\components\samples\Sample;
use extas\components\THasClass;
use extas\components\THasType;

/**
 * Class ActivitySample
 *
 * @package deflou\components\applications\activities
 * @author jeyroik@gmail.com
 */
class ActivitySample extends Sample implements IActivitySample
{
    use THasOwner;
    use THasType;
    use THasClass;

    /**
     * @return string
     */
    public function getAppName(): string
    {
        return $this->config[static::FIELD__APPLICATION_NAME] ?? '';
    }

    /**
     * @param string $appName
     * @return $this
     */
    public function setAppName(string $appName)
    {
        $this->config[static::FIELD__APPLICATION_NAME] = $appName;

        return $this;
    }
}
