<?php

namespace App\Http\Controllers;

use App\Adapters\Contracts\InsereClienteAdapterInterface;
use App\Adapters\DTO\ClienteDTO;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CriaClienteController extends Controller
{
    public function __invoke(Request $request, InsereClienteAdapterInterface $insereClienteAdapter): JsonResponse
    {
        $payload = new ClienteDTO(
            cpf: $request->input('cpf'),
            name: $request->input('nome'),
            email: $request->input('email'),
            password: $request->input('senha'),
            origin_id: $request->input('origem'),
            phone: $request->input('telefone'),
        );

        return response()->json($insereClienteAdapter->create($payload), 201);
    }
}
