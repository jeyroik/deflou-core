<?php
namespace deflou\components\applications;

use deflou\interfaces\applications\IApplicationSampleRepository;
use extas\components\repositories\Repository;

/**
 * Class ApplicationSampleRepository
 * 
 * @package deflou\components\applications
 * @author jeyroik@gmail.com
 */
class ApplicationSampleRepository extends Repository implements IApplicationSampleRepository
{
    protected $itemClass = ApplicationSample::class;
    protected $idAs = '';
    protected $pk = ApplicationSample::FIELD__NAME;
    protected $name = 'applications_samples';
    protected $scope = 'deflou';
}
