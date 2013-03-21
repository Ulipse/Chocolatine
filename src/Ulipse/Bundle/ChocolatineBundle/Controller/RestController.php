<?php

namespace Ulipse\Bundle\ChocolatineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
class RestController extends Controller
{
    const CREATE_MODE = 201;
    const EDIT_MODE   = 204;


    /**
     * @param      $entity
     * @param bool $flush
     */
    public function saveEntity($entity, $flush = false)
    {
        $em = $this->getDoctrine()->getManager();

        $em->persist($entity);
        if ($flush) {
           $em->flush();
        }
    }

}
