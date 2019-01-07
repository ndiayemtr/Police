<?php

namespace Utilisateurs\UtilisateursBundle\Form;
use police\PoliceBundle\Form\CommissariatType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PolicierType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('nomPolicier',         TextType::class)
                ->add('prenomPolicier',      TextType::class)
                ->add('matriculeDuPolicier', TextType::class)
                 ->add('genre',ChoiceType::class, array(
                'expanded' => false,
                'multiple' => false,
                'choices'  => array(
                    'Agent de circulation' => 'Agent de circulation',
                    'Agent remet piéce' => 'Agent remet piéce',
                    'Percepteur'  => 'Percepteur',
                )))
                ->add('commissariat',        CommissariatType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Utilisateurs\UtilisateursBundle\Entity\Policier'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'utilisateurs_utilisateursbundle_policier';
    }


}
