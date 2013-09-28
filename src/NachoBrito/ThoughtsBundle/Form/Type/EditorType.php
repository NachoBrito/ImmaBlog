<?php

namespace NachoBrito\ThoughtsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Test\FormBuilderInterface as FormBuilderInterface2;

/**
 * Description of EditorType
 *
 * @author nacho
 */
class EditorType extends AbstractType
{


    /**
     * 
     * @return string
     */
    public function getParent()
    {
        return 'hidden';
    }

    /**
     * 
     * @return string
     */
    public function getName()
    {
        return 'editor';
    }

}
