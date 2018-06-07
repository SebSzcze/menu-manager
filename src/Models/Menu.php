<?php

namespace Lari\MenuManager\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class Menu extends Model
{
    protected $guarded = [];

    /**
     * @param Builder $query
     */
    public function scopeActive($query)
    {
        $now = now();

        $query->whereIsAvailable(1)
              ->where(function ($query) use ($now) {
                  $query->where('available_at', '<=', $now)
                        ->orWhereNull('available_at');
              })->where(function ($query) use ($now) {
                $query->where('available_at', '>', $now)
                      ->orWhereNull('available_at');
            });
    }

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
