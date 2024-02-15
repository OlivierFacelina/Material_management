<?php

namespace App\Repository;

use App\Entity\TrainingProgram;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TrainingProgram>
 *
 * @method TrainingProgram|null find($id, $lockMode = null, $lockVersion = null)
 * @method TrainingProgram|null findOneBy(array $criteria, array $orderBy = null)
 * @method TrainingProgram[]    findAll()
 * @method TrainingProgram[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrainingProgramRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TrainingProgram::class);
    }

//    /**
//     * @return TrainingProgram[] Returns an array of TrainingProgram objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TrainingProgram
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
