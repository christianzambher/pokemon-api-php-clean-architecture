DROP PROCEDURE IF EXISTS spBorrarPokemon;
CREATE PROCEDURE spBorrarPokemon (IN Numero INTEGER)
BEGIN
    DECLARE Count_Pokemon INT DEFAULT 0;

    /*
    ============================================
    VALIDAR EXISTENCIA DEL POKEMON
    ============================================
    */
    SELECT COUNT(*) FROM pokemones WHERE Numero_Pokemon = Numero INTO Count_Pokemon;
    IF (Count_Pokemon > 0) THEN
        DELETE FROM pokemones WHERE Numero_Pokemon = Numero;
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'POKEMON NO EXISTENTE';
    END IF;
END;