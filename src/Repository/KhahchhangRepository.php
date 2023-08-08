<?php

namespace App\Repository;

use App\Entity\Khahchhang;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Khahchhang>
 *
 * @method Khahchhang|null find($id, $lockMode = null, $lockVersion = null)
 * @method Khahchhang|null findOneBy(array $criteria, array $orderBy = null)
 * @method Khahchhang[]    findAll()
 * @method Khahchhang[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KhahchhangRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Khahchhang::class);
    }

//    /**
//     * @return Khahchhang[] Returns an array of Khahchhang objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('k.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Khahchhang
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
