<?php

namespace App\Adapters\Contracts;

use App\Adapters\DTO\ClienteDTO;

interface InsereClienteAdapterInterface
{
    public function create(ClienteDTO $data): array;
}
