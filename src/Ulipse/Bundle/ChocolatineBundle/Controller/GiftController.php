<?php

namespace Ulipse\Bundle\ChocolatineBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Ulipse\Bundle\ChocolatineBundle\Entity\Gift;

/**
 * Class GiftController
 *
 * @package Ulipse\Bundle\ChocolatineBundle\Controller
 * @Route("gift")
 */
class GiftController extends RestController
{
    /**
     * @ApiDoc(description="Get Gift")
     * @Route("")
     * @Method("GET")
     * @Rest\View()
     */
    public function allAction()
    {
        $gifts = array();
        return View::create($gifts, 200);
    }

    /**
     * @ApiDoc(description="Create Gift")
     * @Route("")
     * @Method("POST")
     * @Rest\View()
     */
    public function newAction()
    {

        return View::create(null, 201);
    }

    /**
     * @ApiDoc(description="Edit Gift")
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
