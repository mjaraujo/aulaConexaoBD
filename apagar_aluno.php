<?php

require_once ('./conexao.php');

$ra = $_GET['ra'];

if (!empty($ra)) {
    $resultSet = $conexao->query('DELETE FROM aluno WHERE ALU_RA= ' . $ra);
    if ($conexao->affected_rows > 0) {
        header('location: index.php?status=1');
    } else {
        header('location: index.php?status=0');
    }
}
    