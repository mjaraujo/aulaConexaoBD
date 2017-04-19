<?php
require_once './connect.php';

$ra = $_GET['ra'];

if(!empty($ra)){
    $con->query("DELETE FROM alunos WHERE al_ra='$ra'");
    if($con->affected_rows > 0){
         header('location:index.php?status=1');
    }else{
         header('location:index.php?status=0');
    }
   
}else{
    header('location:index.php?status=-1');
}
