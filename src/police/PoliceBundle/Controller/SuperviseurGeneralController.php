<?php
namespace police\PoliceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperviseurGeneralController extends Controller {
        
    /**
     * Permet a un controle général de voir toutes les attstations 
     * de la police nationale
     * @param type $page
     * @return type
     * @throws NotFoundHttpException
     * @throws type
     */
     public function superviseurGeneralAction($page) {
         
            if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
        //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
        $em = $this->getDoctrine()->getManager();
        $attestations = $em->getRepository('PoliceBundle:Attestation')->allAttestations($page, $nbrAttPage);
        
        // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($attestations) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }
        
        return $this->render('PoliceBundle:Attestation/superviseur_general:attestation_general_all.html.twig', array(
                    'attestations' => $attestations,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    /**
     * Permet a un controle général de voir toutes les attstations 
     * de la police nationale
     * @param type $page
     * @return type
     * @throws NotFoundHttpException
     * @throws type
     */
     public function attestationAllRetirerAction($page) {
         
            if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
        //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
        $em = $this->getDoctrine()->getManager();
        $attestations = $em->getRepository('PoliceBundle:Attestation')->allAttesRetirer($page, $nbrAttPage);
        
        // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($attestations) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }
        
        return $this->render('PoliceBundle:Attestation/superviseur_general:attestation_general_all_retirer.html.twig', array(
                    'attestations' => $attestations,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    
    /**
     * Permet a un controle général de voir toutes les attstations 
     * de la police nationale
     * @param type $page
     * @return type
     * @throws NotFoundHttpException
     * @throws type
     */
     public function attestationAllNonRetirerAction($page) {
         
            if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
        //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
        $em = $this->getDoctrine()->getManager();
        $attestations = $em->getRepository('PoliceBundle:Attestation')->allAttesNonRetirer($page, $nbrAttPage);
        
        // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($attestations) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }
        
        return $this->render('PoliceBundle:Attestation/superviseur_general:attestation_general_all_non_retirer.html.twig', array(
                    'attestations' => $attestations,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
}
