<?php

namespace unnyancat\dirtarmor;

use pocketmine\item\ArmorTypeInfo;
use pocketmine\item\ItemIdentifier;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use Refaltor\Natof\CustomItem\CustomItem;

class Main extends PluginBase {
    public static Main $instance;

    protected function onEnable(): void
    {
        $this->getServer()->getLogger()->info("Dirt Armor get §aInjected");
    }

    public function loadItems() {
        if (Server::getInstance()->getPluginManager()->getPlugin("CustomItem") != null) {

            $helmet = CustomItem::createHelmetItem(new ItemIdentifier(2024, 0), new ArmorTypeInfo(10, 500, 0), "dirt helmet");
            $helmet->setTexture('dirt_helmet');

            $chestplate = CustomItem::createChestPlateItem(new ItemIdentifier(2025, 0), new ArmorTypeInfo(10, 500, 1), "dirt chestplate");
            $chestplate->setTexture('dirt_chestplate');

            $leggings = CustomItem::createLeggingsItem(new ItemIdentifier(2026, 0), new ArmorTypeInfo(10, 500, 2), "dirt leggings");
            $leggings->setTexture('dirt_leggings');

            $boots = CustomItem::createBootsItem(new ItemIdentifier(2027, 0), new ArmorTypeInfo(10, 500, 3), "dirt boots");
            $boots->setTexture('dirt_boots');

            $items = [$chestplate, $helmet, $leggings, $boots];
            foreach ($items as $item) {
                CustomItem::registerItem($item);
            }
        }
    }

    protected function onDisable(): void
    {
        $this->getServer()->getLogger()->info("§cLe test de unnyancat s'arrête");
    }

    protected function onLoad(): void {
        $this->loadItems();
    }
}