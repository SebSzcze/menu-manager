<?php

namespace Lari\MenuManager\Models;

use Illuminate\Database\Eloquent\Model;
use Lari\MenuManager\Renders\MenuItemRender;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class MenuItem extends Model
{
    protected $guarded = [];
    protected $with = ['items'];

    /**
     * Items
     * Define a relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }

    public function render()
    {
        return new MenuItemRender($this);
    }
}
