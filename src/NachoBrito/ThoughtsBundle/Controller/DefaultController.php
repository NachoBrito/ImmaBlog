<?php

namespace NachoBrito\ThoughtsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends AbstractController
{

    const FRONT_PAGE_THOUGHT_COUNT = 10;

    /**
     * @Route("/{slug}")
     * @Template()
     */
    public function indexAction($slug = '')
    {
        $repo = $this->getDoctrine()->getRepository('NachoBritoThoughtsBundle:Thought');

        if (!empty($slug))
        {
            
        } else
        {
            $thoughts = $repo->getRecentThoughts(self::FRONT_PAGE_THOUGHT_COUNT);
            return array(
                'thoughts' => $thoughts,
                'csrf_token' => $this->getCSRFToken()
            );
        }
    }

}
