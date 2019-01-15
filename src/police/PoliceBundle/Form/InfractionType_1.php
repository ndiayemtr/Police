<?php

namespace police\PoliceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InfractionType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('nomInfraction', ChoiceType::class, array(
                    'choices' => array(
                        'Pièce' => array(
                            'Conduite d’un véhicule dépourvu de police d’assurance' => 'Conduite d’un véhicule dépourvu de police d’assurance ',
                            'Défaut de présentation de carte grise' => 'Défaut de présentation de carte grise',
                            'Défaut de présentation de permis de conduire' => 'Défaut de présentation de permis de conduire',
                            'Défaut de permis de conduire' => 'Défaut de permis de conduire',
                            'Défaut de présentation de permis de conduire' => 'Défaut de présentation de permis de conduire',
                            'Défaut de présentation de carte grise' => 'Défaut de présentation de carte grise',
                            'Défaut de carte de transport' => 'Défaut de carte de transport',
                        ),
                        'Conduite' => array(
                            'Stationnement sans signalisation appropriée en cas de panne ou de détresse' => 'Stationnement sans signalisation appropriée en cas de panne ou de détresse',
                            'Excès de vitesse' => 'Excès de vitesse',
                            'Stationnement perturbateur' => 'Stationnement perturbateur',
                            'Circulation à gauche' => 'Circulation à gauche',
                            'Changement brusque de direction' => 'Changement brusque de direction',
                            'Refus de priorité' => 'Refus de priorité',
                            'Encombrement de la voie publique' => 'Encombrement de la voie publique',
                            'Inobservation de feux tricolores' => 'Inobservation de feux tricolores',
                            'Encombrement de passage cloué' => 'Encombrement de passage cloué',
                        ),
                        'Equipement' => array(
                            'Défaut de boîte secours' => 'Défaut de boîte secours',
                            'Port de casque non homologué' => 'Port de casque non homologué',
                            'Défaut d’extincteur pour véhicule' => 'Défaut d’extincteur pour véhicule',
                            'transportant un liquide inflammable' => 'transportant un liquide inflammable',
                        ),
                        'Vehicule' => array(
                            'Gabarit non-conforme' => 'Gabarit non-conforme',
                            'Défaut de feux de gabarit' => 'Défaut de feux de gabarit',
                            'Défaillance du système de freinage' => 'Défaillance du système de freinage',
                            'Teinte de vitre de voiture sans autorisation' => 'Teinte de vitre de voiture sans autorisation',
                            'Ceinture de sécurité inopérante ou inexistante' => 'Ceinture de sécurité inopérante ou inexistante',
                            'Croisement défectueux' => 'Croisement défectueux',
                            'Dépassement défectueux' => 'Dépassement défectueux',
                            'Défaut de feux stop ou feu freins' => 'Défaut de feux stop ou feu freins',
                            'Défaut de feux arrière' => 'Défaut de feux arrière',
                            'Défaut d’indicateur de changement de direction (clignotants)' => 'Défaut d’indicateur de changement de direction (clignotants)',
                            'Défaut ou modification de plaque de constructeur' => 'Défaut ou modification de plaque de constructeur',
                            'Défaut de rétroviseur' => 'Défaut de rétroviseur',
                            'Défaut de pré signalisation pour les véhicules de 10 tonnes et plus' => 'Défaut de pré signalisation pour les véhicules de 10 tonnes et plus',
                            'Échappement libre ou bruyant' => 'Échappement libre ou bruyant',
                            'Défaut de phare' => 'Défaut de phare',
                        ),
                        'Operation' => array(
                            'Transport mixe de marchandises et des passagers' => 'Transport mixe de marchandises et des passagers',
                            'Surcharge de marchandises' => 'Surcharge de marchandises',
                        ),
                        'Immatriculation' => array(
                            'Défaut d’immatriculation' => 'Défaut d’immatriculation',
                            'Défaut de plaque d’immatriculation' => 'Défaut de plaque d’immatriculation',
                            'Illisibilité de plaque d’immatriculation' => 'Illisibilité de plaque d’immatriculation',
                            'Plaque d’immatriculation non-conforme' => 'Plaque d’immatriculation non-conforme',
                            'Défaut d’immatriculation' => 'Défaut d’immatriculation',
                            'Défaut de plaque d’immatriculation' => 'Défaut de plaque d’immatriculation',
                        ),
                    ),
                ))
                ->add('amende', ChoiceType::class, array(
                    'choices' => array(
                        '2500' => '2500',
                        '3000' => '3000',
                        '5000' => '5000',
                        '10000' => '10000',
                        '15000' => '15000',
                        '20000' => '20000',
                        '30000' => '30000',
                    ),
                ))
                ->add('typeInfraction', ChoiceType::class, array(
                    'choices' => array(
                        'Pièce' => 'Pièce',
                        'Conduite' => 'Conduite',
                        'Equipement' => 'Equipement',
                        'Vehicule' => 'Vehicule',
                        'Operation' => 'Operation',
                        'Immatriculation' => 'Immatriculation'
                    ),
                ))
                ->add('categorie', ChoiceType::class, array(
                    'choices' => array(
                        '4R&+' => '4R&+',
                        '2R' => '2R',
                    ),
//                    'expanded' => true,
//                    'multiple' => false,
                ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'police\PoliceBundle\Entity\Infraction'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'police_policebundle_infraction';
    }

}
