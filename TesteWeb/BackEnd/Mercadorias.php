<?php
    require_once("Regras_Negocios/Mercadorias.php");
    $acao = $_GET['acao'];
    $executar;
    
    switch ($acao) {
        case 'S': //Executa a ação de selecionar os registros;
            $vlr = $_GET['p'];
            $executar = new Mercadorias(array($vlr), 'S');
            break;
        case 'I': //Executa a ação de inserir um novo registro;
            $tp_merc = $_GET['tp_merc'];
            $desc_merc = $_GET['desc_merc'];
            $qtd_merc = $_GET['qtd_merc'];
            $preco_merc = $_GET['preco_merc'];
            $tp_negocio = $_GET['tp_negocio'];
            $executar = new Mercadorias(array($tp_merc, $desc_merc, $qtd_merc, $preco_merc, $tp_negocio), 'I');
            break;
        case 'U': //Executa a ação de atualizar um registro existente;
            $tp_merc = $_GET['tp_merc'];
            $desc_merc = $_GET['desc_merc'];
            $qtd_merc = $_GET['qtd_merc'];
            $preco_merc = $_GET['preco_merc'];
            $tp_negocio = $_GET['tp_negocio'];
            $id = $_GET['id'];
            $executar = new Mercadorias(array($id, $tp_merc, $desc_merc, $qtd_merc, $preco_merc, $tp_negocio), 'U');
            break;
        case 'D': //Executa a ação de excluir um registro existente;
            $id = $_GET['id'];
            $executar = new Mercadorias(array($id), 'D');
            break;
        
        default:
            echo "O parâmetro 'acao' não atende aos requisitos, o qual deve ser uma inicial do CRUD!";
            break;
    }
    
?>