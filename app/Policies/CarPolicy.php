<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Car;
use App\Contracts\RolesServiceContract;

class CarPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct(
        private readonly RolesServiceContract $rolesService
    ) {
    }
    public function viewAny(User $user)
    {
        return $this->rolesService->hasAdminRole($user);
    }
    public function view(User $user)
    {
        return $this->rolesService->hasAdminRole($user);
    }
    public function create(User $user)
    {
        return $this->rolesService->hasAdminRole($user);
    }
    public function update(User $user, Car $car)
    {
        return $this->rolesService->hasAdminRole($user);
    }
}
