<?php

namespace Lari\MenuManager\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class MenuPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
