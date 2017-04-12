<?php
    require_once('conexao.php');
    
    $resultSet = $conexao->query("SELECT * FROM aluno"); //faz a seleção do banco de dados
    
?>