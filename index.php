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
if(isset($_GET['ra'])&& !empty($_GET['ra'])){
    $ra = $_GET['ra'];
    $rsAl = $con->query('SELECT * FROM alunos WHERE al_ra ='.$ra);
echo('SELECT * FROM alunos WHERE al_ra='.$ra);echo('<pre>');var_dump($rsAl);echo('</pre>');
    if($rsAl->rowCount() > 0){
        $aluno = $rsAl->fetch(PDO::FETCH_OBJ);
    }
   $acaoForm = 'editar';
}else{
    $acaoForm = 'novo';
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
        <fieldset>
            <legend>Cadastrar Aluno</legend>
          
            <form method="post" action="<?php echo $acaoForm; ?>_aluno.php" >
                <label for="nome">Nome</label>
                <input type="hidden" name="ra" id="ra" value="<?php echo @$aluno->al_ra  ?>"/>
                <input type="text" name="nome" id="nome" value="<?php echo @$aluno->al_nome  ?>"/>
                <button type="submit">Salvar</button>
            </form>
        </fieldset>
        <h2><?php
        if(isset($_GET['status'])){
            if($_GET['status']==0){
                echo ('Não foi possivel realizar a ação');
            }elseif($_GET['status']==1){
                echo 'Operação realizada com sucesso';
            }else{
                echo 'Dados Inválidos';
            }
        }
        ?></h2>
       
        <?php if($rs->rowCount() > 0): ?>
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