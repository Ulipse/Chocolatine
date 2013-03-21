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
use Ulipse\Bundle\ChocolatineBundle\Form\GiftType;

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
        return $this->processForm(new Gift());
    }

    /**
     * @ApiDoc(description="Edit Gift")
     * @Route("/{id}")
     * @ParamConverter("team", class="UlipseChocolatineBundle:Gift")
     * @Method("PUT")
     * @Rest\View()
     */
    public function editAction(Gift $gift)
    {
        return $this->processForm($gift, self::EDIT_MODE);
    }

    protected function processForm(Gift $gift, $mode = self::CREATE_MODE)
    {
        $form = $this->createForm(new GiftType(), $gift);
        $form->bind($this->getRequest());

        if (!$form->isValid()) {
            return View::create($form, 400);
        }

        $this->saveEntity($gift, true);

        return View::create($gift, $mode);
    }
}
