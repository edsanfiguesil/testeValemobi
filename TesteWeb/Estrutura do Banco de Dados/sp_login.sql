DROP PROCEDURE IF EXISTS `sp_login`;
DELIMITER |

USE `sanfi601_testeValemobi`|
CREATE PROCEDURE `sp_login`(
	pEmail VARCHAR(767),
	pPwd VARCHAR(767)
)
BEGIN
	IF (char_length(pPwd) < 8 OR char_length(pPwd) > 15 ) THEN
		SELECT 'A senha deve ter entre 8 e 15 caracteres!!!';
    ELSE
		
		SELECT 
			id AS 'ID',
			nm AS 'NOME',
			email AS 'EMAIL',
            ativo AS 'ATIVO'
		FROM tblUsrs
		WHERE email=pEmail AND pwd=pPwd AND ativo=1;
    END IF;
END|