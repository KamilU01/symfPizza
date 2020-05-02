<?php

namespace App\Repository;

use App\Entity\DddMenuPizzaGroups;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DddMenuPizzaGroups|null find($id, $lockMode = null, $lockVersion = null)
 * @method DddMenuPizzaGroups|null findOneBy(array $criteria, array $orderBy = null)
 * @method DddMenuPizzaGroups[]    findAll()
 * @method DddMenuPizzaGroups[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DddMenuPizzaGroupsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DddMenuPizzaGroups::class);
    }

    // /**
    //  * @return DddMenuPizzaGroups[] Returns an array of DddMenuPizzaGroups objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DddMenuPizzaGroups
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @return Groups[]
     */
    public function findGroups()
    {
        $query = $entityManager->createQuery(
            'SELECT g.ig, g.name
            FROM AppBundle:DddMenuPizzaGroups g'
        );
    }
}
