<?php
    session_start();
    if (empty($_SESSION['id']) || empty($_SESSION['email'])){
        header("location: ../index.html");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Gestão de Mercadoria&reg;</title>
        <meta name="copyright" content="Eduardo dos Santos"> 
        <meta name="description" content="Desenvolvido para facilitar eficazmente a gestão de mercadorias de sua empresa!!!">
        <meta name="keywords" content="Gestão, Mercadorias, Gestão de Mercadorias">
        <meta name="news_keywords" content="Gestão, Mercadorias, Gestão de Mercadorias">
		<meta name="robots" content="all">
        <meta name="distribution" content="global">
        <meta name="generator" content="Dreamweaver">
        <meta name="language" content="Portuguese">
        <meta name="rating" content="general">
        <meta name="author" content="Eduardo dos Santos">
        <meta name="web_author" content="Eduardo dos Santos">
        <meta name="contact" content="edsanfiguesil@yahoo.com.br" />
        <meta name="reply-to" content="edsanfiguesil@yahoo.com.br">

        <!-- FOLHAS DE ESTILO DA PÁGINA -->
        <link rel="stylesheet" href="css/frameworks/icons.css">
        <link rel="stylesheet" href="css/frameworks/materialize.css">
        <link rel="stylesheet" href="css/default.css">
        <link rel="stylesheet" href="css/frameworks/font-awesome/css/font-awesome.min.css">

        <link rel="icon" href="../img/logo.png">

        
    </head>
    <body onload="list_all()"> 
        <header class="header">
            
        </header>

        <main>
            <h1>Página criada apenas para demonstrar o pós login!!!</h1>
            <?php
                echo "<p>ID DE USUÁRIO: ".$_SESSION['id']."</p>";
                echo "<p>NOME: ".$_SESSION['nome']."</p>";
                echo "<p>E-MAIL: ".$_SESSION['email']."</p>";
            ?>
            <a href="logout.php">Encerrar Sessão</a>
        </main>

        <footer>
            
        </footer>

    </body>
</html>