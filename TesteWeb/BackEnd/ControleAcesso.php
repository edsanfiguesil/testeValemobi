<?php
    require_once("Regras_Negocios/ControleAcesso.php");
    $acao = $_POST['acao'];
    $executar;
    switch ($acao) {
        case 'S':
            # code...
            break;
        
        case 'L':
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];

            $email = base64_encode($email);
            $pwd = base64_encode($pwd);

            $executar = new ControleAcesso(array($email, $pwd), $acao);
            break;
        
        case 'I':
            $nm = $_POST['nm'];
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];

            $email = base64_encode($email);
            $pwd = base64_encode($pwd);

            $executar = new ControleAcesso(array($nm, $email, $pwd), $acao);
            break;
        
        case 'U':
            # code...
            break;
        
        case 'D':
            # code...
            break;
        
        default:
            # code...
            break;
    }
?>