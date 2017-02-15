<?php

namespace Persons\Infrastructure\Ui\PersonsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class PersonsController extends Controller
{

    public function getPersonsAction()
    {

        return new JsonResponse([
            'data' => []
        ]);
    }
}
