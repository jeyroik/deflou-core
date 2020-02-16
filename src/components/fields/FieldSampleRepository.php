<?php
namespace deflou\components\fields;

use deflou\interfaces\fields\IFieldSampleRepository;
use extas\components\repositories\Repository;

/**
 * Class FieldSampleRepository
 *
 * @package deflou\components\fields
 * @author jeyroik@gmail.com
 */
class FieldSampleRepository extends Repository implements IFieldSampleRepository
{
    protected $itemClass = FieldSample::class;
    protected $idAs = '';
    protected $pk = FieldSample::FIELD__NAME;
    protected $name = 'fields_samples';
    protected $scope = 'deflou';
}
