<?php

namespace App\Repositories;

use PDO;

class PokemonRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = new PDO(
            $_ENV['DB_DSN'], 
            $_ENV['DB_USER'], 
            $_ENV['DB_PASS'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );   
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

    public function findByName(string $name): array|null
    {
        $sql = "
            SELECT
                p.Nombre_Pokemon,
                p.Numero_Pokemon,
                h.Nombre_Habilidad,
                s.Descripcion_Sprite,
                s.Url_Sprite
            FROM pokemones p
            INNER JOIN habilidades h
                ON p.Id_Habilidad = h.Id_Habilidad
            INNER JOIN sprites s
                ON p.Id_Sprite = s.Id_Sprite
            WHERE LOWER(p.Nombre_Pokemon) = LOWER(:name)
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':name', $name);
        $stmt->execute();

        $pokemon = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $pokemon ?: null;
    }

    public function delete(int $number): bool
    {
        $sql = "CALL spBorrarPokemon(:number)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':number', $number);

        return $stmt->execute();
    }

    public function getRegisteredPokemons(): array
    {
        $sql = "
            SELECT 
                Numero_Pokemon,
                Nombre_Pokemon
            FROM pokemones
            ORDER BY Numero_Pokemon ASC
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}