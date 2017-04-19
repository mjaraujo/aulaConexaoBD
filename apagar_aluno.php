<?php

require_once './connect.php';

$ra = $_GET['ra'];

if (!empty($ra)) {
    //apagar telefones


    $sql = "DELETE FROM telefones where tf_alu_ra = :ra";
    $stmt1 = $con->prepare($sql);
    $stmt1->bindValue(':ra', $ra, PDO::PARAM_INT);

    $sql = "DELETE FROM alunos WHERE al_ra= :ra";
    $stmt2 = $con->prepare($sql);
    $stmt2->bindValue(':ra', $ra, PDO::PARAM_INT);

    try {
        $con->beginTransaction();
        $retorno = $stmt1->execute();
        $retorno = $stmt2->execute();


        if ($retorno) {
            header('location:index.php?status=1');
        } else {
            header('location:index.php?status=0');
        }

        $con->commit();
    } catch (PDOException $ex) {
        $con->rollBack();
    }
} else {
    header('location:index.php?status=-1');
}
