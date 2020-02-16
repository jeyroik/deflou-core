<?php
namespace deflou\components\applications\anchors;

use deflou\interfaces\applications\anchors\IAnchorRepository;
use extas\components\repositories\Repository;

/**
 * Class AnchorRepository
 * 
 * @package deflou\components\applications\anchors
 * @author jeyroik@gmail.com
 */
class AnchorRepository extends Repository implements IAnchorRepository
{
    protected $scope = 'deflou';
    protected $name = 'applications_anchors';
    protected $pk = Anchor::FIELD__ID;
    protected $idAs = Anchor::FIELD__ID;
    protected $itemClass = Anchor::class;
}
