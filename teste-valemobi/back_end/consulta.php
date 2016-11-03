<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 

function fRel($strSql){
	//Conectando ao banco de dados
	require_once('conexao/config.php');
	
	//Cria cabecalho tabela 
	echo "
		<table width='100%' border='1' cellspacing='2' align='center'>
			<tr  style='background-color:#000080; color: white;'>
				<td width='15%'>CÓDIGO</td>
				<td width='15%'>TIPO</td>
				<td width='35%'>DESCRIÇÃO</td>
				<td width='10%'>QUANT.</td>
				<td width='10%'>PREÇO</td>
				<td width='15%'>TIPO DE NEGÓCIO</td>
			</tr>
	";

	$resultado = mysqli_query($cn, $strSql);

	while ($reg = mysqli_fetch_array($resultado)) {
		$codigo = $reg['colCod'];
		$tipo = $reg['codTpMerc'];
		$descricao = $reg['colNome'];
		$qtd = $reg['colQtd'];
		$preco = $reg['colPreco'];
		$tpNeg = $reg['colTpNegocio'];

		echo "<tr style='color: black;'>";
			echo "<td>".$codigo."</td>";
			echo "<td>".$tipo."</td>";
			echo "<td>".$descricao."</td>";
			echo "<td>".$qtd." Unid.</td>";
			echo "<td>R$ ".$preco."</td>";
			echo "<td>".$tpNeg."</td>";
		echo "</tr>";
	}

	echo "</table>";

    //Fecha a conecão com o banco de dados
	mysqli_close($cn);	
}
?>