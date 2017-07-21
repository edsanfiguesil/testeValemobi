DROP FUNCTION IF EXISTS `func_insert_login`;
DELIMITER |
USE `sanfi601_testeValemobi`|

CREATE FUNCTION `func_insert_login`(
	pNm VARCHAR(50),
    pEmail VARCHAR(80),
    pPwd VARCHAR(15)
)RETURNS VARCHAR(200)
BEGIN
	DECLARE vMsg VARCHAR(200);
    DECLARE vCountEmail TINYINT;
    
    SET vCountEmail = (SELECT COUNT(id) FROM tblUsrs WHERE email=pEmail);
    IF (vCountEmail > 0) THEN
		SET vMsg = 'Já existe um usuário em nosso sistema com o e-mail inserido!!!';
	ELSE
		INSERT INTO tblUsrs (id, nm, email, pwd, ativo) VALUES (null, UPPER(pNm), pEmail, pPwd, 1);
        SET vMsg = CONCAT('Prezado(a) ', upper(pNm),', seu acesso foi cadastrado com sucesso!!!');
    END IF;
    
    RETURN vMsg;
END|
