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

        $em = $this->getDoctrine()->getManager();

        $em->persist($person);

        $em->flush();
        
        return new JsonResponse([
            'api' => [
                'url'     => 'hola',
            ]
        ]);
    }
}
