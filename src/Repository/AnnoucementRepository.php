<?php

namespace App\Repository;

use App\Entity\Annoucement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;

/**
 * @method Annoucement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annoucement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annoucement[]    findAll()
 * @method Annoucement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnoucementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annoucement::class);
    }

    public function find2() : array {
        return $this->createQueryBuilder('find2')
            ->orderBy('find2.price', 'DESC')
            ->setMaxResults(2)
            ->getQuery()
            ->getResult();
    }

    public function findById(int $id) {
        return $this->createQueryBuilder('findById')
            ->where('findById.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }

    public function findRecordsSize() {
        try {
            return $this->createQueryBuilder('findAll')
                ->select('COUNT(findAll)')
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NonUniqueResultException $e) {
        }
    }

    public function findFromTo($start, $end) {
        return $this->createQueryBuilder('find2')
            ->setFirstResult($start)
            ->setMaxResults($end)
            ->getQuery()
            ->getResult();
    }
}
