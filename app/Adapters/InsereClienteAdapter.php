<?php

namespace App\Adapters;

use App\Adapters\Contracts\InsereClienteAdapterInterface;
use App\Adapters\DTO\ClienteDTO;
use Illuminate\Support\Facades\Http;

class InsereClienteAdapter implements InsereClienteAdapterInterface
{
    public function create(ClienteDTO $data): array
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => config('customer.token'),
        ])->put(config('customer.url').'customer/minimal', $data)->body();

        ds($response);

        return (array) $response;
    }
}
