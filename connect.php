  <?php
     /*   $con =new mysqli('localhost','root','root','aluno');
        
        if($con -> connect_errno){
            throw  new Exception("Erro ao conectar com o banco");
        }
        
     */

    try {
       $con = new PDO('mysql:host=localhost;dbname=alunos;charset=utf8','root','utfprsh'); 
      
    } catch (PDOException $ex) {
          throw  new Exception("Erro ao conectar com o banco");
        
}
        
?>