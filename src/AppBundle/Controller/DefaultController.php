<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:River')->findAll();

        return $this->render(
            'default/index.html.twig',
            array(
                'entities' => $entities,
            )
        );
    }

    /**
     * @Route("/action/with/exception")
     */
    public function actionWithExceptionAction()
    {
        throw new \RuntimeException('Ups...');
    }

}
