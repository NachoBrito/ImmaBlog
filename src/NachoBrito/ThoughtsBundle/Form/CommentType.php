<?php

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


/**
 * Description of CommentType
 *
 * @author nacho
 */
class CommentType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder                                
                ->add('title')                
                ->add('content', 'textarea')
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
        return 'nachobrito_thoughtsbundle_thought_comment';
    }

}
