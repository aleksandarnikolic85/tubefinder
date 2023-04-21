<?php

namespace App\Repository;

use App\Entity\Ballast;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ballast|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ballast|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ballast[]    findAll()
 * @method Ballast[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BallastRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ballast::class);
    }

    public function findBallastByQuery($query) {

        $qb = $this
            ->createQueryBuilder('b')
            ->select('b')
            ->where('b.refNo LIKE :query')
            ->orWhere('b.productName LIKE :query')
            ->setParameter('query', '%' . $query . '%')
        ;

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findCompatibleBallasts($id, $sort) {

        $qb = $this
            ->createQueryBuilder('b')
            ->select('b')
            ->leftJoin('b.compatibleLightSources', 'cls')
            ->where('cls.id = :id')
            ->setParameter('id', $id);

            if($sort != null) {
                $qb->addOrderBy('b.brand', 'ASC');
            }

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findCompatibleBallastsByEan($ean) {

        $qb = $this
            ->createQueryBuilder('b')
            ->select('b')
            ->leftJoin('b.compatibleLightSources', 'cls')
            ->where('cls.ean = :ean')
            ->setParameter('ean', $ean)
            ->addOrderBy('b.brand', 'ASC');


        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findIncompatibleBallasts($id, $sort) {

        $qb = $this
            ->createQueryBuilder('b')
            ->select('b')
            ->leftJoin('b.uncompatibleLightSources', 'cls')
            ->where('cls.id = :id')
            ->setParameter('id', $id);
            if($sort != null) {
                $qb->addOrderBy('b.brand', 'ASC');
            }

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findIncompatibleBallastsByEan($ean) {

        $qb = $this
            ->createQueryBuilder('b')
            ->select('b')
            ->leftJoin('b.uncompatibleLightSources', 'cls')
            ->where('cls.ean = :ean')
            ->setParameter('ean', $ean)
            ->addOrderBy('b.brand', 'ASC');


        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findEansForPredefinedSearch($query) {

        $qb = $this
            ->createQueryBuilder('b')
            ->select('b')
            ->where('b.ean LIKE :query')
            ->setParameter('query', '%' . $query . '%')
        ;

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findRefNosForPredefinedSearch($query) {

        $qb = $this
            ->createQueryBuilder('b')
            ->select('b')
            ->where('b.refNo LIKE :query')
            ->setParameter('query', '%' . $query . '%')
        ;

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findProductNameForPredefinedSearch($query) {

        $qb = $this
            ->createQueryBuilder('b')
            ->select('b')
            ->where('b.productName LIKE :query')
            ->setParameter('query', '%' . $query . '%')
        ;

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    // /**
    //  * @return Ballast[] Returns an array of Ballast objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ballast
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
