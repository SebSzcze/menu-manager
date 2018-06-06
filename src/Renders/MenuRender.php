<?php

namespace Lari\MenuManager\Renders;

use Lari\MenuManager\Models\MenuSlot;
use Lari\MenuManager\Models\Menu as MenuModel;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class MenuRender
{
    /**
     * @var MenuSlot
     */
    private $slot;

    /**
     * @var MenuModel
     */
    private $menu;

    /**
     * @param MenuSlot $slot
     */
    public function __construct(MenuSlot $slot)
    {
        $this->slot = $slot;
        $this->menu = $slot->menu;
    }

    public function getHeader()
    {
        return $this->menu->header ?: $this->slot->header;
    }

    public function getItems()
    {
        return $this->menu->items ?: [];
    }
}