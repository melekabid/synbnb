<?php

namespace App\Repository;

use App\Entity\Techniquemachine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Techniquemachine|null find($id, $lockMode = null, $lockVersion = null)
 * @method Techniquemachine|null findOneBy(array $criteria, array $orderBy = null)
 * @method Techniquemachine[]    findAll()
 * @method Techniquemachine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechniquemachineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Techniquemachine::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Techniquemachine $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Techniquemachine $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return Techniquemachine[] Returns an array of Techniquemachine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Techniquemachine
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
