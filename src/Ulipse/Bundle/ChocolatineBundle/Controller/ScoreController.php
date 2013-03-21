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
use Ulipse\Bundle\ChocolatineBundle\Form\ScoreType;

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
        return $this->processForm(new Score());
    }

    /**
     * @ApiDoc(description="Edit Score")
     * @Route("/{id}")
     * @ParamConverter("score", class="UlipseChocolatineBundle:Score")
     * @Method("PUT")
     * @Rest\View()
     */
    public function editAction(Score $score)
    {
        return $this->processForm($score, self::EDIT_MODE);
    }

    protected function processForm(Score $score, $mode = self::CREATE_MODE)
    {
        $form = $this->createForm(new ScoreType(), $score);
        $form->bind($this->getRequest());

        if (!$form->isValid()) {
            return View::create($form, 400);
        }

        $this->saveEntity($score, true);

        return View::create($score, $mode);
    }
}
