<?php

require_once './connect.php';

$nome = $_POST['nomeAluno'];
$ra = $_POST['ra'];

if(!empty($nome) && !empty($ra)){
    $rs = $con->query("UPDATE alunos SET al_nome = '".$nome."' WHERE al_ra=".$ra);
    if($rs->rowCount() > 0){
         header('location:index.php?status=1');
    }else{
         header('location:index.php?status=0');
    }
   
}else{
    header('location:index.php?status=-1');
}
