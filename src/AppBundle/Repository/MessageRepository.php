<?php

namespace AppBundle\Repository;

/**
 * MessageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MessageRepository extends \Doctrine\ORM\EntityRepository
{
    public function getMessageAndResponses($id)
    {
        $qb = $this->createQueryBuilder('m')
            ->leftJoin('m.responses', 'r')
            ->addSelect('r')
            ->where('m.id = :id')
            ->setParameter('id', $id)
            ->getQuery();
        return $qb->getOneOrNullResult();
    }

    public function getOpenMessageByUser($user)
    {
        $qb = $this->createQueryBuilder('m')
            ->select('m')
            ->where('m.closed LIKE :closed')
            ->andWhere('m.user = :user')
            ->setParameter( 'closed', false)
            ->setParameter( 'user', $user)
            ->getQuery();

        $messages = $qb->getResult();
        return $messages;
    }
}
