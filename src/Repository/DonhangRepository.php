<?php

namespace App\Repository;

use App\Entity\Donhang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Donhang>
 *
 * @method Donhang|null find($id, $lockMode = null, $lockVersion = null)
 * @method Donhang|null findOneBy(array $criteria, array $orderBy = null)
 * @method Donhang[]    findAll()
 * @method Donhang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DonhangRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Donhang::class);
    }

//    /**
//     * @return Donhang[] Returns an array of Donhang objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Donhang
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
