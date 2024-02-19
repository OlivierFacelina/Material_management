<?php

namespace App\Repository;

use App\Entity\MaterialKind;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MaterialKind>
 *
 * @method MaterialKind|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaterialKind|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaterialKind[]    findAll()
 * @method MaterialKind[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaterialKindRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaterialKind::class);
    }

//    /**
//     * @return MaterialKind[] Returns an array of MaterialKind objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MaterialKind
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
