DELIMITER $$
DROP TRIGGER IF EXISTS ins_Habilidad;
CREATE TRIGGER ins_Habilidad 
AFTER INSERT ON Habilidades
FOR EACH ROW
BEGIN
    INSERT INTO bitacoras (
        Tabla, Accion, Registro_Id
    )
    VALUES ('HABILIDADES', 'INSERT', NEW.Id_Habilidad);
END;
END $$

DELIMITER $$
DROP TRIGGER IF EXISTS upd_Habilidad;
CREATE TRIGGER upd_Habilidad 
AFTER UPDATE ON Habilidades
FOR EACH ROW
BEGIN
    INSERT INTO bitacoras (
        Tabla, Accion, Registro_Id
    )
    VALUES ('HABILIDADES', 'UPDATE', NEW.Id_Habilidad);
END;
END $$

DELIMITER $$
DROP TRIGGER IF EXISTS del_Habilidad;
CREATE TRIGGER del_Habilidad 
AFTER DELETE ON Habilidades
FOR EACH ROW
BEGIN
    INSERT INTO bitacoras (
        Tabla, Accion, Registro_Id
    )
    VALUES ('HABILIDADES', 'DELETE', OLD.Id_Habilidad);
END;
END $$