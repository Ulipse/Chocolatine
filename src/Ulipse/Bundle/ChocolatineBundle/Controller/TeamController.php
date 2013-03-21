<?php

namespace Ulipse\Bundle\ChocolatineBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Ulipse\Bundle\ChocolatineBundle\Entity\Team;
use Ulipse\Bundle\ChocolatineBundle\Form\TeamType;

/**
 * Class TeamController
 *
 * @package Ulipse\Bundle\ChocolatineBundle\Controller
 * @Route("team")
 */
class TeamController extends RestController
{
    protected $entity;

    /**
     * @ApiDoc(description="Get teams")
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
     * @ApiDoc(description="Create Team")
     * @Route("")
     * @Method("POST")
     * @Rest\View()
     */
    public function newAction()
    {
        return $this->processForm(new Team());
    }

    /**
     * @ApiDoc(description="Edit Team")
     * @Route("")
     * @Method("PUT")
     * @Rest\View()
     */
    public function editAction(Team $team)
    {
        return $this->processForm($team, self::EDIT_MODE);
    }

    protected function processForm(Team $team, $mode = self::CREATE_MODE)
    {
        $form = $this->createForm(new TeamType(), $team);
        $form->bind($this->getRequest());

        if (!$form->isValid()) {
            return View::create($form, 400);
        }

        $this->saveEntity($team, true);

        return View::create($team, $mode);
    }
}
