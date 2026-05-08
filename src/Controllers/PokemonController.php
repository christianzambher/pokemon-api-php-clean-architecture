<?php

namespace App\Controllers;

use App\Services\PokemonService;

class PokemonController
{
    private PokemonService $pokemonService;

    public function __construct()
    {
        $this->pokemonService = new PokemonService();
    }
    public function save(array $data)
    {
        if (empty($data['pokemon'])) {
            http_response_code(400);

            return [
                'error' => 'El nombre del pokemon es requerido'
            ];
        }

        return $this->pokemonService->savePokemon($data['pokemon']);
    }
    public function get(string $name): array
    {
        return $this->pokemonService->getPokemon($name);
    }
}