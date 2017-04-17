<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*$conexao = new mysqli('localhost', 'root', 'utfprsh', 'banco');//4 parametros 1-host BD, 2-usuario, 3 - senha, 4- nome do CD
        
        if($conexao->connect_errno){
            throw new Exception("Erro ao Conectar ao banco de dados");
        }else{
            //echo 'conexao realizada com sucesso';
        }
         * 
         */
        
        try{
            $conexao = new PDO('mysql:host=localhost;dbname=teste;charset=utf8','root','utfprsh');
        } catch (Exception $ex) {
             echo 'Erro ao conectar ao banco de dados';
        }
        ?>
    </body>
</html>
