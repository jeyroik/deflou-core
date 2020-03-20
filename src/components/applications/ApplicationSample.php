<?php
namespace deflou\components\applications;

use deflou\interfaces\applications\IApplicationSample;
use extas\components\players\THasOwner;
use extas\components\samples\Sample;

/**
 * Class ApplicationSample
 * 
 * @package deflou\components\applications
 * @author jeyroik@gmail.com
 */
class ApplicationSample extends Sample implements IApplicationSample
{
    use THasOwner;
}