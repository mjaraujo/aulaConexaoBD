<?php

require_once './connect.php';

$nome = $_POST['nome'];

if(!empty($nome)){
    $con->query("INSERT INTO alunos(al_nome) VALUES('$nome')");
    if($con->affected_rows > 0){
         header('location:index.php?status=1');
    }else{
         header('location:index.php?status=0');
    }
   
}else{
    header('location:index.php?status=-1');
}
