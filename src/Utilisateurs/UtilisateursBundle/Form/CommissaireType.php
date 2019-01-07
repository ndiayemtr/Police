<?php

namespace Utilisateurs\UtilisateursBundle\Form;
use police\PoliceBundle\Form\CommissariatType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class CommissaireType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('nomCommissaire',    TextType::class)
                ->add('prenomCommissaire', TextType::class)
                ->add('commissariat',      CommissariatType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Utilisateurs\UtilisateursBundle\Entity\Commissaire'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'utilisateurs_utilisateursbundle_commissaire';
    }


}
