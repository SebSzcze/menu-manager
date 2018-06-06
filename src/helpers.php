<?php

use Lari\MenuManager\Repositores\MenuSlot;

if (!function_exists('menu')) {
    /**
     * @param null $slot
     * @return \Lari\MenuManager\Models\MenuSlot
     */
    function menu($slot)
    {
        return app(MenuSlot::class)->get($slot);
    }
}