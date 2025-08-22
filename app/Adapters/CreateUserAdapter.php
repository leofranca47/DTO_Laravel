<?php

namespace App\Adapters;

use App\Adapters\DTO\CreateUserDTO;
use App\Http\Controllers\testeDto;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class CreateUserAdapter
{
    public function store(testeDto $request): array
    {
        $response = Http::post(
            'https://jsonplaceholder.typicode.com/todos',
            $request
        );

        return $response->json();
    }

}
