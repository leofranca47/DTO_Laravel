<?php

namespace App\Http\Controllers;


use App\Adapters\CreateUserAdapter;
use App\Adapters\DTO\CreateUserDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserJsonController
{
    public function store(Request $request, userAdapter $userAdapter)
    {
        $data = new testeDto(
            user_id: $request->input('id'),
            name: $request->input('nome'),
        );

        return response()->json($userAdapter->store($data), 201);
    }
}

class userAdapter
{
    public function store(testeDto $request): array
    {
        return Http::post(
            'https://jsonplaceholder.typicode.com/todos',
            $request
        )->json();
    }
}

class testeDto
{

    public function __construct(
        public int $user_id,
        public string $name,
    )
    {
        $this->validate();
    }

    private function validate()
    {
        if ($this->user_id <= 0) {
            throw new \InvalidArgumentException('ID não pode ser menor que 0');
        }
    }

    public function toArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'name' => $this->name,
        ];
    }
}
