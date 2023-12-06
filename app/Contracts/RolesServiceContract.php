<?php

namespace App\Contracts;
use App\Models\User;
interface RolesServiceContract
{
public function hasRole(User $user, string $role): bool;

public function hasAdminRole(User $user): bool;
}
