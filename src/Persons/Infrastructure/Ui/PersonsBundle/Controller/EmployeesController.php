<?php

namespace Persons\Infrastructure\Ui\PersonsBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class EmployeesController extends FOSRestController
{
    public function getEmployeeAction($employeeId)
    {
        $employeeListSrv = $this->get("persons.employee.list.srv");
        return new JsonResponse([
            'data' => $employeeListSrv->listById($employeeId)
        ]);
    }

    public function getEmployeesAction()
    {
        $employeeListSrv = $this->get("persons.employee.list.srv");
        return new JsonResponse([
            'data' => $employeeListSrv->listAll([
                'limit' => 10
            ]),
        ]);
    }

    public function putEmployeeAction($employeeId)
    {
        
    }
}
