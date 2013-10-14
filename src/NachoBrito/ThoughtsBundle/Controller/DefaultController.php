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
     * @Route("/{slug}.{_format}", requirements={"slug" = "[a-zA-Z\.\-\_]{3,}"}, name="immablog_thought")
     * @Template()
     */
    public function thoughtAction($slug = '', $format = 'html')
    {
        /* @var $repo ThoughtRepository */
        $repo = $this->getDoctrine()->getRepository('NachoBritoThoughtsBundle:Thought');

        $thought = $repo->findOneBy(array('slug'=>$slug));
        
        $data = array();        
        $data['thought'] = $thought;
        $data['csrf_token'] = $this->getCSRFToken();

        return $data;
        
    }
    
    /**
     * @Route("/{section}/{slug}.{_format}", requirements={"slug" = "[a-zA-Z\.\-\_]{3,}"}, name="immablog_thought_insection")
     * @param type $section
     * @param type $slug
     */
    public function oldThoughtsAction($section = '', $slug = '', $format = 'html'){
        $url = $this->generateUrl('immablog_thought',array('slug'=>$slug, '_format'=>$format));
        return $this->redirect($url, 301);
    }

}
