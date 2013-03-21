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
use Ulipse\Bundle\ChocolatineBundle\Form\WorkerType;

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
        return View::create(new Worker());
    }

    /**
     * @ApiDoc(description="Edit Worker")
     * @Route("/{id}")
     * @ParamConverter("worker", class="UlipseChocolatineBundle:Worker")
     * @Method("PUT")
     * @Rest\View()
     */
    public function editAction(Worker $worker)
    {
        return $this->processForm($worker, self::EDIT_MODE);
    }

    protected function processForm(Worker $worker, $mode = self::CREATE_MODE)
    {
        $form = $this->createForm(new WorkerType(), $worker);
        $form->bind($this->getRequest());

        if (!$form->isValid()) {
            return View::create($form, 400);
        }

        $this->saveEntity($worker, true);

        return View::create($worker, $mode);
    }
}
