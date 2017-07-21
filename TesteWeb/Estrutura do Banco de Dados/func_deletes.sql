USE sanfi601_testeValemobi;
DELIMITER |
DROP FUNCTION IF EXISTS `func_deletes`|
CREATE DEFINER=`sanfi601_valemob`@`%` FUNCTION `func_deletes`(
	pId_Db TINYINT,
    pId BIGINT
)RETURNS VARCHAR(200)
BEGIN
	DECLARE vMsg VARCHAR(200);
    DECLARE vCountId TINYINT;
    
    IF (pId_Db = 0) THEN ##Realiza a exclusão na tabela 'tblMercadorias'
    
		SET vCountId = (SELECT COUNT(codigo) FROM tblMercadorias WHERE codigo=pId);
        IF (vCountId < 1) THEN
			SET vMsg = 'O registro não pôde ser excluído, pois, o código de produto que deseja excluir não existe!!!';
        ELSE
			DELETE FROM tblMercadorias WHERE codigo=pId;
            SET vMsg = 'Parabéns, registro excluído com sucesso!!!';
        END IF;
        
        
        
        
	ELSE
        SET vMsg = 'Não há mais tabelas onde o registro possa ser excluído!!!';
    END IF;
    
    RETURN vMsg;
END|