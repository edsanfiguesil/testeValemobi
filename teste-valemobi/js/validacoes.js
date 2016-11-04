
//Valida as informações sendo inseridas no campo "Código"
function fValCod(){
	retorno = true;
	cod = document.frmCadForn.tfCod.value.toLowerCase();
	qtd = document.frmCadForn.tfQtd.value.toLowerCase();
	var chars = new Array("a", "á", "ã", "à", "â", "ä", "b", "c", "d", "e", "é", "è","ê", "ë", "f", "g", "h", "i", "í", "ì", "î", "ï", "j", "k", "l", "m", "n", "ñ", "o", "ó", "ò", "ô", "õ", "ö", "p", "q", "r", "s", "t", "u", "ú", "ù", "û", "ü", "v", "w", "x", "y", "z", "\'", "!", "@", "#", "$", "%", "&", "*", "(", ")", "-", "_", "+", "=", "/", "?", "°", "{", "}", "ª", "º", ";", ":", ">", "<", "ç", "|", "\\");
	if (cod.length < 1 || cod < 1 || qtd.length < 1 || qtd < 1){
		retorno = false;
		window.alert("Insira o código e a quantidade da mercadoria!\n\nNão podem ser inferior a 1.");
	}else {
		for (i = 0; i<=chars.length -1; i++){
			if (cod.indexOf(chars[i]) != -1 || qtd.indexOf(chars[i]) != -1){
				retorno = false;
				window.alert("O caractere ( " + chars[i] + ", " + chars[i].toUpperCase() + " ) não é aceito nos campos CÓDIGO e QUANTIDADE!");
				break;
			}
		}
	}
	return retorno;

}

function valTpDesc(){
	var retorno = true;
	var tp = document.frmCadForn.tfTipo.value.toLowerCase();
	var desc = document.frmCadForn.tfNome.value.toLowerCase();
	var chars = new Array("!", "'", "\"", "@", "#", "$", "&", "*", "(", ")", "_", "+", "=", "{", "}", "ª", "º", ";", ".", ",", "<", ">", "/", "?", "°", "\\", "|", "~", "^", "´", "`", "¨", "¢", "£", "¹", "²", "³", "¬", "§", "₢", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
	if (tp.length <= 0 || desc.length <= 0){
		retorno = false;
		alert("Insira o o TIPO e a DECRIÇÃO da mercadoria!");
	}else {
		for (i=0;i<=chars.length-1;i++){
			if (tp.indexOf(chars[i]) != -1 || desc.indexOf(chars[i]) != -1){
				retorno = false;
				window.alert("O caractere ( " + chars[i] + ", " + chars[i].toUpperCase() + " ) não é aceito nos campos TIPO e DESCRIÇÃO!");
				break;
			}
		}
	}
	return retorno;
}

function fValPreco(){
	retorno = true;
	preco = document.frmCadForn.tfPreco.value.toLowerCase();
	var chars = new Array("a", "á", "ã", "à", "â", "ä", "b", "c", "d", "e", "é", "è","ê", "ë", "f", "g", "h", "i", "í", "ì", "î", "ï", "j", "k", "l", "m", "n", "ñ", "o", "ó", "ò", "ô", "õ", "ö", "p", "q", "r", "s", "t", "u", "ú", "ù", "û", "ü", "v", "w", "x", "y", "z", "\'", "!", "@", "#", "$", "%", "&", "*", "(", ")", "-", "_", "+", "=", "/", "?", "°", "{", "}", "ª", "º", ";", ":", ",", ">", "<", "ç", "|", "\\");
	if (preco.length < 1 || preco < 0.1){
		retorno = false;
		window.alert("Insira o PREÇO da mercadoria!\n\nNão pode ser inferior a 0,1;");
	}else {
		for (i = 0; i<=chars.length -1; i++){
			if (preco.indexOf(chars[i]) != -1){
				retorno = false;
				window.alert("O caractere ( " + chars[i] + ", " + chars[i].toUpperCase() + " ) não é aceito no campo PREÇO!");
				break;
			}
		}
	}
	return retorno;

}

function fValTpNegocio(){
	retorno = true;
	tpNeg = document.frmCadForn.tpNegocio.value.toLowerCase();
	if (tpNeg == ""){
		retorno = false;
		window.alert("Selecione um tipo de negócio!");
	}
	return retorno;

}






function fSubmeter(){
	if (fValCod() && valTpDesc() && fValPreco() && fValTpNegocio()){
		resp = window.confirm("Confirma que todas as informações estão corretas?");
		if (resp == true) {
			document.frmCadForn.submit();
		}
	}
}