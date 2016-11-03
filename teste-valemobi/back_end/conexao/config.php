<?php 

		$host = 'localhost';
		$user = 'testevalemobi';
		$pwd = 'aquiEstaASenha';
		$bd = 'testevalemobi';
	
	$cn = mysqli_connect($host, $user, $pwd, $bd);

	if (!$cn){
		die(mysql_error());
	}
	//echo 'Tudo Certo. Novamente!';
 ?>
