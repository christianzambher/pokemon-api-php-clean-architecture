<?php

namespace App\Services;

class PokemonService
{
    public function savePokemon(string $name): array
    {
        // Aquí irá:
        // - consumo de API
        // - guardado en DB
        // - envío de correo

        // Por ahora simulamos
        return [
            'message' => 'Pokemon procesado correctamente',
            'pokemon' => $name
        ];
    }
}