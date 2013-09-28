<?php

namespace NachoBrito\ThoughtsBundle\Controller;

use NachoBrito\ThoughtsBundle\Entity\Thought;
use NachoBrito\ThoughtsBundle\Entity\ThoughtRepository;
use NachoBrito\ThoughtsBundle\Form\Type\ThoughtType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of PublishController
 *
 * @author nacho
 */
class PublishController extends AbstractController
{

    /**
     * @Route("/a/{thought_id}")
     */
    public function editAction($thought_id = false)
    {
        /* @var $repo ThoughtRepository */
        $repo = $this->getDoctrine()->getRepository('NachoBritoThoughtsBundle:Thought');
        $thought = is_numeric($thought_id) ? $repo->find($thought_id) : new Thought();
        $form = $this->createForm(new ThoughtType(), $thought);

        return $this->render('NachoBritoThoughtsBundle:Thought:edit.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

}
