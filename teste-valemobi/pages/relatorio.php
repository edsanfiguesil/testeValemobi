<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>RELATÓRIO DE MERCADORIA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<link href="../css/estilo.css" rel="stylesheet" type="text/css" media="all" />
	</head>

	<body>
		<form name="frmRelMerc" method="POST">
			<div class="divPrincipal largPrinc">
				<div class="divTitulo">
					FILTRO DE MERCADORIAS
				</div>
				<div class="divFiltro">
					<p><input type="text" name="tfFiltro" placeholder="Insira o CÓDIGO ou a DESCRIÇÃO da mercadoria a filtrar!" />
						<input type="submit" id="btnRels" name="btOk" value="" style="background-image: url('../img/add.png'); background-repeat: no-repeat; background-size: 50px;">
						<input type="reset" id="btnRels" name="btCancel" value="" style="background-image: url('../img/canc.png'); background-repeat: no-repeat; background-size: 50px;" >
					</p>
				</div>
				<div class="divTitulo">
					RELATÓRIO DE MERCADORIAS<br/>
					<?php
						$vlrFiltro = @$_POST['tfFiltro'];
						require_once("../back_end/consulta.php");
						//Variável que contém a string: Consulta registro no banco de dados
						//$sqlIns = "SELECT * FROM tblmercadorias ORDER BY colId DESC LIMIT 50";
						$sqlIns = "SELECT * FROM tblmercadorias WHERE colNome LIKE '%" .$vlrFiltro. "%' OR colCod LIKE '%".$vlrFiltro."%' ORDER BY colId DESC LIMIT 50";

						//Chama a função: fRel, enviando-lhe a string de consulta
						fRel($sqlIns);

					?>
				</div>
			</div>
		</form>
	</body>
</html>