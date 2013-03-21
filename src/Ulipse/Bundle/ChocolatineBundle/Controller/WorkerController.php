<?php

namespace Ulipse\Bundle\ChocolatineBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Ulipse\Bundle\ChocolatineBundle\Entity\Worker;

/**
 * Class WorkerController
 *
 * @package Ulipse\Bundle\ChocolatineBundle\Controller
 * @Route("/worker")
 */
class WorkerController extends RestController
{
    /**
     * @ApiDoc(description="Get Workers")
     * @Route("")
     * @Method("GET")
     * @Rest\View()
     */
    public function allAction()
    {
        $teams = array();
        return View::create($teams, 200);
    }

    /**
     * @ApiDoc(description="Create Worker")
     * @Route("")
     * @Method("POST")
     * @Rest\View()
     */
    public function newAction()
    {


        return View::create(null, 201);
    }

    /**
     * @ApiDoc(description="Edit Worker")
     * @Route("")
     * @Method("PUT")
     * @Rest\View()
     */
    public function editAction()
    {
        return View::create(null, 204);
    }

    public function processForm()
    {

    }
}
