<?php
require_once ('connect.php');

$sql = 'select * from alunos';
$stmt = $con->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$stmt->execute();
?>

<?php
while ($r = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
    ?>
    <tr> 
        <th scope="row"><?php echo $r[0]; ?></th> 
        <td><?php echo $r[1] ?></td>
        <td><a href="apagar_aluno.php?ra=<?php echo $r[0] ?>" > Apagar</a></td>
        <td><a href="index.php?ra=<?php echo $r[0] ?>" > Editar</a></td>
    </tr> 
<?php } ?>

