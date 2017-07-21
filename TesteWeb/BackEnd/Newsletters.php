<?php
    require_once("Regras_Negocios/Newsletters.php");
    $acao = $_GET['acao'];
    $executar;
    switch($acao){
        case 'S':

            break;
        case 'I':
            $nm = $_GET['nm'];
            $email = $_GET['email'];
            $executar = new Newsletters(array($nm, $email), $acao);
            break;
        default:
            echo "Nenhuma ação foi especificada para o banco de dados!!!";
            break;
    }
    
?>