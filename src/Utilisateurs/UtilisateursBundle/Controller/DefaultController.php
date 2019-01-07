<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {

        
                // On vérifie que l'utilisateur dispose bien du rôle ROLE_AUTEUR
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            
            return $this->redirectToRoute('admin');
   

        }elseif ($this->get('security.authorization_checker')->isGranted('ROLE_POLICIER')) {

             return $this->redirectToRoute('police_attestation');            

        }elseif ($this->get('security.authorization_checker')->isGranted('ROLE_COMMISSAIRE')) {

             return $this->redirectToRoute('police_attestation_all');
             
        }elseif ($this->get('security.authorization_checker')->isGranted('ROLE_SUPERVISEUR_GENERAL')) {

             return $this->redirectToRoute('police_attestation_superviseur_general');
             
        }elseif ($this->get('security.authorization_checker')->isGranted('ROLE_PERCEPTEUR')) {

             return $this->redirectToRoute('police_attestation_percepteur');
        }
        
        
        
        else{
            // Sinon on déclenche une exception « Accès interdit »
            //throw new AccessDeniedException('Accès limité .');
            return  $this->redirectToRoute('fos_user_security_login');


        }
        
        
    }

    /**
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function showUserAction() {

        if ($this->get('security.authorization_checker')->isgranted('ROLE_ADMIN')) {

            return $this->redirectToRoute('admin');
        }

        if ($this->get('security.authorization_checker')->isgranted('ROLE_POLICIER')) {

           return $this->redirectToRoute('police_attestation');
        }
    }

}
