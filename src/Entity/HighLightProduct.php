<?php


namespace Aropixel\SyliusHighLightProductsPlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Resource\Model\CodeAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

class HighLightProduct implements ResourceInterface, HighLightProductInterface
{
    private $id;

    /** @var HighLightInterface */
    private $highLight;

    /** @var ProductInterface */
    private $product;

    /** @var int */
    private $position;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return HighLightInterface
     */
    public function getHighLight(): HighLightInterface
    {
        return $this->highLight;
    }

    /**
     * @param HighLightInterface $highLight
     */
    public function setHighLight(HighLightInterface $highLight): void
    {
        $this->highLight = $highLight;
    }

    /**
     * @return ProductInterface
     */
    public function getProduct(): ProductInterface
    {
        return $this->product;
    }

    /**
     * @param ProductInterface $product
     */
    public function setProduct(ProductInterface $product): void
    {
        $this->product = $product;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition(int $position): void
    {
        $this->position = $position;
    }


}
