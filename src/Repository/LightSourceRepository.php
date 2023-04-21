<?php

namespace App\Repository;

use App\Entity\LightSource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LightSource|null find($id, $lockMode = null, $lockVersion = null)
 * @method LightSource|null findOneBy(array $criteria, array $orderBy = null)
 * @method LightSource[]    findAll()
 * @method LightSource[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LightSourceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LightSource::class);
    }

    public function findLightSourcesByQuery($query) {

        $qb = $this
            ->createQueryBuilder('ls')
            ->select('ls')
            ->where('ls.ean LIKE :query')
            ->orWhere('ls.productName LIKE :query')
            ->orWhere('ls.basicCode LIKE :query')
            ->setParameter('query', '%' . $query . '%')
        ;

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findCompatibleLightSources($id) {

        $qb = $this
            ->createQueryBuilder('ls')
            ->select('ls')
            ->leftJoin('ls.compatibleBallasts', 'b')
            ->where('b.id = :id')
            ->setParameter('id', $id);

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findIncompatibleLightSources($id) {

        $qb = $this
            ->createQueryBuilder('ls')
            ->select('ls')
            ->leftJoin('ls.uncompatibleBallasts', 'b')
            ->where('b.id = :id')
            ->setParameter('id', $id);

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findEansForPredefinedSearch($query) {

        $qb = $this
            ->createQueryBuilder('ls')
            ->select('ls')
            ->where('ls.ean LIKE :query')
            ->setParameter('query', '%' . $query . '%')
        ;

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findBCsForPredefinedSearch($query) {

        $qb = $this
            ->createQueryBuilder('ls')
            ->select('ls')
            ->where('ls.basicCode LIKE :query')
            ->setParameter('query', '%' . $query . '%')
        ;

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findProductNameForPredefinedSearch($query) {

        $qb = $this
            ->createQueryBuilder('ls')
            ->select('ls')
            ->where('ls.productName LIKE :query')
            ->setParameter('query', '%' . $query . '%')
        ;

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function advancedSearch($lampType, $length, $wattage, $colorTemperature) {

        $qb = $this
            ->createQueryBuilder('ls')
            ->select('ls')
        ;

        if($lampType != null) {
            $qb->andWhere('ls.lamp_type  = :lampType')
                ->setParameter('lampType', $lampType);
        }

        if($length != null) {
            $qb->andWhere('ls.length = :length')
                ->setParameter('length', $length);
        }

        if($wattage != null) {
            $qb->andWhere('ls.power  = :wattage')
                ->setParameter('wattage', $wattage);
        }

        if($colorTemperature != null) {
            $qb->andWhere('ls.colorTemperature  = :colorTemperature')
                ->setParameter('colorTemperature', $colorTemperature);
        }

        $result = $qb->getQuery()->getResult();

        return $result;
    }
}
