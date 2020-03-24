<?php
namespace deflou\components\applications;

use deflou\interfaces\applications\IApplicationRepository;
use extas\components\repositories\Repository;

/**
 * Class ApplicationRepository
 *
 * @package deflou\components\applications
 * @author jeyroik@gmail.com
 */
class ApplicationRepository extends Repository implements IApplicationRepository
{
    protected string $scope = 'deflou';
    protected string $name = 'applications';
    protected string $pk = Application::FIELD__NAME;
    protected string $itemClass = Application::class;
}
