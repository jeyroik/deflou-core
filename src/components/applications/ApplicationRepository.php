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
    protected $scope = 'deflou';
    protected $name = 'applications';
    protected $pk = Application::FIELD__NAME;
    protected $idAs = '';
    protected $itemClass = Application::class;
}
