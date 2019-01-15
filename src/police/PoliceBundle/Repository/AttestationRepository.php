<?php

namespace police\PoliceBundle\Repository;

use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * AttestationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AttestationRepository extends \Doctrine\ORM\EntityRepository {
    
    /**
     * Permet de recupérer les attestations D'un Commissariat
     * @param type $page
     * @param type $nbrAffichPage
     * @param type $idCommissaire
     * @return Paginator
     */
    public function attestationCommi($page, $nbrAffichPage, $idCommissaire) {
        $qb = $this->createQueryBuilder('att')
                ->select('att')
                ->leftJoin('att.policier', 'pol')
                ->leftJoin('pol.commissariat', 'com')
                ->leftJoin('com.commissaire', 'commi')
                ->andWhere('commi.id =:id')
                ->setParameter('id', $idCommissaire)
                ->orderBy('att.id', 'DESC');

        $qb
           // On définit l'annonce à partir de laquelle commencer la liste
           ->setFirstResult(($page-1) * $nbrAffichPage)
           // Ainsi que le nombre d'annonce à afficher sur une page
           ->setMaxResults($nbrAffichPage) ;
            
            return new Paginator($qb, true);
    }
    
    /**
     *  recupérer les attestations 
     * @param type $page
     * @param type $nbrAffichPage
     * @return Paginator
     */
    public function allAttestations($page, $nbrAffichPage){
        
        $qb = $this->createQueryBuilder('att')
                ->select('att')
                ->getQuery();
        $qb
           // On définit l'annonce à partir de laquelle commencer la liste
           ->setFirstResult(($page-1) * $nbrAffichPage)
           // Ainsi que le nombre d'annonce à afficher sur une page
           ->setMaxResults($nbrAffichPage) ;
            
            return new Paginator($qb, true);
        
    }
    /**
     *  recupérer les attestations retirées
     * @param type $page
     * @param type $nbrAffichPage
     * @return Paginator
     */
    public function allAttesRetirer($page, $nbrAffichPage){
        $retirer = 'retirée';
        $qb = $this->createQueryBuilder('att')
                ->select('att')
                ->andWhere('att.etatPiece =:etatPiece')
                ->setParameter('etatPiece', $retirer)
                ->getQuery();
        $qb
           // On définit l'annonce à partir de laquelle commencer la liste
           ->setFirstResult(($page-1) * $nbrAffichPage)
           // Ainsi que le nombre d'annonce à afficher sur une page
           ->setMaxResults($nbrAffichPage) ;
            
            return new Paginator($qb, true);
        
    }
    /**
     *  recupérer les attestations non retirées
     * @param type $page
     * @param type $nbrAffichPage
     * @return Paginator
     */
    public function allAttesNonRetirer($page, $nbrAffichPage){
        $retirer = 'pas retirée';
       $qb = $this->createQueryBuilder('att')
                ->select('att')
                ->andWhere('att.etatPiece =:etatPiece')
                ->setParameter('etatPiece', $retirer)
                ->getQuery();
        $qb
           // On définit l'annonce à partir de laquelle commencer la liste
           ->setFirstResult(($page-1) * $nbrAffichPage)
           // Ainsi que le nombre d'annonce à afficher sur une page
           ->setMaxResults($nbrAffichPage) ;
            
            return new Paginator($qb, true);
        
    }

        /**
     * Permet de recuper les attestation d'un Policier
     * @param type $page
     * @param type $nbrAffichPage
     * @param type $idPolicier
     * @return Paginator
     */
     public function attestPolicier($page, $nbrAffichPage, $idPolicier) {
        $qb = $this->createQueryBuilder('att')
                ->select('att')
                ->leftJoin('att.policier', 'pol')
                ->andWhere('pol.id =:id')
                ->setParameter('id', $idPolicier)
                ->orderBy('att.id', 'DESC')
                ->getQuery();
        $qb
           // On définit l'annonce à partir de laquelle commencer la liste
           ->setFirstResult(($page-1) * $nbrAffichPage)
           // Ainsi que le nombre d'annonce à afficher sur une page
           ->setMaxResults($nbrAffichPage) ;
            
            return new Paginator($qb, true);
    }
    
    //Permet de rechercher une attestation
       public function rechercheAttest($chaine){
        $qb = $this->createQueryBuilder('att')
                 ->select('att')
            ->where('att.numeroAttestation = :numeroAttestation')
            ->andWhere('att.numeroAttestation = :numeroAttestation')
            ->setParameter('numeroAttestation', $chaine)
            ->orderBy('att.numeroAttestation');
        
    return $qb->getQuery()->getResult();
    }

    /**
     * permet au percepteur de voir les attestations de son commissariat
     * @param type $page
     * @param type $nbrAffichPage
     * @param type $idPercepteur
     * @return Paginator
     */
    public function attestPercept($page, $nbrAffichPage, $idPercepteur) {
        $qb = $this->createQueryBuilder('att')
                ->select('att')
                ->leftJoin('att.policier', 'pol')
                ->leftJoin('pol.commissariat', 'com')
                ->andWhere('com.id =:id')
                ->setParameter('id', $idPercepteur)
                ->orderBy('att.id', 'DESC')
                ->getQuery();
        $qb
           // On définit l'annonce à partir de laquelle commencer la liste
           ->setFirstResult(($page-1) * $nbrAffichPage)
           // Ainsi que le nombre d'annonce à afficher sur une page
           ->setMaxResults($nbrAffichPage) ;
            
            return new Paginator($qb, true);
    }
    /**
     * permet à un gestionnaire  de voir les attestations payés de son commissariat
     * @param type $page
     * @param type $nbrAffichPage
     * @param type $idGestionnaire
     * @return Paginator
     */
    public function attestGestionPiece($page, $nbrAffichPage, $idGestionnaire) {
        $payer = 'OUI';
        $qb = $this->createQueryBuilder('att')
                ->select('att')
                ->leftJoin('att.policier', 'pol')
                ->leftJoin('pol.commissariat', 'com')
                ->andWhere('com.id =:id')
                ->setParameter('id', $idGestionnaire)
                ->andWhere('att.payer =:payer')
                ->setParameter('payer', $payer)
                ->orderBy('att.id', 'DESC')
                ->getQuery();
        $qb
           // On définit l'annonce à partir de laquelle commencer la liste
           ->setFirstResult(($page-1) * $nbrAffichPage)
           // Ainsi que le nombre d'annonce à afficher sur une page
           ->setMaxResults($nbrAffichPage) ;
            
            return new Paginator($qb, true);
    }
    /**
     * permet à un gestionnaire  de voir les attestations non payés
     * de son commissariat
     * @param type $page
     * @param type $nbrAffichPage
     * @param type $idGestionnaire
     * @return Paginator
     */
    public function attestGestionPieceNonPayer($page, $nbrAffichPage, $idGestionnaire) {
        $payer = 'NON';
        $qb = $this->createQueryBuilder('att')
                ->select('att')
                ->leftJoin('att.policier', 'pol')
                ->leftJoin('pol.commissariat', 'com')
                ->andWhere('com.id =:id')
                ->setParameter('id', $idGestionnaire)
                ->andWhere('att.payer =:payer')
                ->setParameter('payer', $payer)
                ->orderBy('att.id', 'DESC')
                ->getQuery();
        $qb
           // On définit l'annonce à partir de laquelle commencer la liste
           ->setFirstResult(($page-1) * $nbrAffichPage)
           // Ainsi que le nombre d'annonce à afficher sur une page
           ->setMaxResults($nbrAffichPage) ;
            
            return new Paginator($qb, true);
    }

    public function getNumeroDispo() {
        $date = new \DateTime;
        $debutNum = $date->format('Ym');
        $qb = $this->createQueryBuilder('att')
                ->add('select', '(att.numeroAttestation)as num');
        $qb->where($qb->expr()->like('att.numeroAttestation', ':numero'))
                ->setParameter('numero', '%' . $debutNum . '%')
                ->orderBy('att.numeroAttestation', 'DESC')
                ->setMaxResults(1);

        $num = $qb->getQuery()
                ->getResult();
        if (count($num) >> 0) {
            return $num[0]['num'] + 1;
        } else {
            return $debutNum . "01";
        }
    }

}
