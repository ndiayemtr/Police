<?php

namespace police\PoliceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CaissierController extends Controller { 
    /**
     * Permet à un percepteur de voir les attestations de son commissariat
     * Payé ou non payé
     * @return type Attestation
     */
    public function percepteurAction($page) {
        
         if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
        //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
         $em = $this->getDoctrine()->getManager();
        $percepteur = $em ->getRepository('UtilisateursBundle:Policier')
                            ->findOneBy(array('utilisateurs' => $this->getUser()->getId()));
        $attestations = $em->getRepository('PoliceBundle:Attestation')->attestPercept($page, $nbrAttPage, $percepteur->getCommissariat());
        
          // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($attestations) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }
        
        return $this->render('PoliceBundle:Attestation/caissier:percepteur.html.twig', array(
                    'attestations' => $attestations,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    
    /**
     * Permet de payer une attestation
     * @param type $id
     * @param Request $request
     * @return type
     * @throws NotFoundHttpException
     */
    public function attesPayerAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $attestation = $em->getRepository('PoliceBundle:Attestation')->find($id);

        if (null === $attestation) {
            throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas.");
        }
        
        $attestation->setPayer('OUI');
        
        $attestation->setDateRecuperePermis(new \DateTime());
        
        $em->flush();
        
        return $this->redirectToRoute('police_attestation_percepteur');
       
    }
    
      /**
     * Permet de verifier une attestation par un caissier
     * @param type $id
     * @return type
     */
    public function VerificationAction($id) {
        $em = $this->getDoctrine()->getManager();
        $attestation = $em->getRepository('PoliceBundle:Attestation')->find($id);
        $infraction = $em->getRepository('PoliceBundle:Infraction')->InfractDunAtt($id);

        return $this->render('PoliceBundle:Attestation/caissier:verifier_attestation.html.twig', array(
                    'attestation' => $attestation,
                    'infractions' => $infraction,
        ));
    }
    
    

}
