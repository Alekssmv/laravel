<?php
namespace App\Services;

use App\Contracts\Services\ApiServiceContract;
use Http;
use Illuminate\Http\Client\PendingRequest;
use Cache;

class ApiService implements ApiServiceContract
{
    public function __construct(
        private readonly string $login,
        private readonly string $password,
        private readonly string $url,
    ) {
    }
    private function getBaseUrl(): string
    {
        return $this->url;
    }

    public function get(string $name, array $parameters = [], int $time): array|null
    {
        if (Cache::has(sprintf('getApi|%s|%s|%s', $name, implode('|', $parameters), $time))) {
            return Cache::get(sprintf('getApi|%s|%s|%s', $name, implode('|', $parameters), $time));
        }

        $data = $this->pendingRequest()
            ->get($this->getBaseUrl() . $name . '?' . http_build_query($parameters))
            ->json();

        if ($data != null && is_array($data)) {
            return Cache::remember(sprintf('getApi|%s|%s|%s', $name, implode('|', $parameters), $time), $time, function () use ($data) {
                return $data;
            });
        }
        return null;
    }

    private function pendingRequest(): PendingRequest
    {
        return Http::withBasicAuth($this->login, $this->password);
    }
}
