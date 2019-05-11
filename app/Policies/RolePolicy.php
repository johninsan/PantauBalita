<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
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
    public function inboxpetugas(User $user)
    {
        return $this->getPermission($user, 1);
    }
    public function inboxortu(User $user)
    {
        return $this->getPermission($user, 4);
    }
    public function category(User $user)
    {
        return $this->getPermission($user, 2);
    }
    public function posyandu(User $user)
    {
        return $this->getPermission($user, 3);
    }
    public function tag(User $user)
    {
        return $this->getPermission($user, 5);
    }
    public function article(User $user)
    {
        return $this->getPermission($user, 6);
    }
    public function balita(User $user)
    {
        return $this->getPermission($user, 7);
    }

    protected function getPermission($user, $p_id)
    {
        foreach ($user->roles as $role) {
            foreach ($role->permissions as $permission) {
                if ($permission->id == $p_id) {
                    return true;
                }
            }
        }
        return false;
    }
}
