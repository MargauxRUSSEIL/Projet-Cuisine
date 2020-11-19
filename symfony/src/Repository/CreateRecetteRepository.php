<?php

namespace App\Repository;

use App\Entity\CreateRecette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CreateRecette|null find($id, $lockMode = null, $lockVersion = null)
 * @method CreateRecette|null findOneBy(array $criteria, array $orderBy = null)
 * @method CreateRecette[]    findAll()
 * @method CreateRecette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreateRecetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreateRecette::class);
    }

    // /**
    //  * @return CreateRecette[] Returns an array of CreateRecette objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CreateRecette
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
