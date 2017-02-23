<?php
namespace Persons\Domain\Services\Employee;
use Common\Exception\SrvErrorException;
use Common\Service\EncryptService;
use Common\Service\PasswordService;
use Persons\Domain\Repository\EmployeeRepository;

/**
 * MngService Class
 *
 * @package Persons\Domain\Services\Employee
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class MngService
{
    /** @var  EmployeeRepository */
    private $employeeRepository;

    /** @var  EncryptService */
    private $encryptService;

    /** @var  PasswordService */
    private $passwordService;

    /**
     * MngService constructor.
     * @param EmployeeRepository $employeeRepository
     * @param EncryptService $encryptService
     * @param PasswordService $passwordService
     */
    public function __construct(
        EmployeeRepository $employeeRepository,
        EncryptService $encryptService,
        PasswordService $passwordService)
    {
        $this->employeeRepository = $employeeRepository;
        $this->encryptService = $encryptService;
        $this->passwordService = $passwordService;
    }


    public function changeUser($employeeId,$newUser,$currentPassword,$force=false)
    {
        $employee = $this->employeeRepository->getById($employeeId);
        if(!$force){
            if(!$this->passwordService->verify($employee->password(),$currentPassword)){
                throw new SrvErrorException("El password no coincide");
            }
        }
        $userEncript = $this->encryptService->encrypt($newUser);
        $employee->changeUser($userEncript);
        $this->employeeRepository->persist($employee);
        return true;
    }

    /**
     * @param string $employeeId
     * @param string $newPassword
     * @return bool
     */
    public function changePassword($employeeId,$newPassword)
    {
        $employee = $this->employeeRepository->getById($employeeId);
        $passwordEncript = $this->passwordService->create($newPassword);
        $employee->changePassword($passwordEncript);
        $this->employeeRepository->persist($employee);

        return true;
    }
}