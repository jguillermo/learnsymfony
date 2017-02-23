<?php
namespace Persons\Domain\Services\Employee;

use Persons\Domain\Entity\Employee;
use Persons\Domain\Repository\EmployeeRepository;

/**
 * ListService Class
 *
 * @package ${NAMESPACE}
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ListService
{
    /** @var  EmployeeRepository */
    private $employeeRepository;

    /**
     * ListService constructor.
     * @param EmployeeRepository $employeeRepository
     */
    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }


    public function findAll($filter)
    {
        return $this->employeeRepository->findAll($filter);
    }

    /**
     * @param $employeeId
     * @return Employee
     */
    public function getById($employeeId)
    {
        return $this->employeeRepository->getById($employeeId);
    }

    public function findById($employeeId)
    {
        return $this->employeeRepository->findById($employeeId);
    }
}
