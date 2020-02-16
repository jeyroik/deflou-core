<?php
namespace deflou\components\applications\activities;

use deflou\interfaces\applications\activities\IActivity;
use extas\components\samples\THasSample;

/**
 * Class Activity
 *
 * @package deflou\components\applications\activities
 * @author jeyroik@gmail.com
 */
class Activity extends ActivitySample implements IActivity
{
    use THasSample;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'deflou.application.activity';
    }
}
