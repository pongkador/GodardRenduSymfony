<?php

namespace AppBundle\Entity;

use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityRepository;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends EntityRepository
{
    public function findApi($id = null)
    {
        $qb = $this->createQueryBuilder('a');

        if( null !== $id){
            $qb
                ->where('a.id = :id')
                ->setParameter(':id', $id)
            ;
        }

        return  null === $id ? $qb->getQuery()->getArrayResult() : $qb->getQuery()->getSingleResult(AbstractQuery::HYDRATE_ARRAY);
    }
}
