<?php
namespace deflou\components\fields\types;

use deflou\interfaces\fields\types\IFieldTypeRepository;
use extas\components\repositories\Repository;

/**
 * Class FieldTypeRepository
 *
 * @package deflou\components\fields\types
 * @author jeyroik@gmail.com
 */
class FieldTypeRepository extends Repository implements IFieldTypeRepository
{
    protected string $itemClass = FieldType::class;
    protected string $pk = FieldType::FIELD__NAME;
    protected string $name = 'fields_types';
    protected string $scope = 'deflou';
}
