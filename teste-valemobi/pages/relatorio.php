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

						//Chama a função: fCad, enviando-lhe a string de inserção
						fRel($sqlIns);

					?>
				</div>
			</div>
		</form>
	</body>

	<!--<?php 
			if (!empty($_POST['tfCod']) && !empty($_POST['tfTipo']) && !empty($_POST['tfNome']) && !empty($_POST['tfQtd']) && !empty($_POST['tfPreco'])){

				$codigo = $_POST['tfCod'];
				$tipo = $_POST['tfTipo'];
				$nome = $_POST['tfNome'];
				$qtd = $_POST['tfQtd'];
				$preco = $_POST['tfPreco'];
				$negocio = $_POST['tpNegocio'];

				//Conecta-se ao arquivo que contém a função de cadastro
				require_once("../back_end/cadastro.php");

				//Variável que contém a string: Inserir registro no banco de dados
				$sqlIns = "INSERT INTO tblmercadorias (colCod, codTpMerc, colNome, colQtd, colPreco, colTpNegocio) VALUES ($codigo, '$tipo', '$nome', $qtd, $preco, '$negocio')";

				//Chama a função: fCad, enviando-lhe a string de inserção
				fCad($sqlIns);

			}
		?> -->
</html>