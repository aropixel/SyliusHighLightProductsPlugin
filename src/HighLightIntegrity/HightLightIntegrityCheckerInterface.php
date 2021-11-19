<?php


namespace Aropixel\SyliusHighLightProductsPlugin\HighLightIntegrity;


use Aropixel\SyliusHighLightProductsPlugin\Entity\HighLight;

interface HightLightIntegrityCheckerInterface
{
    public function removeDisabledProductsFromHighLight(HighLight $highLightProductsBlock): void;

    public function removeDisabledProductsFromHighLights(array $highLightProductsBlocks): void;

}
