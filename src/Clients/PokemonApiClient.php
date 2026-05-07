<?php

namespace App\Clients;

class PokemonApiClient
{
    private string $baseUrl = 'https://pokeapi.co/api/v2/pokemon/';

    public function getPokemon(string $name): array
    {
        $url = $this->baseUrl . strtolower($name);

        $response = file_get_contents($url);

        if (!$response) {
            throw new \Exception('Error consuming PokeAPI');
        }

        $pokemon = json_decode($response, true);

        return [
            'nombre' => $pokemon['name'],
            'numero' => $pokemon['id'],
            'habilidad' => $pokemon['abilities'][0]['ability']['name'] ?? 'unknown',
            'sprite' => 'front_default',
            'sprite_url' => $pokemon['sprites']['front_default']
        ];
    }
}