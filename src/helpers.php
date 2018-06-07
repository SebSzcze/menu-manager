<?php

use Lari\MenuManager\Repositores\MenuSlot;

if (!function_exists('menu')) {
    /**
     * @param null  $slot
     * @param null  $view
     * @param array $data
     * @return html
     * @throws Throwable
     */
    function menu($slot, $view = null, $data = [])
    {
        $repository = app(MenuSlot::class);
        $slot = $repository->get($slot) ?: $repository->newInstance();

        $view = $view ?: 'menumanager::menu';

        return view($view, array_merge(
            ['menu' => $slot->render()], $data
        ))->render();
    }
}