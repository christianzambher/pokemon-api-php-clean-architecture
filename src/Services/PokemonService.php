<?php

namespace App\Services;

use App\Repositories\PokemonRepository;
use App\Clients\PokemonApiClient;

class PokemonService
{
    private PokemonRepository $repo;
    private PokemonApiClient $apiClient;
    private MailService $mailService;

    public function __construct()
    {
        $this->repo = new PokemonRepository();
        $this->apiClient = new PokemonApiClient();
        $this->mailService = new MailService();
    }
    public function savePokemon(array $data): array
    {
        // Obtener Info de la API
        $pokemonData = $this->apiClient->getPokemon($data['name']);
        
        // Guarda en BD
        $this->repo->save($pokemonData);

        // Enviar Mail
        $this->mailService->sendPokemonRegisteredMail($pokemonData);

        return [
            'message' => 'Pokemon registered successfully',
            'pokemon' => $pokemonData
        ];
    }

    public function getPokemon(string $name): array
    {
        $pokemon = $this->repo->findByName($name);

        if (!$pokemon) {
            throw new \Exception('Pokemon not found');
        }

        return $pokemon;
    }

    public function deletePokemon(int $number): array
    {
        $this->repo->delete($number);

        return [
            'message' => 'Pokemon deleted successfully'
        ];
    }

    public function getRegisteredPokemons(): array
    {
        return $this->repo->getRegisteredPokemons();
    }
}