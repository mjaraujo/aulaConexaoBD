<!DOCTYPE html>
<?php
require_once 'listarAlunos.php';
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
    <body>
        <script type="text/javascript">
    /*     
    function carregarDados() {
                var req = new XMLHttpRequest();
                req.onreadystatechange = function name() {
                    if (req.readyState == 4 && req.status == 200) {
                        document.querySelector("div#container").innerText += req.responseText;
                    }
                }
                req.open("GET", "ajax.php", true);
                req.send(null);
            }
*/
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
                
                req.onreadystatechange = function name() {
                    if (req.readyState == 4 && req.status == 200) {
                        document.querySelector("form span").innerHTML = "Aluno " + req.response + " cadastrado.";
                    }
                }
                req.open("POST", "novo_aluno.php", true);
                req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                req.send(dados);
            }


        </script>
        <fieldset>
            <legend>Cadastrar Aluno</legend>

            <form method="post" action="#" >
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

        <?php if ($rs->rowCount() > 0): ?>
            <table>
                <caption>Alunos(<?php echo $rs->rowCount(); ?>)</caption>
                <thead>
                    <tr>
                        <th>RA</th>
                        <th>NOME</th>
                        <th>AÇÃO</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php while ($aluno = $rs->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $aluno['al_ra'] ?></td>
                            <td><?php echo $aluno['al_nome'] ?></td>
                            <td><a href="apagar_aluno.php?ra=<?php echo $aluno['al_ra'] ?>" > Apagar</a></td>
                            <td><a href="index.php?ra=<?php echo $aluno['al_ra'] ?>" > Editar</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Não existe valores para exibir</p>

        <?php endif; ?>


    </body>
</html>