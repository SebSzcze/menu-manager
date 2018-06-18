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
    const BASE_VIEW_KEY = 'item';
    const SPACER_KEY = 'Spacer';
    const SPACER_VIEW_KEY = 'spacer';


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

    public function getIsSpacerAttribute()
    {
        return $this->entity_type == static::SPACER_KEY && empty($this->entity_id);
    }

    public function getShowAttribute(): bool
    {
        return $this->is_public || \Auth::check();
    }

    public function getViewAttribute()
    {
        return $this->is_spacer ? static::SPACER_VIEW_KEY : static::BASE_VIEW_KEY;
    }
    
    /**
     * @return MenuItemRender
     */
    public function render()
    {
        return new MenuItemRender($this);
    }
}
