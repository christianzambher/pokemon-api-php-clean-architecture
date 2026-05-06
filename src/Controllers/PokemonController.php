<?php

namespace App\Controllers;

class PokemonController
{
    public function save(array $data)
    {
        // Validación básica
        if (empty($data['pokemon'])) {
            http_response_code(400);

            return [
                'error' => 'El nombre del pokemon es requerido'
            ];
        }

        // Temporal (luego irá al Service)
        return [
            'message' => 'Pokemon recibido correctamente',
            'pokemon' => $data['pokemon']
        ];
    }
}