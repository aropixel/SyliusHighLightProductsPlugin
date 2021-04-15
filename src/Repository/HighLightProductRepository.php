<?php


namespace Aropixel\SyliusHighLightProductsPlugin\Repository;

use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class HighLightProductRepository extends ServiceEntityRepository implements HighLightProductRepositoryInterface
{

    public function __construct(
        ManagerRegistry $registry,
        $highLighProductsEntityClass
    ) {
        parent::__construct($registry, $highLighProductsEntityClass);
    }

}
