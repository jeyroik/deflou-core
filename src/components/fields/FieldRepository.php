<?php
namespace deflou\components\fields;

use deflou\interfaces\fields\IFieldRepository;
use extas\components\repositories\Repository;

/**
 * Class FieldRepository
 * 
 * @package deflou\components\fields
 * @author jeyroik@gmail.com
 */
class FieldRepository extends Repository implements IFieldRepository
{
    protected $scope = 'deflou';
    protected $name = 'fields';
    protected $pk = Field::FIELD__NAME;
    protected $idAs = '';
    protected $itemClass = Field::class;
}
