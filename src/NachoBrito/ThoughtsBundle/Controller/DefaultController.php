<?php

namespace NachoBrito\ThoughtsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * 
 */
class DefaultController extends AbstractController
{

    const FRONT_PAGE_THOUGHT_COUNT = 10;

    /**
     * @Route("/{slug}", requirements={"slug" = "[a-zA-Z\.\-\_]{3,}"}, name="immablog_home")
     * @Template()
     */
    public function indexAction($slug = '')
    {
        $repo = $this->getDoctrine()->getRepository('NachoBritoThoughtsBundle:Thought');

        $data = array();
        
        if (!empty($slug))
        {
            $thoughts = array();
        } else
        {
            $thoughts = $repo->getRecentThoughts(self::FRONT_PAGE_THOUGHT_COUNT);
            
        }
        $data['thoughts'] = $thoughts;
        $data['csrf_token'] = $this->getCSRFToken();
        
        return $data;
    }

}
