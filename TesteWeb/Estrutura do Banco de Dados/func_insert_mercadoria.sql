USE sanfi601_testeValemobi;
DROP FUNCTION IF EXISTS `func_insert_mercadoria`;
DELIMITER |

CREATE DEFINER=`sanfi601_valemob`@`%` FUNCTION `func_insert_mercadoria`(
	pTp_Mercadoria VARCHAR(50),
    pNm VARCHAR(60),
    pQtd INT,
    pPreco DECIMAL(4,2),
    pTp_Negocio CHAR(6)
)RETURNS VARCHAR(200)
BEGIN
	DECLARE vMsg VARCHAR(200);
    DECLARE vCountMerc TINYINT;
    
    SET vCountMerc = (SELECT COUNT(codigo) FROM tblMercadorias WHERE tipo=pTp_Mercadoria AND nm=pNm AND tp_negocio=pTp_Negocio);
    IF (vCountMerc > 0) THEN
		SET vMsg = 'A mercadoria inserida já está cadastrada no sistema!!!';
	ELSE
		INSERT INTO tblMercadorias (codigo, tipo, nm, qtd, preco, tp_negocio) VALUES (null, UPPER(pTp_Mercadoria), UPPER(pNm), pQtd, pPreco, UPPER(pTp_Negocio));
		SET vMsg = 'Parabéns, Mercadoria cadastrada com sucesso!!!';
    END IF;
    
    
    RETURN vMsg;
END|
