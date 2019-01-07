<?php
namespace police\PoliceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;

class RechercheType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('recherche', TextType::class, array('label' => false, 'attr' => array('input-medium search-query')));
    }
    
      public function getName(){
        return 'police_policebundle_recherche';
    }
}
