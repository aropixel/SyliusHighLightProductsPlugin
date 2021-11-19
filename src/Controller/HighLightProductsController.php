<?php


namespace Aropixel\SyliusHighLightProductsPlugin\Controller;

use Aropixel\SyliusHighLightProductsPlugin\Entity\HighLight;
use Aropixel\SyliusHighLightProductsPlugin\Entity\HighLightProduct;
use Aropixel\SyliusHighLightProductsPlugin\HighLightIntegrity\HightLightIntegrityCheckerInterface;
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
    /**
     * @var HightLightIntegrityCheckerInterface
     */
    private $hightLightIntegrityChecker;

    public function __construct(
        HighLightProductRepositoryInterface $highLightProductRepository,
        HightLightIntegrityCheckerInterface $hightLightIntegrityChecker
    )
    {
        $this->highLightProductRepository = $highLightProductRepository;
        $this->hightLightIntegrityChecker = $hightLightIntegrityChecker;
    }

    public function displayHighLightProductsByCode($code): Response
    {
        /** @var HighLight $highLightProductsBlock */
        $highLightProductsBlock = $this->highLightProductRepository->findOneBy([
            'code' => $code,
            'enabled' => true
        ]);

        $this->hightLightIntegrityChecker->removeDisabledProductsFromHighLight($highLightProductsBlock);

        return $this->render('@AropixelSyliusHighLightProductsPlugin/Front/HighLightProducts/displayBlock.html.twig', [
            'highLightProductsBlock' => $highLightProductsBlock
        ]);
    }

    public function displayAllHighLightProducts(): Response
    {
        $highLightProductsBlocs = $this->highLightProductRepository->findBy([
            'enabled' => true
        ]);

        $this->hightLightIntegrityChecker->removeDisabledProductsFromHighLight($highLightProductsBlocs);

        return $this->render('@AropixelSyliusHighLightProductsPlugin/Front/HighLightProducts/displayList.html.twig', [
            'highLightProductsBlocs' => $highLightProductsBlocs
        ]);
    }

}
