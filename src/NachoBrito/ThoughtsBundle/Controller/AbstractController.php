<?php

namespace NachoBrito\ThoughtsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of AbstractController
 *
 * @author nacho
 */
abstract class AbstractController extends Controller
{


    /**
     * 
     * @return type
     */
    public function getCSRFToken()
    {        
        $csrfToken = 
                $this->container->has('form.csrf_provider') ? 
                $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate') : 
            null;
        
        return $csrfToken;
    }

}
