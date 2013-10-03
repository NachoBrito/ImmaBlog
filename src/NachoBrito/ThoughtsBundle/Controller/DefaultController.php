<?php

namespace NachoBrito\ThoughtsBundle\Controller;

use NachoBrito\ThoughtsBundle\Entity\ThoughtRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * 
 */
class DefaultController extends AbstractController
{

    const FRONT_PAGE_THOUGHT_COUNT = 10;

    /**
     * @Route("/", name="immablog_home")
     * @Template()
     */
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getRepository('NachoBritoThoughtsBundle:Thought');

        $thoughts = $repo->getRecentThoughts(self::FRONT_PAGE_THOUGHT_COUNT);
        
        $data = array();        
        $data['thoughts'] = $thoughts;
        $data['csrf_token'] = $this->getCSRFToken();

        return $data;
    }

    /**
     * @Route("/{slug}", requirements={"slug" = "[a-zA-Z\.\-\_]{3,}"}, name="immablog_thought")
     * @Template()
     */
    public function thoughtAction($slug = '')
    {
        /* @var $repo ThoughtRepository */
        $repo = $this->getDoctrine()->getRepository('NachoBritoThoughtsBundle:Thought');

        $thought = $repo->findOneBy(array('slug'=>$slug));
        
        $data = array();        
        $data['thought'] = $thought;
        $data['csrf_token'] = $this->getCSRFToken();

        return $data;
        
    }

}
