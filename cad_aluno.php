<?php

require_once ('./conexao.php');

$nome = $_POST['nome'];

if (!empty($nome)) {
    $resultSet = $conexao->query('INSERT INTO aluno (ALU_NOME)'
            . 'values(\'' . $nome . '\')'); //faz a seleção do banco de dados
    if ($conexao->affected_rows > 0) {
        header('location: index.php?status=1');
    } else {
        header('location: index.php?status=0');
    }
} else {
    header('location: index.php?status=-1');
}
    