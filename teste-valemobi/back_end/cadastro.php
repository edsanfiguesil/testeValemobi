<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 

function fCad($strSql){
	//Conectando ao banco de dados
	require_once('conexao/config.php');
	
	//Insere o registro no banco de dados
	$resultado = mysqli_query($cn, $strSql) or die("
        <script>
            alert('Ocorreu uma falha em relação à sintaxe que insere registro!!!');
            history.back();
        </script>");

	//Valida se todas as informações foram inseridas com sucesso: Caso sim, comita/salva; caso alguma informação não tenha sido inserida, dá um ROLLBACK, cancela a operação
	if ($resultado){
        @mysqli_query("COMMIT");
        echo "
            <script>
                alert('Registro cadastrado com sucesso!');
                history.back();
            </script>";
    }else{
        @mysqli_query("ROLLBACK");
        echo "
            <script>
                alert('O registro não foi salvo corretamente!');
                history.back();
            </script>";
    }

    //Fecha a conecão com o banco de dados
	mysqli_close($cn);	
}
?>