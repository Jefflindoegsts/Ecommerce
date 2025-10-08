<html>
     <title>Tela de Redefinição de Senha</title>
     <link rel="stylesheet" href="styleEsqueciSenha.css">

     <div class = "container">
     <h3>Redefinir a senha</h3>
     <form action='' method='post'>  
          <label for = "senha1">  Senha (6 digitos):</label>
          <input type='password' name='senha1' maxlength='6' required><br>
          <label for = "senha2">Redigite a senha:</label>
          <input type='password' name='senha2' maxlength='6' required><br>                
          <button type='submit'>Alterar</button>
     </form>

          <div class="links">
               <a href="index.html">Página inicial</a>
               <a href="login.html">Login</a>
          </div>
     </div>

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