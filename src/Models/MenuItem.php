<?php

namespace Lari\MenuManager\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class MenuItem extends Model
{
    protected $guarded = [];

    /**
     * Items
     * Define a relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(MenuItem::class)->whereNull('parent_id');
    }
}
