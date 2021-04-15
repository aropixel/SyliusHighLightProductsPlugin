<?php


namespace Aropixel\SyliusHighLightProductsPlugin\Repository;


use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class HighLightProductRepository extends ServiceEntityRepository implements HighLightProductRepositoryInterface
{

    public function __construct(
        ManagerRegistry $registry,
        $highLighProductsEntityClass
    ) {
        parent::__construct($registry, $highLighProductsEntityClass);
    }

}
