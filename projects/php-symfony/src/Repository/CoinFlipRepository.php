<?php

namespace App\Repository;

use App\Entity\CoinFlip;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @extends ServiceEntityRepository<CoinFlip>
 *
 * @method CoinFlip|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoinFlip|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoinFlip[]    findAll()
 * @method CoinFlip[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoinFlipRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoinFlip::class);
    }

    //    /**
    //     * @return CoinFlip[] Returns an array of CoinFlip objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?CoinFlip
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    public function findLastTenResultsByUser(UserInterface $user): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.users = :user')
            ->setParameter('user', $user)
            ->orderBy('c.id', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
}
