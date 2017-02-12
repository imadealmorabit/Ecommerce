<?php

namespace Ecommerce\EcommerceBundle\Repository;

/**
 * ProduitsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitsRepository extends \Doctrine\ORM\EntityRepository
{
        public function findByCategorie($categorie)
    {
      $qb = $this->createQueryBuilder('p')
              //->leftJoin('p.categorie', 'cat')
              ->leftJoin('p.image', 'im')
              ->addSelect('im')
              ;

      $qb
        ->where('p.categorie = :categorie')
        ->andWhere('p.disponible = 1')
        ->setParameter('categorie', $categorie)
      ;

      return $qb
        ->getQuery()
        ->getResult()
      ;
    }
    
    public function findWithMedia()
    {
      $qb = $this->createQueryBuilder('p')
              ->andWhere('p.disponible = 1')
              ->leftJoin('p.image', 'im')
              ->addSelect('im')
              ;


      return $qb
        ->getQuery()
        ->getResult()
      ;
    }
    
    
     public function recherche($nom)
    {
      $qb = $this->createQueryBuilder('p')           
              ;

      $qb
     ->where('p.nom like :nom')
     ->andWhere('p.disponible = 1')
     ->setParameter('nom', $nom)
      ;

      return $qb
        ->getQuery()
        ->getResult()
      ;
    }
    
    
    
    public function findArray($tab)
    {
      $qb = $this->createQueryBuilder('p')           
              ;

      $qb
     ->where('p.id IN :tab')
     ->setParameter('tab', $tab)
      ;

      return $qb
        ->getQuery()
        ->getResult()
      ;
    }
    
    
}
