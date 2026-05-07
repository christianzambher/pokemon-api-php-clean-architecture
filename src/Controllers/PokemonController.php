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
        if (empty($data['nomPokemon'])) {
            http_response_code(400);

            return [
                'error' => 'El nombre del pokemon es requerido'
            ];
        }

        $payLoad = [
            'nombre' => $data['nomPokemon'],
            'numero' => $data['numPokemon'],
            'habilidad' => $data['habPokemon'],
            'sprite' => $data['sprtPokemon'],
            'sprite_url' => $data['urlSprtPokemon'],
        ];

        return $this->pokemonService->savePokemon($payLoad);
    }
}