<?php
        include "util.php";
        include "emails.php";
        
        session_start();

        if ( $_POST ) {   
          $conn = conecta();
          $email = $_POST['email'];
          $select = $conn->prepare("select nome,senha from usuario where email=:email ");
          $select->bindParam(':email',$email);
          $select->execute();
          $linha = $select->fetch();
          
          if ( $linha ) {
            
            $token = $linha['senha']; 
            
            $nome = $linha['nome'];
            
            $seusite = "eq2.ini2a"; 
            
            $html="<h4>Redefinir sua senha</h4><br>
                  <b>Oi, $nome!</b>, <br>
                  Clique no link para redefinir sua senha:<br>
                  http://$seusite.projetoscti.com.br/redefinir.php?token=$token";
            
            $_SESSION["email"] = $email;

            if ( EnviaEmail ( $email, '* Recupere a sua senha !! *', $html ) ) {
                  echo "<br><b>Email enviado com sucesso!</b> (Verifique sua caixa de spam se nao encontrar)";
            }   

          } else {
            echo "<br>Email não cadastrado";
          }

          echo "<br><br><a href='login.html'>Voltar</a>";
        }    
     ?>
</html>