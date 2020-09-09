<?php

namespace App\Repository;

use App\Entity\Maisons;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Maisons|null find($id, $lockMode = null, $lockVersion = null)
 * @method Maisons|null findOneBy(array $criteria, array $orderBy = null)
 * @method Maisons[]    findAll()
 * @method Maisons[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaisonsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Maisons::class);
    }

    // /**
    //  * @return Maisons[] Returns an array of Maisons objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Maisons
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findSix()
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.id> :val')
            ->setParameter('val','0')
            ->orderBy('s.id','DESC')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult()
        ;
    }


    public function findByMinSize($superficieMini)
    {
        return $this->createQueryBuilder('ms')
        ->andWhere('ms.superficie < :val')
        ->setParameter('val', $superficieMini)
        ->orderBy('ms.superficie', 'DESC')
        ->getQuery()
        ->getResult()
        ;

    }

}
