$( document ).ready(function(){
    $(".button-collapse").sideNav();
    $(".dropdown-button").dropdown();
    $('#modal-cadastro, #modal-login').modal();
    $('textarea#txtMsg').characterCounter();
});

function addNewsletter() {
    document.getElementById("msgNews").innerHTML = "<i class='fa fa-spinner fa-pulse fa-lg fa-fw' ></i>Executando ação...";
    var acao = 'I'; //Executa a função de insert no banco de dados;
    var nome = document.getElementById("txtNomeNews").value;
    var email = document.getElementById("txtEmailNews").value;

    if (nome.length < 3){
        document.getElementById("msgNews").innerHTML = "Insira seu nome com no mínimo 3 caracteres!!!";
        return;
    }else if (email.length < 8){
        document.getElementById("msgNews").innerHTML = "Seu E-MAIL está em formato incorreto!!!";
        return;
    }else if (!email.search('@')){
        document.getElementById("msgNews").innerHTML = "Seu E-MAIL está em formato incorreto. Falta o caractere @!!!";
        return;
    }else{
        var ajax = new XMLHttpRequest();
        ajax.onreadystatechange = function(){
            if (ajax.readyState == 4 && ajax.status == 200){
                document.getElementById("msgNews").innerHTML = ajax.responseText;
            }
        };
        ajax.open("GET", "BackEnd/Newsletters.php?acao="+acao+"&nm="+nome+"&email="+email, true);
        ajax.send();
    }    
}

function addAccess(){
    try {
        document.getElementById("msg").innerHTML = "<i class='fa fa-spinner fa-pulse fa-lg fa-fw' ></i>Executando ação...";
        var acao = "I"; //Executa a ação de inserir um novo registro no banco de dados;
        var nm = document.getElementById("txtNomeCad").value;
        var sbnm = document.getElementById("txtSobrenomeCad").value;
        var email = document.getElementById("txtEmailCad").value;
        var pwd = document.getElementById("txtPwdCad").value;
        var pwdConf = document.getElementById("txtPwdConfCad").value;

        if (nm.length < 3){
            document.getElementById("msg").innerHTML = "Insira o seu nome!!!";
            //alert("Insira o seu nome!!!");
            return;
        }else if (sbnm.length < 3){
            document.getElementById("msg").innerHTML = "Insira o seu sobrenome!!!";
            return;
        }else if (email.length < 8){
            document.getElementById("msg").innerHTML = "Insira o seu e-mail em formato correto!!!";
            return;
        }else if (pwd.length < 8 || pwd.length > 15){
            document.getElementById("msg").innerHTML = "Insira sua senha entre 8 e 15 caracteres!!!";
            return;
        }else if (pwd != pwdConf){
            document.getElementById("msg").innerHTML = "A senha está diferente de sua confirmação!!!";
            return;
        }else{
            nm = nm + " " + sbnm;
            var ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function(){
                if (ajax.readyState==4 && ajax.status==200){
                    document.getElementById("msg").innerHTML = ajax.responseText;
                }
            };
            ajax.open("POST", "BackEnd/ControleAcesso.php", true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.send("acao="+acao+"&nm="+nm+"&email="+email+"&pwd="+pwd);
        }
    } catch (error) {
        alert(error);
    }
}

function login(){
    try {
        document.getElementById("view-spinner-login").innerHTML = "<i class='fa fa-spinner fa-pulse fa-lg fa-fw' ></i>Executando ação...";
        var acao = "L";
        var email = document.getElementById("txtEmail").value;
        var pwd = document.getElementById("txtPwd").value;

        if (email.length < 8){
            document.getElementById("view-spinner-login").innerHTML = "Insira seu e-mail em formato correto!!!";
            return;
        }else if (pwd.length < 8 || pwd.length > 15){
            document.getElementById("view-spinner-login").innerHTML = "Insira sua senha entre 8 e 15 caracteres!!!";
            return;
        }else{
            var ajax = new XMLHttpRequest();
            ajax.onreadystatechange = function(){
                if (ajax.readyState==4 && ajax.status==200){
                    
                    var getAjax = ajax.responseText;
                    if (getAjax == "true"){
                        setTimeout(function() {
                            location = "cPanel/index.php";
                        }, 5000);
                        document.getElementById("view-spinner-login").innerHTML = "Login realizado com sucesso, você será redirecionado em 5 segundos!";
                    }else{
                        document.getElementById("view-spinner-login").innerHTML = ajax.responseText;
                    }
                    
                    //document.getElementById("view-spinner-login").innerHTML = ajax.responseText;
                }
                
            };
            ajax.open("POST", "BackEnd/ControleAcesso.php", true);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.send("acao="+acao+"&email="+email+"&pwd="+pwd);
        }
    } catch (error) {
        document.getElementById("view-spinner-login").innerHTML = "Ocorreu o seguinte erro:<br/><br/>"+error;
    }
}