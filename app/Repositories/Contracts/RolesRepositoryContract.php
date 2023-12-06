<?php

namespace App\Repositories\Contracts;

use App\Models\Role;

interface RolesRepositoryContract
{
    public function getById(int $id): ?Role;
}
