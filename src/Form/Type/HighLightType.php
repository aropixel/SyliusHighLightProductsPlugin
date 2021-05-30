<?php


namespace Aropixel\SyliusHighLightProductsPlugin\Form\Type;


use Aropixel\SyliusHighLightProductsPlugin\Entity\HighLightProductInterface;
use Sylius\Bundle\ProductBundle\Form\Type\ProductAutocompleteChoiceType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class HighLightType extends AbstractResourceType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('code', TextType::class, [
                'label' => 'sylius.ui.code'
            ])

            ->add('title', TextType::class, [
                'label' => 'sylius.ui.title'
            ])

            ->add('buttonText', TextType::class, [
                'label' => 'aropixel.ui.button_text'
            ])

            ->add('buttonLink', TextType::class, [
                'label' => 'aropixel.ui.button_link'
            ])

            ->add('title', TextType::class, [
                'label' => 'sylius.ui.title'
            ])

            ->add('highLightProduct', CollectionType::class, [
                'label' => 'sylius.ui.products',
                'class' => HighLightProductInterface::class
            ])

            ->add('products', ProductAutocompleteChoiceType::class, [
                'label' => 'sylius.ui.products',
                'multiple' => true,
            ])

            ->add('enabled', CheckboxType::class, [
                'label' => 'sylius.ui.enabled'
            ])
        ;
    }

    public function getBlockPrefix()
    {
        return 'aropixel_highlight_products';
    }

}
