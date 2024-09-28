<?php

namespace Modules\Auth\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Auth\Models\Admin;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function before(Admin $user, string $ability): bool|null
{
    if ($user->hasRole('Super Admin')) {
        return true;
    }
 
    return null; // see the note above in Gate::before about why null must be returned here.
}
public function create(Admin $user){
    return $user->hasRole('admin');
}
public function delete(Admin $user)
{
    return $user->hasRole('admin') ;
}

}
