<?php

namespace PersonBundle\Controller;

use PersonBundle\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class PersonsController extends Controller
{

    /**
     * @return JsonResponse
     */
    public function getPersonAction($personId)
    {
//        $person = new Person();
//        $person
//            ->setName('jose2')s
//            ->setLastName('guillermo')
//            ->setSecondLastName('inche');
//
//        $em = $this->getDoctrine()->getManager();
//
//        $em->persist($person);
//
//        $em->flush();

        return new JsonResponse([
            'api' => [
                'url'     => 'hola',
            ]
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function getPersonsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $personRepo = $em->getRepository("PersonBundle:Person");

        $persons = $personRepo->find('123');

        $view = [];

        /** @var Person $person */
        foreach ($persons as $person){
            $view[]=[
                'id'=>$person->getId(),
                'name'=>$person->getName(),
                'last_name'=>$person->getLastName(),
                'second_last_name'=>$person->getSecondLastName(),
            ];
        }

        return new JsonResponse($view);
    }
}
