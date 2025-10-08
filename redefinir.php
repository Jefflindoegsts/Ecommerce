<html>
     <h3>Redefinir a senha</h3>
     <form action='' method='post'>  
          Senha (6 digitos)<br>
          <input type='password' name='senha1' maxlength='6'><br>
          Redigite a senha<br>
          <input type='password' name='senha2' maxlength='6'><br>                
          <input type='submit' value='Alterar'>
     </form>

     <?php

          include "util.php";
          
          session_start();

          if ( $_POST ) {  

               $conn = conecta();
     
               $senha1 = $_POST['senha1'];
               $senha2 = $_POST['senha2'];
            
               $token = $_GET['token'];
               $email = $_SESSION["email"];

               $sql = "select senha from usuario where email='$email'";              
               $senha = ValorSQL1($conn, $sql);     
               
               if ( $senha == $token )  {
                    if ( $senha1 == $senha2 ) {
                         $senha1 = password_hash($senha1,PASSWORD_DEFAULT);
                         ExecutaSQL($conn, "update usuario set senha='$senha1' where email='$email'");
                         echo "<br>Senha alterada com sucesso !!";
                    } else echo "<br>Senhas estão diferentes";
               } else echo "<br>Token invalido !!<br>";

               echo "<br><br><a href='login.html'>Login</a>";
          }
     ?>  
</html>