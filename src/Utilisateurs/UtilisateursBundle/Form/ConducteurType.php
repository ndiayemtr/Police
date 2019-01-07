<?php

namespace Utilisateurs\UtilisateursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ConducteurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('nomConducteur',    TextType::class)
                ->add('prenomConducteur', TextType::class)
                ->add('numeroTelephone',  IntegerType::class)
                ->add('numeroPermis',     TextType::class)
                ->add('ncni',             IntegerType::class)
                ->add('numeroCarteGrise', TextType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Utilisateurs\UtilisateursBundle\Entity\Conducteur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'utilisateurs_utilisateursbundle_conducteur';
    }


}
