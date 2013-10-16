<?php
namespace NachoBrito\ThoughtsBundle\Controller\API;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Description of ThoughtController
 *
 * @author nacho
 */
class ThoughtController extends FOSRestController
{

    /**
     * @Route("/api/thoughts", name="api_thoughts_all")
     * @return type
     */
    public function allAction()
    {
        $repo = $this->getDoctrine()->getRepository('NachoBritoThoughtsBundle:Thought');
        $thoughts = $repo->getRecentThoughts(25);
        
        return array('thoughts' => $thoughts);
    }

}
