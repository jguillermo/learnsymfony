<?php

namespace PersonBundle\Controller;

use PersonBundle\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $person = new Person();
        $person
            ->setName('jose2')
            ->setLastName('guillermo')
            ->setSecondLastName('inche');

        $personId = $person->getId();

        $em = $this->getDoctrine()->getManager();

        $em->persist($person);

        $personId2 = $person->getId();

        $em->flush();


        $personId3 = $person->getId();

        return new JsonResponse([
            'api' => [
                'url'     => 'hola',
                'pid1'=>$personId,
                'pid2'=>$personId2,
                'pid3'=>$personId3,
            ]
        ]);
    }
}
