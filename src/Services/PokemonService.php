<?php

namespace App\Services;

use App\Repositories\PokemonRepository;

class PokemonService
{
    private PokemonRepository $repo;

    public function __construct()
    {
        $this->repo = new PokemonRepository();
    }
    public function savePokemon(array $data): array
    {
        //Aqui luego se validara mas cosas
        return $this->repo->save($data);
    }
}