<?php

namespace App\Services;

use App\Repositories\Contracts\RolesRepositoryContract;
use App\Contracts\RolesServiceContract;
use App\Models\User;

class RolesService implements RolesServiceContract
{
    private $rolesRepository;

    public function __construct(RolesRepositoryContract $rolesRepository)
    {
        $this->rolesRepository = $rolesRepository;
    }

    public function hasRole(User $user, string $role): bool
    {
        return $user->roles()->where('name', $role)->exists();
    }

    public function hasAdminRole(User $user): bool
    {
        return $user->roles()->where('name', 'admin')->exists();
    }
}
