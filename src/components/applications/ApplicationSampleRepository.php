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
    protected string $itemClass = ApplicationSample::class;
    protected string $pk = ApplicationSample::FIELD__NAME;
    protected string $name = 'applications_samples';
    protected string $scope = 'deflou';
}
