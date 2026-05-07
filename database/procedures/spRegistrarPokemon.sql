DROP PROCEDURE IF EXISTS spRegistrarPokemon;

CREATE PROCEDURE spRegistrarPokemon (
    IN Nombre VARCHAR(100),
    IN Numero INTEGER,
    IN Habilidad VARCHAR(50),
    IN Sprite VARCHAR(100),
    IN Sprite_Url VARCHAR(255)
)
BEGIN
    DECLARE ID_Habilidad INT DEFAULT 0;
    DECLARE ID_Sprite INT DEFAULT 0;
    DECLARE Count_Pokemon INT DEFAULT 0;

    /*
    ============================================
    VALIDAR / REGISTRAR HABILIDAD
    ============================================
    */
    IF EXISTS(SELECT 1 FROM habilidades WHERE Nombre_Habilidad = Habilidad) THEN
        SELECT Id_Habilidad INTO ID_Habilidad FROM habilidades WHERE Nombre_Habilidad = Habilidad;
    ELSE
        INSERT INTO habilidades(Nombre_Habilidad)
        VALUES(Habilidad);
        SELECT LAST_INSERT_ID() INTO ID_Habilidad;
    END IF;

    /*
    ============================================
    VALIDAR / REGISTRAR SPRITE
    ============================================
    */
    IF EXISTS(SELECT 1 FROM Sprites WHERE Url_Sprite = Sprite_Url) THEN
        SELECT Id_Sprite INTO ID_Sprite FROM sprites WHERE Url_Sprite = Sprite_Url;
    ELSE
        INSERT INTO sprites(Descripcion_Sprite,Url_Sprite)
        VALUES(Sprite,Sprite_Url);
        SELECT LAST_INSERT_ID() INTO ID_Sprite;
    END IF;

    /*
    ============================================
    VALIDAR POKEMON DUPLICADO
    ============================================
    */
    SELECT COUNT(*) INTO Count_Pokemon FROM pokemones WHERE Numero_Pokemon = Numero;
    
    IF (Count_Pokemon > 0) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'POKEMON YA EXISTENTE';
    ELSE
        INSERT INTO pokemones
		(Nombre_Pokemon, Numero_Pokemon, Id_Habilidad, Id_Sprite)
		VALUES
		(Nombre, Numero, ID_Habilidad, ID_Sprite);
        
    END IF;
END;