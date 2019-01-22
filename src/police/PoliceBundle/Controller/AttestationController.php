<?php

namespace police\PoliceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use police\PoliceBundle\Entity\Attestation;
use police\PoliceBundle\Entity\Infraction;
use police\PoliceBundle\Form\AttestationType;
use police\PoliceBundle\Form\InfractionType;
use police\PoliceBundle\Form\RechercheType;

class AttestationController extends Controller {
    
    public function pageAccueilAction(){
        
         return $this->render('PoliceBundle:Attestation:accueil.html.twig');
        
    }
     
    /**
     * Permet d'ajouter une attestation
     * @param Request $request
     * @return type
     */
    public function attestationAction(Request $request) {
        
        $em = $this->getDoctrine()->getManager();
        
        $policier = $em ->getRepository('UtilisateursBundle:Policier')
                            ->findOneBy(array('utilisateurs' => $this->getUser()->getId()));
        
        $numero     = $em->getRepository('PoliceBundle:Attestation')->getNumeroDispo();
 
        $attestation = new Attestation();
        $attestation->setNumeroAttestation($numero);
        $attestation->setPayer('NON');
        $attestation->setEtatPiece('pas retirée');
        $attestation->setPolicier($policier);
        $attestation->setDate(new \DateTime());
        $attestation->setDateRecuperePermis(new \DateTime());

        $form = $this->createForm(AttestationType::class, $attestation);
        $form->handleRequest($request);
        
        $validator = $this->get('validator');
        
         // On déclenche la validation sur notre object
    $listErrors = $validator->validate($attestation);
    
             // Si le tableau n'est pas vide, on affiche les erreurs
    if(count($listErrors) > 0) {
      //return new Response(print_r($listErrors, true));
      var_dump(count($listErrors));
    die();
      }
    
        if ($request->isMethod('POST') && $form->isValid()) {
            
    
   

            $em->persist($attestation);
            $em->flush();
            $idAttestation = $attestation->getId();

            // $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            return $this->redirectToRoute('police_attestation_liste_infraction', array(
                        'id' => $idAttestation
            ));
        
         }

        return $this->render('PoliceBundle:Attestation/agent_circulation:attestation.html.twig', array(
                    'form' => $form->createView(),
        ));
    }
    
    /**
     * Permet de voir une attestation par un agent
     * @param type $id
     * @return type
     */
    public function attestationViewAgentAction($id) {
        $em = $this->getDoctrine()->getManager();
        $attestation = $em->getRepository('PoliceBundle:Attestation')->find($id);
        $infraction = $em->getRepository('PoliceBundle:Infraction')->InfractDunAtt($id);

        return $this->render('PoliceBundle:Attestation/agent_circulation:attestation_view_agent.html.twig', array(
                    'attestation' => $attestation,
                    'infractions' => $infraction,
        ));
    }
    /**
     * Permet de voir une attestation par un agent
     * @param type $id
     * @return type
     */
    public function attestationValiderAction($id) {
        $em = $this->getDoctrine()->getManager();
        $attestation = $em->getRepository('PoliceBundle:Attestation')->find($id);
        $infraction = $em->getRepository('PoliceBundle:Infraction')->InfractDunAtt($id);

        return $this->render('PoliceBundle:Attestation/agent_circulation:attes_valider_view_agent.html.twig', array(
                    'attestation' => $attestation,
                    'infractions' => $infraction,
        ));
    }
    /**
     * Permet de voir une attestation
     * @param type $id
     * @return type
     */
    public function attestationViewAction($id) {
        $em = $this->getDoctrine()->getManager();
        $attestation = $em->getRepository('PoliceBundle:Attestation')->find($id);
        $infraction = $em->getRepository('PoliceBundle:Infraction')->InfractDunAtt($id);

        return $this->render('PoliceBundle:Attestation/agent_circulation:attes_valider_view_agent.html.twig', array(
                    'attestation' => $attestation,
                    'infractions' => $infraction,
        ));
    }
    
    
    /**
     * Permet à un controleur de voir une attestation
     * @param type $id
     * @return Response
     */
    public function pdfAction($id) {
        $em = $this->getDoctrine()->getManager();
        $attestation = $em->getRepository('PoliceBundle:Attestation')->find($id);
        $infraction = $em->getRepository('PoliceBundle:Infraction')->InfractDunAtt($id);
        
        $snappy = $this->get('knp_snappy.pdf');
        
         $html = $this->renderView('PoliceBundle:Attestation/agent_circulation:pdf.html.twig', array(
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
    
    
    /**
     * Permet de modifier une attestation
     * @param type $id
     * @param Request $request
     * @return type
     * @throws NotFoundHttpException
     */
    public function editAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();
        $attestation = $em->getRepository('PoliceBundle:Attestation')->find($id);

        if (null === $attestation) {
            throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas.");
        }

        $form = $this->createForm(AttestationType::class, $attestation);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            // Inutile de persister ici, Doctrine connait déjà notre atestation
            $em->flush();

            return $this->redirectToRoute('police_attestation_view', array('id' => $attestation->getId()));
        }

        return $this->render('PoliceBundle:Attestation/agent_circulation:attestation_edit.html.twig', array(
                    'attestation' => $attestation,
                    'form' => $form->createView(),
        ));
    }
    
    public function messageAction(){
        return $this->render('PoliceBundle:Attestation:pas_attestation.html.twig');
    }

        /**
     * Permet à un policier de regarder les attestations
     * qu'il a delivrée
     * @param type $page
     * @return type
     * @throws NotFoundHttpException
     * @throws type
     */
     public function AttDunPolicierAction($page) {

        if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
        //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
        $em = $this->getDoctrine()->getManager();
        $policier = $em->getRepository('UtilisateursBundle:Policier')
                ->findOneBy(array('utilisateurs' => $this->getUser()->getId()));
        $attestations = $em->getRepository('PoliceBundle:Attestation')->attestPolicier($page, $nbrAttPage, $policier->getCommissariat());

         // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($attestations) / $nbrAttPage);

        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            //throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
            return $this->redirectToRoute("police_attes_msg");
            //return $this->redirectToRoute('police_attestation');
            
        }

        return $this->render('PoliceBundle:Attestation/agent_circulation:attestation_all_agent.html.twig', array(
                    'attestations' => $attestations,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    
    /**
     * Permet d'afficher le forulaire de recherche
     * @return type
     */
    public function rechercheAction(){
        
        $form = $this->createForm(RechercheType::class);
         return $this->render('PoliceBundle:Attestation:recherche.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    /**
     * Permet de faire une recherche par numero attestation
     * @param Request $request
     * @return type
     * @throws type
     */
    public function rechercheTraitementAction(Request $request) {
        $form = $this->createForm(RechercheType::class);
 
          if ($request->isMethod('POST')) {
            $form->handleRequest($request);
//              return new Response($form['recherche']->getData());
            $em = $this->getDoctrine()->getManager();
            $attestations = $em->getRepository('PoliceBundle:Attestation')->rechercheAttest($form['recherche']->getData());
           
       } 
       else {
            throw $this->createNotFoundException("Attestation introuvable");
        }
        
       return $this->render('PoliceBundle:Attestation/recherche:recherche_attestation.html.twig', array(
                    'attestations' => $attestations,
        ));
   }
   
   /**
    * Permet d'ajouter des infraction à une attestation 
    * @param type $id
    * @param Request $request
    * @return type
    */
    public function listeInfractionAction($id, Request $request) {

        $em = $this->getDoctrine()->getManager();

        $infraction = new Infraction();
        $attestation = $em->getRepository('PoliceBundle:Attestation')->find($id);

        if (null === $attestation) {
            throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas.");
        }

        if (isset($_POST['type_infraction']) AND isset($_POST['nom_infraction']) AND isset($_POST['amende'])) {
            $infraction->setAmende($_POST['amende']);
            $infraction->setTypeInfraction($_POST['type_infraction']);
            $infraction->setNomInfraction($_POST['nom_infraction']);
            $infraction->setAttestation($attestation);
            $em->persist($infraction);
            $em->flush();
        }


        return $this->render('PoliceBundle:Attestation/agent_circulation:liste_infraction.html.twig', array(
                    'id' => $id
        ));
    }

    /**
    * Permet de modifier une infraction d'une attestation 
    * @param type $id
    * @param Request $request
    * @return type
    */
    public function editInfractionAction($id, Request $request){
        
        $em = $this->getDoctrine()->getManager();
        
        $infraction = new Infraction();        
        $infraction     = $em->getRepository('PoliceBundle:Infraction')->find($id);    

        if (null === $infraction) {
            throw new NotFoundHttpException("L'annonce d'id " . $id . " n'existe pas.");
        }
        //$form = $this->createForm(AttestationType::class, $infraction);

        if (isset($_POST['type_infraction']) AND isset($_POST['nom_infraction']) AND isset($_POST['amende'])) {
            $infraction->setAmende($_POST['amende']);
            $infraction->setTypeInfraction($_POST['type_infraction']);
            $infraction->setNomInfraction($_POST['nom_infraction']);
            $em->flush();
        

            return $this->redirectToRoute('police_attestation_valid', array('id' => $infraction->getAttestation()->getId()));
        }

        return $this->render('PoliceBundle:Attestation/agent_circulation:edit_infraction.html.twig', array(
                    'infraction' => $infraction,
        ));
    
     }

    /**
     * Permet de voir la liste des infraction en cours
     * @param type $id
     * @return type
     */
    public function infractionEnCoursAction($id) {
        $em = $this->getDoctrine()->getManager();
       // $attestation = $em->getRepository('PoliceBundle:Attestation')->find($id);
        $infraction = $em->getRepository('PoliceBundle:Infraction')->InfractDunAtt($id);

        return $this->render('PoliceBundle:Attestation/agent_circulation:infraction_en_cours.html.twig', array(
                    //'attestation' => $attestation,
                     'id' => $id,
                    'infractions' => $infraction,
        ));
    }  
        
    

}
