DELIMITER $$
DROP TRIGGER IF EXISTS ins_Sprite;
CREATE TRIGGER ins_Sprite 
AFTER INSERT ON Sprites
FOR EACH ROW
BEGIN
    INSERT INTO bitacoras (
        Tabla, Accion, Registro_Id
    )
    VALUES ('SPRITES', 'INSERT', NEW.Id_Sprite);
END;
END $$

DELIMITER $$
DROP TRIGGER IF EXISTS upd_Sprite;
CREATE TRIGGER upd_Sprite 
AFTER UPDATE ON Sprites
FOR EACH ROW
BEGIN
    INSERT INTO bitacoras (
        Tabla, Accion, Registro_Id
    )
    VALUES ('SPRITES', 'UPDATE', NEW.Id_Sprite);
END $$

DELIMITER $$
DROP TRIGGER IF EXISTS del_Sprite;
CREATE TRIGGER del_Sprite AFTER DELETE ON Sprites
FOR EACH ROW
BEGIN
    INSERT INTO bitacoras (
        Tabla, Accion, Registro_Id
    )
    VALUES ('SPRITES', 'DELETE', OLD.Id_Sprite);
END;
END $$