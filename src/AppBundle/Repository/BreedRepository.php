<?php

namespace AppBundle\Repository;

/**
 * BreedRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BreedRepository extends \Doctrine\ORM\EntityRepository
{

    public function getBreedBySpecies($tag)
    {
        return $this
            ->createQueryBuilder('b')
            ->where('b.species = :tag')
            ->setParameter('tag', $tag)
            ;
    }
}