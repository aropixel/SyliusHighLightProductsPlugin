<?php

namespace Aropixel\SyliusHighLightProductsPlugin\Form\Type;

use Sylius\Bundle\ProductBundle\Form\Type\ProductAutocompleteChoiceType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class HighLightType extends AbstractResourceType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('code', TextType::class, [
                'label' => 'sylius.ui.code'
            ])

            ->add('title', TextType::class, [
                'label' => 'sylius.ui.title'
            ])

            ->add('buttonText', TextType::class, [
                'label' => 'aropixel.highlight_products.button_text'
            ])

            ->add('buttonLink', TextType::class, [
                'label' => 'aropixel.highlight_products.button_link'
            ])

            ->add('title', TextType::class, [
                'label' => 'sylius.ui.title'
            ])


            ->add('highLightProductsSelector', ProductAutocompleteChoiceType::class, [
                'label' => 'sylius.ui.products',
                'multiple' => true,
                'mapped' => false
            ])

            ->add('highLightProducts', CollectionType::class, [
                'entry_type' => HighLightProductType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])


            // à chaque ajout dans l'autocomplete, j'ajoute en js un element du CollectionType en utilisant le prototype

            ->add('enabled', CheckboxType::class, [
                'label' => 'sylius.ui.enabled'
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'aropixel_highlight';
    }

}
