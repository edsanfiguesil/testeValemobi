<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>CADASTRO DE MERCADORIA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<link href="../css/estilo.css" rel="stylesheet" type="text/css" media="all" />

	</head>

	<body>
		<form name="frmCadForn" method="POST">
			<div class="divPrincipal">
				<div class="divTitulo">
					CADASTRO DE MERCADORIA
				</div>
					<p><input type="text" name="tfCod" placeholder="Código" />
					<input type="text" name="tfTipo" placeholder="Tipo" /></p>
					<p><input type="text" name="tfNome" placeholder="Nome"></p>
					<p><input type="text" name="tfQtd" placeholder="Quantidade" style="width: 46%;">
					<input type="text" name="tfPreco" placeholder="Preço (R$)" style="width: 46%;"></p>

					<fieldset id="tipoNegocio">
						<legend>Tipo de Negócio</legend>
						<p><input type="radio" name="tpNegocio" value="Compra">Compra
						<input type="radio" name="tpNegocio" value="Venda">Venda</p>
					</fieldset>

					<p>
						<input type="submit" name="btSave" value="" style="background-image: url('../img/add.png'); background-repeat: no-repeat; background-size: cover;">
						<input type="reset" name="btCancel" value="" style="background-image: url('../img/canc.png'); background-repeat: no-repeat; background-size: cover;" >
						<input type="button" name="btRel" value="" onclick="pgRel()" style="background-image: url('../img/rel.png'); background-repeat: no-repeat; background-size: cover;" >
					</p>
			</div>
		</form>
	</body>
	<?php 
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
		?> 

	<script type="text/javascript">
		function pgRel(){
			window.location.href="relatorio.php";
		}
	</script>
</html>