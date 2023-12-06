<?php

namespace App\Repositories;

use App\Repositories\Contracts\RolesRepositoryContract;
use App\Models\Role;

class RolesRepository implements RolesRepositoryContract
{
    public function getById(int $id): ?Role
    {
        return Role::findOrfail($id);
    }
}
