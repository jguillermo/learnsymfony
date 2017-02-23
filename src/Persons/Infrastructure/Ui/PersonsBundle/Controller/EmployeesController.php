<?php

namespace Persons\Infrastructure\Ui\PersonsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class EmployeesController extends Controller
{
    public function getEmployeeAction($employeeId)
    {
        $employeeListSrv = $this->get("persons.employee.list.srv");
        return new JsonResponse([
            'data' => $employeeListSrv->findById($employeeId)
        ]);
    }

    public function getEmployeesAction()
    {
        $employeeListSrv = $this->get("persons.employee.list.srv");
        return new JsonResponse([
            'data' => $employeeListSrv->findAll([
                'limit' => 10
            ]),
        ]);
    }
}
