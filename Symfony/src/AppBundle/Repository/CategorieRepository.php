<?php

namespace AppBundle\Repository;

/**
 * CategorieRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategorieRepository extends \Doctrine\ORM\EntityRepository
{
    public function getCategorieIndex(){
        //$qb = $this->_em->createQueryBuilder()->from($this->_entityName, 'a')->select('a');
        // = -> $qb = $this->createQueryBuilder('a');

        $pub = 1;

        $qb = $this->createQueryBuilder('c')
                ->leftJoin('c.articles','a')
                ->leftJoin('a.image','i')
                ->where('a.publication = ?1')
                ->setParameter(1,$pub)

                //->orderBy('a.dateCreation','DESC')
                //->orderBy('a.dateCreation','DESC')

                ->addSelect('a')
                ->addSelect('i') ;

        $query = $qb->getQuery();
        return $query->getResult();
    }

}
