<?php

namespace Lari\MenuManager\Repositores;

use Lari\SimpleRepo\Repository;
use Lari\MenuManager\Models\MenuSlot as MenuSlotModel;
/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class MenuSlot extends Repository
{
    public function get($slot)
    {
        return MenuSlotModel::byKey($slot);
    }

    public function newInstance()
    {
        return new MenuSlotModel();
    }
}