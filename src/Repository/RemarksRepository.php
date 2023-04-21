<?php

namespace App\Repository;

use App\Entity\Remarks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Remarks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Remarks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Remarks[]    findAll()
 * @method Remarks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RemarksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Remarks::class);
    }

    // /**
    //  * @return Remarks[] Returns an array of Remarks objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Remarks
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
