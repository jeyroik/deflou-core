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
    protected string $scope = 'deflou';
    protected string $name = 'fields';
    protected string $pk = Field::FIELD__NAME;
    protected string $idAs = '';
    protected string $itemClass = Field::class;
}
