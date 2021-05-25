<?php

namespace App\Repository;

use App\Entity\Property;
use App\Model\SearchProperty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Property::class);
    }

    public function findSearchProperty(SearchProperty $searchProperty)
    {
        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder->addOrderBy("p.datePublication", 'DESC');

        /**
         * @var SearchProperty $searchProperty
         */
        if ($searchProperty->getMinArea()){
            $queryBuilder->andWhere('p.area > :minArea');
            $queryBuilder->setParameter('minArea', $searchProperty->getMinArea());
        }
        if ($searchProperty->getMaxArea()){
            $queryBuilder->andWhere('p.area < :maxArea');
            $queryBuilder->setParameter('maxArea', $searchProperty->getMaxArea());
        }
        if ($searchProperty->getMinRooms()){
            $queryBuilder->andWhere('p.room > :minRooms');
            $queryBuilder->setParameter('minRooms', $searchProperty->getMinRooms());
        }
        if ($searchProperty->getMaxRooms()){
            $queryBuilder->andWhere('p.room < :maxRooms');
            $queryBuilder->setParameter('maxRooms', $searchProperty->getMaxRooms());
        }
        if ($searchProperty->getHousseType()){
            $queryBuilder->andWhere('p.type = :housseType');
            $queryBuilder->setParameter('type', $searchProperty->getType());
        }
        if ($searchProperty->getAddress()){
            $queryBuilder->andWhere('p.address LIKE :address');
            $queryBuilder->setParameter('type', $searchProperty->getType());
        }
        if ($searchProperty->getSwimmingPool()){
            $queryBuilder->andWhere('p.swimmingPool = :swimmingPool');
            $queryBuilder->setParameter('swimmingPool', $searchProperty->getSwimmingPool());
        }
        if ($searchProperty->getGarage()){
            $queryBuilder->andWhere('p.garage = :garage');
            $queryBuilder->setParameter('garage', $searchProperty->getGarage());
        }
        if ($searchProperty->getMinPrice()){
            $queryBuilder->andWhere('p.price > :minPrice');
            $queryBuilder->setParameter('minPrice', $searchProperty->getMinPrice());
        }
        if ($searchProperty->getMaxPrice()){
            $queryBuilder->andWhere('p.price < :maxPrice');
            $queryBuilder->setParameter('maxPrice', $searchProperty->getMaxPrice());
        }
        if ($searchProperty->getBuyingOrLeasing()){
            $queryBuilder->andWhere('p.buyingOrLeasing = :buyingOrLeasing');
            $queryBuilder->setParameter('buyingOrLeasing', $searchProperty->getBuyingOrLeasing());
        }

        //nombre d'annonce
        $queryBuilder->select('COUNT(p)');
        $countQuery = $queryBuilder->getQuery();
        $nbProperties = $countQuery->getSingleScalarResult();

        //select annonces
        $queryBuilder->select('p');
        $query = $queryBuilder -> getQuery();

        return [
            'nbProperties' => $nbProperties,
            'properties'=> $query->getResult()
        ];
    }

}
