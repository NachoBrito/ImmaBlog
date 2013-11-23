<?php

namespace NachoBrito\ThoughtsBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use NachoBrito\ThoughtsBundle\Entity\Thread;

/**
 * Thread controller.
 *
 * @Route("/th")
 */
class ThreadController extends Controller
{

    /**
     * Lists all Thread entities.
     *
     * @Route("/", name="th")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('NachoBritoThoughtsBundle:Thread')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Thread entity.
     *
     * @Route("/{id}", name="th_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NachoBritoThoughtsBundle:Thread')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Thread entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}
