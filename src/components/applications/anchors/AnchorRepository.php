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
    protected string $scope = 'deflou';
    protected string $name = 'applications_anchors';
    protected string $pk = Anchor::FIELD__ID;
    protected string $idAs = Anchor::FIELD__ID;
    protected string $itemClass = Anchor::class;
}
