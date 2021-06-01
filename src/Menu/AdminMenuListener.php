<?php


namespace Aropixel\SyliusHighLightProductsPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AdminMenuListener
{
    public function addAdminMenuItems(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $pageMenu = $menu
            ->addChild('menu-highlight-products')
            ->setLabel('Mises en avant produits')
        ;

        $pageMenu
            ->addChild('highlight-products', ['route' => 'aropixel_admin_highlight_index'])
            ->setLabelAttribute('icon', 'star')
            ->setLabel('Mises en avant produits')
        ;
    }
}
