<?php

namespace App\Contracts\Services;

interface ApiServiceContract
{
    public function get(string $name, array $parameters = [], int $time): array|null;

}
