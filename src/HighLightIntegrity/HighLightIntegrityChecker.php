<?php


namespace Aropixel\SyliusHighLightProductsPlugin\HighLightIntegrity;


use Aropixel\SyliusHighLightProductsPlugin\Entity\HighLight;

class HighLightIntegrityChecker implements HightLightIntegrityCheckerInterface
{
    public function removeDisabledProductsFromHighLight(?HighLight $highLightProductsBlock): void
    {
        if ($highLightProductsBlock) {
            foreach ($highLightProductsBlock->getHighLightProducts() as $highLightProduct) {
                if (!$highLightProduct->getProduct()->isEnabled()) {
                    $highLightProductsBlock->removeHighLightProduct($highLightProduct);
                }
            }
        }

    }

    public function removeDisabledProductsFromHighLights(array $highLightProductsBlocks): void
    {
        foreach ($highLightProductsBlocks as $highLightProductsBlock) {
            $this->removeDisabledProductsFromHighLight($highLightProductsBlock);
        }
    }

}
