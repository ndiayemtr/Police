<?php

namespace police\PoliceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

class GestionPieceController extends Controller {
    
    /**
     * Permet à un Gestion de Piece de voir les attestations de son commissariat
     * Payé uniquement
     * @return type Attestation
     */
    public function GestionPieceAction($page) {
        
         if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
        //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
         $em = $this->getDoctrine()->getManager();
        $gestionPiece = $em ->getRepository('UtilisateursBundle:Policier')
                            ->findOneBy(array('utilisateurs' => $this->getUser()->getId()));
        $attestations = $em->getRepository('PoliceBundle:Attestation')->attestGestionPiece($page, $nbrAttPage, $gestionPiece->getCommissariat());
        
          // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($attestations) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }
        
        return $this->render('PoliceBundle:Attestation/gestion_piece:gestion_piece.html.twig', array(
                    'attestations' => $attestations,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    
        /**
     * Permet de remettre les piéces confisquées
     * @param type $id
     * @param Request $request
     * @return type
     * @throws NotFoundHttpException
     */
    public function remettrePieceAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $attestation = $em->getRepository('PoliceBundle:Attestation')->find($id);

        if (null === $attestation) {
            throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas.");
        }
        
        $attestation->setEtatPiece('retirée');
        
        $em->flush();
        
        return $this->redirectToRoute('police_attestation_gestion_piece');
       
    }
}
