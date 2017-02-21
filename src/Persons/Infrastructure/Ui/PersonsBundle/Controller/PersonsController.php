<?php

namespace Persons\Infrastructure\Ui\PersonsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class PersonsController extends Controller
{

    public function getPersonAction($personId)
    {
        $plu = $this->get('misa.personsbundle.util.inflector');

        $personListSrv = $this->get("persons.person.list.srv");
        return new JsonResponse([
            'data' => $personListSrv->getAll([
                'limit'=>10
            ]),
        ]);
    }
    public function getPersonsAction()
    {
        $personListSrv = $this->get("persons.person.list.srv");
        return new JsonResponse([
            'data' => $personListSrv->getAll([
                'limit'=>10
            ]),
        ]);
    }
}
