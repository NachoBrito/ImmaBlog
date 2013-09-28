<?php

namespace NachoBrito\ThoughtsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of ThoughtType
 *
 * @author nacho
 */
class ThoughtType extends AbstractType
{

    /**
     * 
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text')
                ->add('content', new EditorType())
                ->add('save', 'submit');
    }

    /**
     * 
     * @return string
     */
    public function getName()
    {
        return 'thought';
    }

}
