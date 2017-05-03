<!DOCTYPE html>
<?php
//require_once 'listarAlunos.php';
//TESTE DE CADASTRO DE TELEFONES - TEMPORARIO
/*    $sql = "INSERT INTO telefones(tf_telefone, tf_alu_ra) "
  . "VALUES(:tf, :ra)";
  $stmt = $con->prepare($sql);

  $stmt->bindValue(':tf','(45)3268-1930', PDO::PARAM_STR);
  $stmt->bindValue(':ra',3, PDO::PARAM_STR);
  $retorno = $stmt->execute();

  $stmt->bindValue(':tf','(45)2252-1530', PDO::PARAM_STR);
  $stmt->bindValue(':ra',5, PDO::PARAM_STR);
  $retorno = $stmt->execute();
 */
//

require_once './connect.php';
if (isset($_GET['ra']) && !empty($_GET['ra'])) {
    $ra = $_GET['ra'];
    $rsAl = $con->query('SELECT * FROM alunos WHERE al_ra =' . $ra);
    echo('SELECT * FROM alunos WHERE al_ra=' . $ra);
    echo('<pre>');
    var_dump($rsAl);
    echo('</pre>');
    if ($rsAl->rowCount() > 0) {
        $aluno = $rsAl->fetch(PDO::FETCH_OBJ);
    }
    $acaoForm = 'editar';
} else {
    $acaoForm = 'novo';
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body onload="carregarDados()">
        <script type="text/javascript">

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
                alert(document.forms[0][1].value);
                var dados = "nomeAluno=" + document.forms[0][0].value;

                if (document.forms[0][1].value != null) {
                    dados += "&ra=" + document.forms[0][1].value;
                } else {
                    alert("inserindo");
                }


                var acao = document.forms[0][1].value == "" ? "inserir" : "editar";

                req.onreadystatechange = function name() {
                    if (req.readyState == 4 && req.status == 200) {
                        alert(acao);
                         document.forms[0][1].value="";  
                        carregarDados();
                        
                        //document.querySelector("form span").innerHTML = "Aluno " + req.response + " cadastrado.";
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


        </script>
        <fieldset>
            <legend>Cadastrar Aluno</legend>

            <form id="form" name="form" method="post" action="#" >
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?php echo @$aluno->al_nome ?>"/>
                <input type="hidden" name="ra" id="ra" value="<?php echo @$aluno->al_ra ?>"/>
                <button type="button" onclick="cadastrarAluno()">Salvar</button>
            </form>
            <span></span>
        </fieldset>
        <h2><?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 0) {
                    echo ('Não foi possivel realizar a ação');
                } elseif ($_GET['status'] == 1) {
                    echo 'Operação realizada com sucesso';
                } else {
                    echo 'Dados Inválidos';
                }
            }
            ?></h2>


        <div class="row">
            <table class="table "> 
                <thead> 
                    <tr> 
                        <th>#</th> 
                        <th>Nome</th> 
                    </tr> 
                </thead> 
                <tbody id="result"> 

                </tbody> 
            </table>
        </div>



    </body>
</html>