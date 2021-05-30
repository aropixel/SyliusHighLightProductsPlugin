<?php


namespace Aropixel\SyliusHighLightProductsPlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\Product;
use Sylius\Component\Resource\Model\CodeAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

class HighLight implements ResourceInterface, CodeAwareInterface, HighLightInterface
{
    private $id;

    private $code;

    private $title;

    private $buttonText;

    private $buttonLink;

    private $createdAt;

    private $enabled;

    /** @var ArrayCollection|HighLightProductInterface[]  */
    private $highLightProducts;

    public function __construct()
    {
        $this->highLightProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * @return mixed
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        $products = new ArrayCollection();
        foreach ($this->highLightProducts as $highLightProduct) {
            $products->add($highLightProduct->getProduct());
        }

        return $products;
    }

    /**
     * @return Collection|HighLightProduct[]
     */
    public function getHighLightProducts(): Collection
    {
        return $this->highLightProducts;
    }

    public function addHighLightProduct(HighLightProduct $highLightProduct): self
    {
        if (!$this->highLightProducts->contains($highLightProduct)) {
            $this->highLightProducts[] = $highLightProduct;
        }

        return $this;
    }

    public function removeHighLightProduct(HighLightProduct $highLightProduct): self
    {
        $this->highLightProducts->removeElement($highLightProduct);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getButtonText()
    {
        return $this->buttonText;
    }

    /**
     * @param mixed $buttonText
     */
    public function setButtonText($buttonText): void
    {
        $this->buttonText = $buttonText;
    }

    /**
     * @return mixed
     */
    public function getButtonLink()
    {
        return $this->buttonLink;
    }

    /**
     * @param mixed $buttonLink
     */
    public function setButtonLink($buttonLink): void
    {
        $this->buttonLink = $buttonLink;
    }

}
