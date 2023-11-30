DELIMITER //
CREATE TRIGGER before_insert_foto
BEFORE INSERT ON fotos FOR EACH ROW
BEGIN
    DECLARE foto_count INT;

    -- Contar o número de fotos existentes para o usuário e anúncio específicos
    SELECT COUNT(*) INTO foto_count
    FROM fotos
    WHERE id_usuario = NEW.id_usuario
      AND id_anuncio = NEW.id_anuncio;

    -- Verificar se o usuário já atingiu o máximo de 5 fotos por anúncio
    IF foto_count >= 5 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Usuário atingiu o máximo de 5 fotos por anúncio';
    END IF;
END;
//
DELIMITER ;
