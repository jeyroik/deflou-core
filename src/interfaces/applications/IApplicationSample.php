<?php
namespace deflou\interfaces\applications;

use extas\interfaces\IHasTags;
use extas\interfaces\players\IHasPlayer;
use extas\interfaces\samples\ISample;

/**
 * Interface IApplicationSample
 *
 * @package deflou\interfaces\applications
 * @author jeyroik@gmail.com
 */
interface IApplicationSample extends ISample, IHasPlayer, IHasTags
{

}
