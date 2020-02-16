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
    protected $itemClass = FieldTypeSample::class;
    protected $idAs = '';
    protected $pk = FieldTypeSample::FIELD__NAME;
    protected $name = 'fields_types_samples';
    protected $scope = 'deflou';
}
