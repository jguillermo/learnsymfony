<?php

namespace Persons\Infrastructure\Ui\PersonsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class PersonsController extends Controller
{

    public function getPersonAction($personId)
    {
        $personListSrv = $this->get("persons.person.list.srv");
        return new JsonResponse([
            'data' => $personListSrv->findById($personId),
        ]);
    }
    public function getPersonsAction()
    {
        $personListSrv = $this->get("persons.person.list.srv");
        return new JsonResponse([
            'data' => $personListSrv->findAll([
                'limit' => 10
            ]),
        ]);
    }
}
