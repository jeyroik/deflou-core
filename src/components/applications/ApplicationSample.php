<?php
namespace deflou\components\applications;

use deflou\interfaces\applications\IApplicationSample;
use extas\components\players\THasPlayer;
use extas\components\samples\Sample;
use extas\components\THasTags;

/**
 * Class ApplicationSample
 * 
 * @package deflou\components\applications
 * @author jeyroik@gmail.com
 */
class ApplicationSample extends Sample implements IApplicationSample
{
    use THasPlayer;
    use THasTags;

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'deflou.application.sample';
    }
}
