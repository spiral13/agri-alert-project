<?php

namespace AppBundle\Repository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends \Doctrine\ORM\EntityRepository
{

    public function findLike($label,$user)
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.label LIKE :label')
            ->andWhere('p.user = :user')
            ->setParameter( 'label', $label.'%')
            ->setParameter( 'user', $user)
            ->getQuery();

        $results = $qb->getResult();
        return $results;
    }

    public function findAlert($user)
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.hasAlert LIKE :alert')
            ->andWhere('p.user = :user')
            ->setParameter( 'alert', true)
            ->setParameter( 'user', $user)
            ->getQuery();

        $products = $qb->getResult();
        return $products;
    }
}
