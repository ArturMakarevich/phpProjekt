<?php

namespace App\Repository;

use App\Entity\RollDice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @extends ServiceEntityRepository<RollDice>
 *
 * @method RollDice|null find($id, $lockMode = null, $lockVersion = null)
 * @method RollDice|null findOneBy(array $criteria, array $orderBy = null)
 * @method RollDice[]    findAll()
 * @method RollDice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RollDiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RollDice::class);
    }

    //    /**
    //     * @return RollDice[] Returns an array of RollDice objects
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

    //    public function findOneBySomeField($value): ?RollDice
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
