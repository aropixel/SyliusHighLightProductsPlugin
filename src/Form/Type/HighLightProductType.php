<?php


namespace Aropixel\SyliusHighLightProductsPlugin\Form\Type;


use App\Entity\Product\Product;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class HighLightProductType extends AbstractResourceType
{
    /**
     * @var string
     */
    private $productClass;

    public function __construct(
        string $dataClass,
        string $productClass,
        array $validationGroups = []
    ){
        parent::__construct($dataClass, $validationGroups);
        $this->productClass = $productClass;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('product', EntityType::class, [
                'label' => 'sylius.ui.product',
                'class' => $this->productClass,
                'choice_label' => 'name',
                'choice_value' => 'code',
                'multiple' => false,
//                'disabled' => true
            ])

            // j'ajoute le product en hidden type (par exemple juste l'id par ex)

            ->add('position', IntegerType::class, [
                'label' => 'Position'
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'aropixel_highlight_product';
    }

}
