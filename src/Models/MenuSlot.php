<?php

namespace Lari\MenuManager\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class MenuSlot extends Model
{
    protected $guard = [];

    /**
     * Menu
     * Define a relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    /**
     * menu
     * Define a relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\Has
     */
    public function menu()
    {
        return $this->menu()->active()->first();
    }

    /**
     * @return bool
     */
    public function hasMenu(): bool
    {
        return !!$this->menu;
    }
}
