var gId;


function save(){
    var getIdUpt = document.getElementById("idUpdt").value;
    if(getIdUpt === ""){
        insert_mercadoria();
    }else{
        edit_mercadoria(getIdUpt);
    }
}

function chamaEditar(id){
    gId = id;
    document.getElementById('acao').innerHTML = "Você irá atualizar o registro "+ id+"!";
    document.getElementById("idUpdt").value = gId;
}

function chamaIncluir(){
    gId = null;
    document.getElementById('acao').innerHTML = "Você irá inserir um novo registro! ";
    document.getElementById("idUpdt").value = gId;
}

function list_all(){
    document.getElementById("view-spinner").innerHTML = "<i class='fa fa-spinner fa-pulse fa-lg fa-fw' ></i>";
    var ajax = new XMLHttpRequest();
    var param_search = document.getElementById("txtSearch").value;
    var acao = 'S';

    ajax.onreadystatechange = function(){
        if (ajax.readyState==4 && ajax.status==200){
            document.getElementById("resultados").innerHTML = ajax.responseText;
            document.getElementById("view-spinner").innerHTML = "";
        }
    };
    ajax.open("GET", "BackEnd/Mercadorias.php?acao="+acao+"&p="+param_search, true);
    ajax.send();

}

function insert_mercadoria(){
    try{
        var acao = 'I';
        var tp_merc = document.getElementById("txtTipoMerc").value;
        var desc_merc = document.getElementById("txtDescricao").value;
        var qtd_merc = document.getElementById("txtQtd").value;
        var preco_merc = document.getElementById("txtPreco").value;
        var tp_negocio = document.querySelector('input[name = "tp_negocio"]:checked').value;

        if(validaCampos()){
            var msgConfirm = confirm("Você está inserindo um novo registro ao sistema.\n\nDeseja continuar?");
            if(msgConfirm){
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function(){
                    if (ajax.readyState == 4 && ajax.status == 200){
                        //document.getElementById("resultado").innerHTML = ajax.responseText;
                        alert(ajax.responseText);
                    }
                };
                ajax.open("GET", "BackEnd/Mercadorias.php?acao="+acao+"&tp_merc="+tp_merc+"&desc_merc="+desc_merc+"&qtd_merc="+qtd_merc+"&preco_merc="+preco_merc+"&tp_negocio="+tp_negocio, true);
                ajax.send();
            }
        }
    }catch(e){
        alert(e);
    }
}

function edit_mercadoria(id){
    try {
        var acao = 'U';
        var tp_merc = document.getElementById("txtTipoMerc").value;
        var desc_merc = document.getElementById("txtDescricao").value;
        var qtd_merc = document.getElementById("txtQtd").value;
        var preco_merc = document.getElementById("txtPreco").value;
        var tp_negocio = document.querySelector('input[name = "tp_negocio"]:checked').value;
        
        if (validaCampos()){
            var msgConfirm = confirm("Você está atualizando o registro de código: "+id+".\n\nDeseja continuar?");
            if (msgConfirm){
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function(){
                    if (ajax.readyState===4 && ajax.status===200){
                        alert(ajax.responseText);
                    }
                }
                ajax.open("GET", "BackEnd/Mercadorias.php?acao="+acao+"&id="+id+"&tp_merc="+tp_merc+"&desc_merc="+desc_merc+"&qtd_merc="+qtd_merc+"&preco_merc="+preco_merc+"&tp_negocio="+tp_negocio, true);
                ajax.send();
            }
        }
    } catch (error) {
        alert(error);
    }    
}

function delete_mercadoria(id){
    try {
        var acao = 'D';
        var msgConfirm = confirm("Você está excluindo o registro de código: "+id+".\n\nDeseja continuar?");
        
        if (msgConfirm){
            var ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function(){
                if (ajax.readyState == 4 && ajax.status == 200){
                    //document.getElementById("resultado").innerHTML = ajax.responseText;
                    alert(ajax.responseText);
                }
            };
            ajax.open("GET", "BackEnd/Mercadorias.php?acao="+acao+"&id="+id, true);
            ajax.send();
        }
    } catch (error) {
        alert(error);
    } 
}

function clean(){
    try {
        document.getElementById("txtTipoMerc").value = "";
        document.getElementById("txtDescricao").value = "";
        document.getElementById("txtQtd").value = "";
        document.getElementById("txtPreco").value = "";
        document.getElementById("idUpdt").value = "";
        document.getElementById('acao').innerHTML = "";
    } catch (error) {
        alert(error);
    }  
}

function validaCampos(){
    var bln = true;
    try {
        var tp_merc = document.getElementById("txtTipoMerc").value;
        var desc_merc = document.getElementById("txtDescricao").value;
        var qtd_merc = document.getElementById("txtQtd").value;
        var preco_merc = document.getElementById("txtPreco").value;
        var tp_negocio = document.querySelector('input[name = "tp_negocio"]:checked').value;

        if (tp_merc.length < 3){
            bln = false;
            alert("Insira o 'TIPO DE MERCADORIA' com no mínimo 3 caracteres! ");
        }else if (desc_merc.length < 3){
            bln = false;
            alert("Insira a 'DESCRIÇÃO DA MERCADORIA' com no mínimo 3 caracteres! ");
        }else if (qtd_merc == "" || isNaN(qtd_merc)){
            bln = false;
            alert("Insira a 'QUANTIDADE DA MERCADORIA' ou verifique se a informação inserida é um número! ");
        }else if (preco_merc == "" || isNaN(preco_merc)){
            bln = false;
            alert("Insira o 'PREÇO' unitário da mercadoria ou verifique se a informação inserida é um número! ");
        }

    } catch (error) {
        alert(error);
    }
    return bln;
}

