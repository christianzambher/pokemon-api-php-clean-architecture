DELIMITER $$
DROP TRIGGER IF EXISTS ins_Pokemon;
CREATE TRIGGER ins_Pokemon 
AFTER INSERT ON Pokemones
FOR EACH ROW
BEGIN
    INSERT INTO bitacoras (
        Tabla, Accion, Registro_Id
    )
    VALUES ('POKEMONES', 'INSERT', NEW.Id_Pokemon);
END;
END $$

DELIMITER $$
DROP TRIGGER IF EXISTS upd_Pokemon;
CREATE TRIGGER upd_Pokemon
AFTER UPDATE ON Pokemones
FOR EACH ROW
BEGIN
    INSERT INTO bitacoras (
        Tabla, Accion, Registro_Id
    )
    VALUES ('POKEMONES','UPDATE', NEW.Id_Pokemon);
END;
END $$

DELIMITER $$
DROP TRIGGER IF EXISTS del_Pokemon;
CREATE TRIGGER del_Pokemon 
AFTER DELETE ON Pokemones
FOR EACH ROW
BEGIN
    INSERT INTO bitacoras (
        Tabla, Accion
    )
    VALUES ('POKEMONES','DELETE', OLD.Id_Pokemon);
END;
END $$