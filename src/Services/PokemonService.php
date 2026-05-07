<?php

namespace App\Services;

use App\Repositories\PokemonRepository;
use App\Clients\PokemonApiClient;

class PokemonService
{
    private PokemonRepository $repo;
    private PokemonApiClient $apiClient;

    public function __construct()
    {
        $this->repo = new PokemonRepository();
        $this->apiClient = new PokemonApiClient();
    }
    public function savePokemon(string $pokemonName): array
    {
        $pokemonData = $this->apiClient->getPokemon($pokemonName);
        return $this->repo->save($pokemonData);
    }
}