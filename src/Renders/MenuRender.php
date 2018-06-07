<?php

namespace Lari\MenuManager\Renders;

use Lari\MenuManager\Models\MenuSlot;
use Lari\MenuManager\Models\Menu as MenuModel;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class MenuRender extends AbstractRender
{
    /**
     * @var MenuSlot
     */
    private $slot;

    /**
     * @var MenuModel
     */
    protected $model;

    /**
     * @param MenuSlot $slot
     */
    public function __construct(MenuSlot $slot)
    {
        $this->slot = $slot;
        $this->model = $slot->menu;
    }

    public function getHeader()
    {
        return $this->model->header ?: $this->slot->header;
    }

    public function getItems()
    {
        return $this->model->items ?: [];
    }
}