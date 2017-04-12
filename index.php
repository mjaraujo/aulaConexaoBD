<?php
require ('listarAlunos.php');
if (isset($_GET['ra']) && !empty($_GET['ra'])) {
    $ra = $_GET['ra'];
    $rsUpdate = $conexao->query("SELECT * FROM aluno where ALU_RA = $ra");
    if ($rsUpdate->num_rows > 0) {
        $aluno = $rsUpdate->fetch_object();
        echo 'achei alguem';
    }
    $acaoForm = 'editar';
} else {
    $acaoForm = 'cad';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title> </title>
    </head>
    <body>
        <?php if ($resultSet->num_rows > -1): ?>
            <fieldset style="width: 200">
                <legend>Cadastro de alunos</legend>
                <form method="POST" action="<?php echo $acaoForm; ?>_aluno.php">
                    <input type="hidden" name ="ra" value="<?php echo @$aluno->ALU_RA; ?>">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id ="" value=" <?php echo @$aluno->ALU_NOME; ?>">
                    <button type="submit">Salvar</button>
                </form>
            </fieldset>

            <?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 0) {
                    echo ('Não foi possível realizar a ação;');
                }
                if ($_GET['status'] == 1) {
                    echo ('Cadastro efetuado');
                }
                if ($_GET['status'] == -1) {
                    echo ('Preenchimento inválido');
                }
            }
            ?>
            <table>
                <caption>
                    <?php echo 'Alunos: ' . $resultSet->num_rows ?>
                </caption>
                <thead>
                    <tr>
                        <th>RA</th>
                        <th>NOME</th>
                        <th>ACOES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($aluno = $resultSet->fetch_array()): ?>
                        <tr>
                            <td><?php echo $aluno['ALU_RA'] ?></td>
                            <td><?php echo $aluno['ALU_NOME'] ?></td>
                            <td><a href="apagar_aluno.php?ra=<?php echo $aluno['ALU_RA']; ?>">apagar</a></td>
                            <td><a href="index.php?ra=<?php echo $aluno['ALU_RA']; ?>">editar</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p> Não existem dados para exibir.</p>
        <?php endif; ?>
    </body>
</html>

<?php
//fetch_array
//fetch_object
?>

