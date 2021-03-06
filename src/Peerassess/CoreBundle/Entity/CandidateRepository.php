<?php

namespace Peerassess\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CandidateRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CandidateRepository extends EntityRepository
{
    public function findAll()
    {
        $qb = $this->createQueryBuilder('candidate');
        $qb->leftJoin('candidate.user', 'u')->addSelect('u');

        $qb->where('u.type = :type')->setParameter('type', UserType::CANDIDATE);

        return $qb->getQuery()->getResult();
    }
}
