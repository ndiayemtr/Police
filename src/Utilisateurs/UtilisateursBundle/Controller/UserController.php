<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use police\PoliceBundle\Entity\Commissariat;
use Utilisateurs\UtilisateursBundle\Entity\Policier;
use Utilisateurs\UtilisateursBundle\Entity\Commissaire;
use Utilisateurs\UtilisateursBundle\Entity\Utilisateurs;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController AS BaseAdminController;

class UserController extends BaseAdminController {

    /**
     * @param object $entity
     */
    protected function prePersistEntity($entity) {
        $em = $this->getDoctrine()->getManager();

        $user = new Utilisateurs();

        if ($entity instanceof Policier) {
            if ($entity->getTypePolicier() == 'Agent de circulation') {
                $user->addRole("ROLE_POLICIER");
                $user->setSalt($entity->getPrenomPolicier());
                $user->setUsername($entity->getPrenomPolicier());
                $user->setEnabled(true);
                $user->setPlainPassword($entity->getNomPolicier());
                $user->setUsernameCanonical($entity->getNomPolicier());
                $user->setEmailCanonical($entity->getNomPolicier() . "@gmail.com");
                $user->setEmail($entity->getNomPolicier() . "@gmail.com");
            } elseif ($entity->getTypePolicier() == 'Agent remet piéce') {
                $user->addRole("ROLE_REMETTRE_PIECE");
                $user->setSalt($entity->getPrenomPolicier());
                $user->setUsername($entity->getPrenomPolicier());
                $user->setEnabled(true);
                $user->setPlainPassword($entity->getNomPolicier());
                $user->setUsernameCanonical($entity->getNomPolicier());
                $user->setEmailCanonical($entity->getNomPolicier() . "@gmail.com");
                $user->setEmail($entity->getNomPolicier() . "@gmail.com");
            } elseif ($entity->getTypePolicier() == 'Percepteur') {
                $user->addRole("ROLE_PERCEPTEUR");
                $user->setSalt($entity->getPrenomPolicier());
                $user->setUsername($entity->getPrenomPolicier());
                $user->setEnabled(true);
                $user->setPlainPassword($entity->getNomPolicier());
                $user->setUsernameCanonical($entity->getNomPolicier());
                $user->setEmailCanonical($entity->getNomPolicier() . "@gmail.com");
                $user->setEmail($entity->getNomPolicier() . "@gmail.com");
            }

            $em->persist($user);
            $em->flush();
            $entity->setUtilisateurs($user);
           
        } elseif ($entity instanceof Commissaire) {
            if ($entity->getTypeSuperviseur() == 'Superviseur') {
                $user->addRole("ROLE_COMMISSAIRE");
                $user->setSalt($entity->getPrenomCommissaire());
                $user->setUsername($entity->getPrenomCommissaire());
                $user->setEnabled(true);
                $user->setPlainPassword($entity->getNomCommissaire());
                $user->setUsernameCanonical($entity->getNomCommissaire());
                $user->setEmailCanonical($entity->getNomCommissaire() . "@gmail.com");
                $user->setEmail($entity->getNomCommissaire() . "@gmail.com");
            } elseif ($entity->getTypeSuperviseur() == 'Superviseur General') {
                $user->addRole("ROLE_SUPERVISEUR_GENERAL");
                $user->setSalt($entity->getPrenomCommissaire());
                $user->setUsername($entity->getPrenomCommissaire());
                $user->setEnabled(true);
                $user->setPlainPassword($entity->getNomCommissaire());
                $user->setUsernameCanonical($entity->getNomCommissaire());
                $user->setEmailCanonical($entity->getNomCommissaire() . "@gmail.com");
                $user->setEmail($entity->getNomCommissaire() . "@gmail.com");
            }

             var_dump($user->getRoles());
            $em->persist($user);
            $em->flush();
            $entity->setUtilisateurs($user);
        }
    }

    /**
     * Allows applications to modify the entity associated with the item being
     * edited before persisting it.
     *
     * @param object $entity
     */
    protected function preUpdateEntity($entity) {
        $em = $this->getDoctrine()->getManager();

        $user = $entity->getUser();
        if ($entity instanceof Policier) {
            $user->setEmail($entity->getNomPolicier());
            $user->setUsername($entity->getPrenom());
        } elseif ($entity instanceof Commissariat) {
            $user->setUsername($entity->getPrenom());
            $user->setEmail($entity->getEmail());
        }


        $em->persist($user);
        $em->flush();
    }

}
