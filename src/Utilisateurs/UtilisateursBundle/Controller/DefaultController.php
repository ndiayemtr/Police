<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Utilisateurs\UtilisateursBundle\Entity\Test;
use Utilisateurs\UtilisateursBundle\Form\TestType;
use Symfony\Component\HttpFoundation\Request;

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
        elseif ($this->get('security.authorization_checker')->isGranted('ROLE_REMETTRE_PIECE')) {

             return $this->redirectToRoute('police_attestation_gestion_piece');
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
    
    public function testeAction(Request $request){
        
        $em = $this->getDoctrine()->getManager();
        $test = new Test();
        $form = $this->createForm(TestType::class, $test);
        $form->handleRequest($request);
        
        if ($request->isMethod('POST') && $form->isValid()) {
            $em->persist($test);
            $em->flush();

            return $this->redirectToRoute('test');
        
         }
        return $this->render('UtilisateursBundle:Default:teste.html.twig', array(
                    'form' => $form->createView(),
        ));

    }

}
