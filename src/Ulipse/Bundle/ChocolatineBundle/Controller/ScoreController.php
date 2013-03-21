<?php

namespace Ulipse\Bundle\ChocolatineBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Ulipse\Bundle\ChocolatineBundle\Entity\Score;

/**
 * Class ScoreController
 *
 * @package Ulipse\Bundle\ChocolatineBundle\Controller
 * @Route("score")
 */
class ScoreController extends RestController
{
    /**
     * @ApiDoc(description="Get Scores")
     * @Route("")
     * @Method("GET")
     * @Rest\View()
     */
    public function allAction()
    {
        $scores = array();
        return View::create($scores, 200);
    }

    /**
     * @ApiDoc(description="Create Score")
     * @Route("")
     * @Method("POST")
     * @Rest\View()
     */
    public function newAction()
    {

        return View::create(null, 201);
    }

    /**
     * @ApiDoc(description="Edit Score")
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
