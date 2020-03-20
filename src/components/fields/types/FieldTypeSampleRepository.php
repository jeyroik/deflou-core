<?php
namespace deflou\components\fields\types;

use deflou\interfaces\fields\types\IFieldTypeSampleRepository;
use extas\components\repositories\Repository;

/**
 * Class FieldTypeSampleRepository
 * 
 * @package deflou\components\fields\types
 * @author jeyroik@gmail.com
 */
class FieldTypeSampleRepository extends Repository implements IFieldTypeSampleRepository
{
    protected string $itemClass = FieldTypeSample::class;
    protected string $idAs = '';
    protected string $pk = FieldTypeSample::FIELD__NAME;
    protected string $name = 'fields_types_samples';
    protected string $scope = 'deflou';
}
