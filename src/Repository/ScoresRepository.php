<?php

namespace App\Repository;

use App\Entity\Scores;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Scores|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scores|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scores[]    findAll()
 * @method Scores[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScoresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scores::class);
    }

    // Je dois transformer cette requête
    // SELECT MAX(scores.score) AS highscore, user.username
    // FROM scores
    // INNER JOIN user ON user_id = user.id
    // GROUP BY user.username
    // ORDER BY highscore DESC LIMIT 10
    // Dans mon Repository

    public function TakeHighScoresGroupByUsername($results){
        $qb = $this->createQueryBuilder('s');
        return $qb->select(['MAX(s.score) AS highscore', 'u.username'])
            ->innerJoin('s.user', 'u')
            ->groupBy('u.username')
            ->getQuery()->getResult()
            ;
    }

    // /**
    //  * @return Scores[] Returns an array of Scores objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Scores
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
