USE sanfi601_testeValemobi;
DELIMITER |
DROP FUNCTION IF EXISTS `func_update_mercadoria`|
CREATE DEFINER = `sanfi601_valemob`@`%` FUNCTION `func_update_mercadoria`(
	pId BIGINT,
    pTpMerc VARCHAR(50),
    pNmMerc VARCHAR(60),
    pQtd INT,
    pPreco DECIMAL(4,2),
    pTpNegocio CHAR(6)
)RETURNS VARCHAR(200)
BEGIN
	DECLARE vMsg VARCHAR(200);
    DECLARE vCountId, vCountMerc TINYINT;
    
    #SET vMsg = CONCAT('ID: ', pId, ' TIPO: ', pTpMerc, ' DESCRIÇÃO: ', pNmMerc);
    SET vCountId = (SELECT COUNT(codigo) FROM tblMercadorias WHERE codigo=pId);
    IF (vCountId < 1) THEN
		SET vMsg = concat('A atualização não pôde ser realizada, pois, o código/id não foi localizado no sistema!!!');
    ELSE
		SET vCountMerc = (SELECT COUNT(codigo) FROM tblMercadorias WHERE tipo=UPPER(pTpMerc) AND nm=UPPER(pNmMerc) AND tp_negocio=UPPER(pTpNegocio));
        IF (vCountMerc > 0) THEN
			SET vMsg = 'A atualização não pôde ser realizada, pois, as novas informações inseridas já estão cadastradas no sistema!!!';
		ELSE
			UPDATE tblMercadorias SET tipo=UPPER(pTpMerc), nm=UPPER(pNmMerc), qtd=pQtd, preco=pPreco, tp_negocio=UPPER(pTpNegocio) WHERE codigo=pId;
			SET vMsg = 'O registro foi atualizado com sucesso!!!';
		END IF;
    END IF;
    
    RETURN vMsg;
END|