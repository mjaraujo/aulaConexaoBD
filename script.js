function carregarDados() {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var result = document.getElementById('result');
            result.innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open('GET', 'listarAlunos.php', true);
    xmlhttp.send();

}


/**
 * Função para o envio de dados
 * @returns {undefined}
 */
/*            function enviarDados() {
 var req = new XMLHttpRequest();
 
 var dados = "subject=" + document.forms[0][0].value;
 dados += "&";
 dados += "msg=" + document.forms[0][1].value;
 
 req.onreadystatechange = function name() {
 if (req.readyState == 4 && req.status == 200) {
 document.querySelector("form span").innerHTML = "Dados enviados: " + req.response;
 }
 }
 req.open("POST", "ajax.php", true);
 req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 req.send(dados);
 }
 */
/**
 * Função para o envio de dados
 * @returns {undefined}
 */
function cadastrarAluno() {
    var req = new XMLHttpRequest();
    var dados = "nomeAluno=" + document.forms[0][0].value;

    if (document.forms[0][1].value != null) {
        dados += "&ra=" + document.forms[0][1].value;
    }


    var acao = document.forms[0][1].value == "" ? "inserir" : "editar";

    req.onreadystatechange = function name() {
        if (req.readyState == 4 && req.status == 200) {
            document.forms[0][1].value = "";
            carregarDados();
       }
    }
    if (acao == "inserir") {
        
        req.open("POST", "novo_aluno.php", true);
    } else {
        req.open("POST", "editar_aluno.php", true);
    }
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send(dados);

    carregarDados();

}
