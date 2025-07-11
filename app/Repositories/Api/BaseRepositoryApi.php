<?php

namespace App\Repositories\Api;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class BaseRepositoryApi
{
    protected string $endpoint;

    public function fetch(string $dateFrom, ?string $dateTo = null, int $page = 1, int $limit = 500): array
    {
        $url = Config::get('api.base_url') . $this->endpoint;
        $key = Config::get('api.key');

        $params = [
            'dateFrom' => $dateFrom,
            'page' => $page,
            'limit' => $limit,
            'key' => $key,
        ];

        if ($dateTo !== null) {
            $params['dateTo'] = $dateTo;
        }

        $response = Http::retry(3, 100)->get($url, $params);

        return $response->successful() ? $response->json() : [];
    }
}
