<?php

require_once './connect.php';

$nome = $_POST['nomeAluno'];

if (!empty($nome)) {
    //$con->query("INSERT INTO alunos(al_nome) VALUES('$nome')");
    $sql = "INSERT INTO alunos(al_nome) VALUES(:nome)";
    $stmt = $con->prepare($sql);

    $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
    $retorno = $stmt->execute();

    if($retorno){
        header('location:index.php?status=1');
    }else{
        header('location:index.php?status=0');
    }
    /* if($con->affected_rows > 0){
      header('location:index.php?status=1');
      }else{
      header('location:index.php?status=0');
      }

      }else{
      header('location:index.php?status=-1');
      } */
}