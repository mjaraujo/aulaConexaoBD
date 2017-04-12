<?php

require_once ('./conexao.php');

$nome = $_POST['nome'];
$ra = $_POST['ra'];

if (!empty($nome)) {
    $resultSet = $conexao->query('UPDATE aluno SET ALU_NOME = \'' . $_POST['nome'] . '\' WHERE ALU_RA = ' . $ra); 
    if ($conexao->affected_rows > 0) {
        header('location: index.php?status=1');
    } else {
        header('location: index.php?status=0');
    }
} else {
    header('location: index.php?status=-1');
}
    