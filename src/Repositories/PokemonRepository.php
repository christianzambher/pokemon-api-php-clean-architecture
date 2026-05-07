<?php

namespace App\Repositories;

use PDO;

class PokemonRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO($_ENV['DB_DSN'], $_ENV['DB_USER'], $_ENV['DB_PASS']);   
    }

    public function save(array $data): array
    {
        $stmt = $this->db->prepare("CALL pokedex.spRegistrarPokemon(
                :nomPok,
                :numPok,
                :habPok,
                :sptPok,
                :urlsptPok
            );
        ");

        $stmt->bindValue(':nomPok', $data['nombre']);
        $stmt->bindValue(':numPok', $data['numero']);
        $stmt->bindValue(':habPok', $data['habilidad']);
        $stmt->bindValue(':sptPok', $data['sprite']);
        $stmt->bindValue(':urlsptPok', $data['sprite_url']);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}