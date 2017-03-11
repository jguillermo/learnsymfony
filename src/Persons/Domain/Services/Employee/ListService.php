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

    /**
     * @param $filter
     * @return array
     */
    public function listAll($filter)
    {
        return $this->employeeRepository->listAll($filter);
    }

    /**
     * @param $employeeId
     * @return Employee
     */
    public function find($employeeId)
    {
        return $this->employeeRepository->find($employeeId);
    }

    /**
     * @param $employeeId
     * @return array
     */
    public function listById($employeeId)
    {
        return $this->employeeRepository->listById($employeeId);
    }
}
