<?php

namespace police\PoliceBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class SuperviseurController extends Controller{
    
       /**
     * Permet à un controleur de voir toutes 
     * les attestations de son commissariat
     * @param type $page
     * @return type
     * @throws NotFoundHttpException
     * @throws type
     */
     public function attestationAllAction($page) {
         
         if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
        //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
        $em = $this->getDoctrine()->getManager();
        $commissaire = $em ->getRepository('UtilisateursBundle:Commissaire')
                            ->findOneBy(array('Utilisateurs' => $this->getUser()->getId()));
        $attestations = $em->getRepository('PoliceBundle:Attestation')->attestationCommi($page, $nbrAttPage, $commissaire->getId());
        
         // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($attestations) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            //throw $this->createNotFoundException("La page11 " . $page . " n'existe pas.");
            return $this->redirectToRoute("police_attes_msg");
        }
        
        return $this->render('PoliceBundle:Attestation/superviseur:attestation_commi_all.html.twig', array(
                    'attestations' => $attestations,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
       /**
     * Permet à un controleur de voir toutes 
     * les attestations payées de son commissariat
     * @param type $page
     * @return type
     * @throws NotFoundHttpException
     * @throws type
     */
     public function attestationAllPayerAction($page) {
         
         if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
        //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
        $em = $this->getDoctrine()->getManager();
        $commissaire = $em ->getRepository('UtilisateursBundle:Commissaire')
                            ->findOneBy(array('Utilisateurs' => $this->getUser()->getId()));
        $attestations = $em->getRepository('PoliceBundle:Attestation')->attestGestionPiece($page, $nbrAttPage, $commissaire->getId());
        
         // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($attestations) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            //throw $this->createNotFoundException("La page11 " . $page . " n'existe pas.");
            return $this->redirectToRoute("police_attes_msg");
        }
        
        return $this->render('PoliceBundle:Attestation/superviseur:attestation_commi_all_payer.html.twig', array(
                    'attestations' => $attestations,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
       /**
     * Permet à un controleur de voir toutes 
     * les attestations non payées de son commissariat
     * @param type $page
     * @return type
     * @throws NotFoundHttpException
     * @throws type
     */
     public function attestationAllNonPayerAction($page) {
         
         if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
        //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
        $em = $this->getDoctrine()->getManager();
        $commissaire = $em ->getRepository('UtilisateursBundle:Commissaire')
                            ->findOneBy(array('Utilisateurs' => $this->getUser()->getId()));
        $attestations = $em->getRepository('PoliceBundle:Attestation')->attestGestionPieceNonPayer($page, $nbrAttPage, $commissaire->getId());
        
         // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($attestations) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            //throw $this->createNotFoundException("La page11 " . $page . " n'existe pas.");
            return $this->redirectToRoute("police_attes_msg");
        }
        
        return $this->render('PoliceBundle:Attestation/superviseur:attestation_commi_all_non_payer.html.twig', array(
                    'attestations' => $attestations,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    
     
    /**
     * Permet à un controleur de voir une attestation
     * @param type $id
     * @return Response
     */
    public function attestationCommiAction($id) {
        $em = $this->getDoctrine()->getManager();
        $attestation = $em->getRepository('PoliceBundle:Attestation')->find($id);
        $infraction = $em->getRepository('PoliceBundle:Infraction')->InfractDunAtt($id);
        
        $snappy = $this->get('knp_snappy.pdf');
        
         $html = $this->renderView('PoliceBundle:Attestation/superviseur:attestation_commi_view.html.twig', array(
            'attestation' => $attestation,
            'infractions' => $infraction,
        ));
        
         $filename = 'costom_pdf_from_twig';
        return new Response(
            $snappy->getOutputFromHTML($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );
    }
}
