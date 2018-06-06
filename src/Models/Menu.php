<?php

namespace Lari\MenuManager\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class Menu extends Model
{
    protected $guarded = [];

    public function scopeActive($query)
    {
        $now = now();

        $query->where([
            ['is_available', '=', 1],
            ['available_at', '<', $now ],
            ['expires_at', '>', $now],
        ]);
    }
}
