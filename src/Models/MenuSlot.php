<?php

namespace Lari\MenuManager\Models;

use Illuminate\Database\Eloquent\Model;
use Lari\MenuManager\Renders\MenuRender;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class MenuSlot extends Model
{
    protected $guarded = [];

    /**
     * Menu
     * Define a relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function menus()
    {
        return $this->hasMany(Menu::class, 'slot_id');
    }

    /**
     * menu
     * Define a relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\Has
     */
    public function menu()
    {
        return $this->hasOne(Menu::class, 'slot_id')
                    ->active();
    }

    /**
     * @return bool
     */
    public function isFilled(): bool
    {
        return !!$this->menu;
    }

    /**
     * @param string $key
     * @return Menu|null
     */
    public static function byKey(string $key): ?MenuSlot
    {
        return static::where('key', '=', $key)->first();
    }

    public function render()
    {
        return new MenuRender($this);
    }
}
