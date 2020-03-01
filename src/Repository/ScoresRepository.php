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

    public function TakeHighScoresGroupByUsername(){
        $qb = $this->createQueryBuilder('s');
        return $qb->select(['MAX(s.score) AS highscore', 'u.username'])
            ->innerJoin('s.user', 'u')
            ->groupBy('u.username')
            ->getQuery()->getResult()
            ;
    }

}
