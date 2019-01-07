<?php

namespace police\PoliceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Utilisateurs\UtilisateursBundle\Form\PolicierType;
use Utilisateurs\UtilisateursBundle\Form\ConducteurType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AttestationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('numeroAttestation', IntegerType::class)
                ->add('date',              DateType::class)
                ->add('lieu',              TextType::class)
                ->add('infractionConstater',TextareaType::class)
                ->add('aLieu',             TextType::class)
                ->add('dateRecuperePermis',DateType::class)
                ->add('conducteur',        ConducteurType::class);
            
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'police\PoliceBundle\Entity\Attestation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'police_policebundle_attestation';
    }


}
