<?php

namespace NachoBrito\ThoughtsBundle\Form;

use NachoBrito\ThoughtsBundle\Form\Type\EditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ThoughtType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('public')
                ->add('parent')
                ->add('title')
                ->add('content', new EditorType())
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NachoBrito\ThoughtsBundle\Entity\Thought'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'nachobrito_thoughtsbundle_thought';
    }

}
