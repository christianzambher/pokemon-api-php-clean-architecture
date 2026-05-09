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
        if (empty($data['name'])) {
            http_response_code(400);

            return [
                'error' => 'El nombre del pokemon es requerido'
            ];
        }

        return $this->pokemonService->savePokemon($data);
    }
    public function get(string $name): array
    {
        return $this->pokemonService->getPokemon($name);
    }
    public function delete(array $data): array
    {
        if (!isset($data['number'])) {
            throw new \Exception('Pokemon number is required');
        }

        return $this->pokemonService->deletePokemon(
            (int) $data['number']
        );
    }
}