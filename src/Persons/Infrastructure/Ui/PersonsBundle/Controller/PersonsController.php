<?php

namespace Persons\Infrastructure\Ui\PersonsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations\Get;

class PersonsController extends Controller
{

    /**
     * GET Route annotation.
     * @Get("/persons/{$personId}")
     */
    public function getPersonAction($personId)
    {
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
