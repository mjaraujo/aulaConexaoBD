  <?php
     /*   $con =new mysqli('localhost','root','root','aluno');
        
        if($con -> connect_errno){
            throw  new Exception("Erro ao conectar com o banco");
        }
        
     */

    try {
       $con = new PDO('mysql:host=127.0.0.1;dbname=alunos;charset=utf8','root','utfprsh'); 
      
    } catch (PDOException $ex) {
          throw  new Exception("Erro ao conectar com o banco");
        
}
        
?>