USE sanfi601_testeValemobi;
DELIMITER |
DROP PROCEDURE IF EXISTS sp_select_mercadorias|

CREATE DEFINER = 'sanfi601_valemob'@'%' PROCEDURE sp_select_mercadorias(
	pParam_Search VARCHAR(20)
)BEGIN
	SET pParam_Search = CONCAT('%', pParam_Search, '%');
    
	SELECT 
		codigo AS `CODIGO`,
        tipo AS `TIPO_DE_MERCADORIA`,
        nm AS `DESCRICAO_DA_MERCADORIA`,
        qtd AS `QUANTIDADE`,
        preco AS `PRECO`,
        tp_negocio AS `TIPO_DE_NEGOCIO`
    FROM tblMercadorias
    WHERE 
		tipo LIKE pParam_Search OR
        nm LIKE pParam_Search OR
        preco LIKE pParam_Search OR
        tp_negocio LIKE pParam_Search
	LIMIT 0,1000;

END|