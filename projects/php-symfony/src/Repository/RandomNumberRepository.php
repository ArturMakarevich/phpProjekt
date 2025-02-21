<?php

namespace App\Repository;

use App\Entity\RandomNumber;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @extends ServiceEntityRepository<RandomNumber>
 *
 * @method RandomNumber|null find($id, $lockMode = null, $lockVersion = null)
 * @method RandomNumber|null findOneBy(array $criteria, array $orderBy = null)
 * @method RandomNumber[]    findAll()
 * @method RandomNumber[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RandomNumberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RandomNumber::class);
    }

    //    /**
    //     * @return RandomNumber[] Returns an array of RandomNumber objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?RandomNumber
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    public function findLastTenResultsByUser(UserInterface $user): array
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.users = :user')
            ->setParameter('user', $user)
            ->orderBy('r.id', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
}
