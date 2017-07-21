DROP FUNCTION IF EXISTS `func_insert_news`;
DELIMITER |
USE `sanfi601_testeValemobi`|

CREATE FUNCTION `func_insert_news`(
	pNm VARCHAR(30),
    pEmail VARCHAR(80)
)RETURNS VARCHAR(200)
BEGIN
	DECLARE vMsg VARCHAR(200);
    DECLARE vCountEmail TINYINT;
    
    SET vCountEmail = (SELECT COUNT(id) FROM tblNews WHERE email=pEmail);
    IF (vCountEmail > 0) THEN
		SET vMsg = 'O e-mail inserido já consta em nosso sistema!!!';
	ELSE
		INSERT INTO tblNews (id, nm, email) VALUES (null, UPPER(pNm), pEmail);
        SET vMsg = CONCAT('Prezado(a) ', upper(pNm),', seu e-mail foi cadastrado com sucesso!!!');
    END IF;
    
    RETURN vMsg;
END|
