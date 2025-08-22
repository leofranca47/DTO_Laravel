<?php

namespace App\Adapters\DTO;

class ClienteDTO
{
    public function __construct(
        public string $cpf,
        public string $name,
        public string $email,
        public string $password,
        public int $origin_id,
        public string $phone
    )
    {
    }
}
