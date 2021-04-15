<?php


namespace Aropixel\SyliusHighLightProductsPlugin\Controller;

use Aropixel\SyliusHighLightProductsPlugin\Repository\HighLightProductRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HighLightProductsController extends AbstractController
{
    /**
     * @var HighLightProductRepositoryInterface
     */
    private $highLightProductRepository;

    public function __construct(HighLightProductRepositoryInterface $highLightProductRepository)
    {
        $this->highLightProductRepository = $highLightProductRepository;
    }

    public function displayHighLightProductsByCode($code): Response
    {
        $highLightProductsBloc = $this->highLightProductRepository->findOneBy([
            'code' => $code,
            'enabled' => true
        ]);

        return $this->render('@AropixelSyliusHighLightProductsPlugin/Front/HighLightProducts/displayBlock.html.twig', [
            'highLightProductsBloc' => $highLightProductsBloc
        ]);
    }

    public function displayAllHighLightProducts(): Response
    {
        $highLightProductsBlocs = $this->highLightProductRepository->findBy([
            'enabled' => true
        ]);

        return $this->render('@AropixelSyliusHighLightProductsPlugin/Front/HighLightProducts/displayList.html.twig', [
            'highLightProductsBlocs' => $highLightProductsBlocs
        ]);
    }

}
