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
        $builder->add('title', 'text', array(
                    'attr' => array(
                        'class' => 'span12'
                    )
                        )
                )
                ->add('content', new EditorType())
                ->add('save', 'submit', array(
                    'attr' => array(
                        'class' => 'btn btn-primary'
                    )
        ));
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
