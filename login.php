<!DOCTYPE html>
<html lang="pt-br" class="">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro</title>
    <link rel="stylesheet" href="fundo.css" />
  </head>
  <body>
    <!---------- inicio da div do contáiner principal -->

    <div id="container">
      <!-- ----inicio da div do icone do perfil principal ------------>
      

      <div id="profile">
        
      <a href="index.html">
        <img src="./assets/assets/AIRBNB-PET.png" alt="logo de shiba" />
      </a>
      
        <p>AIRBNB PET</p>        
              <p>Se já é usuário por favor entre com login e senha: </p>
      </div>
      
      <!-- ---FIM da div do icone do perfil principal ------------>

     
      <div>
        
        <div id="cadastro">
        <form action="login.php" method="post" enctype="multipart/form-data">

        <label for="cpf">CPF do Usuário_         
        <input type="text" name="cpf" id="cpf" required>
        </label><br><br>
    
        <label for="senha">Senha de Acesso
        <input type="password" name="senha" id="senha" required>
        </label><br><br>
    

        <button class="finalizar" type="submit">
        Entrar <ion-icon name="paw-outline"></ion-icon>
        </button>
        </form>
        </div>

        <?php

       $usuario = 'root';
       $senha = '';
       $database = 'airbnbpet';
       $host = 'localhost';
       
       $mysqli = new mysqli($host, $usuario, $senha, $database);
       
       if($mysqli->error) {
          
           die("Falha ao conectar ao banco de dados: " . $mysqli->error);
       }

      
        if(isset($_POST['cpf']) || isset($_POST['senha'])) {
        
             {
        
                $cpf = $mysqli->real_escape_string($_POST['cpf']);
                $senha_usuario = $mysqli->real_escape_string($_POST['senha']);
        
                $sql_code = "SELECT * FROM cadastro WHERE cpf = '$cpf' AND senha = '$senha_usuario'";
                $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        
                $quantidade = $sql_query->num_rows;
        
                if($quantidade == 1) {
                    
                    $usuario = $sql_query->fetch_assoc();
        
                    if(!isset($_SESSION)) {
                        session_start();
                    }
                    

                    $_SESSION['cpf'] = $cpf;
                    $_SESSION['senha'] = $senha_usuario;

                    if ($cpf == 000) {
                      header("Location: root.php");
                    }else{
        
                    header("Location: painel.php");
                  }
        
                } else {

                    echo '<div id="cadastro">';
                    echo "Falha ao logar! E-mail ou senha incorretos";
                    echo '</div>';
                }
        
            }
        
        }
        ?>
        <div id="profile">
        <a href="cadastro.php">Clique aqui para cadastro de novo usuário</a>
        </div>


        <div id="social-links">
          <a href="https://www.instagram.com">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>

          <a href="https://www.facebook.com">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>

          <a href="https://www.linkedin.com">
            <ion-icon name="logo-linkedin"></ion-icon>
          </a>

          <a href="https://www.youtube.com">
            <ion-icon name="logo-youtube"></ion-icon>
          </a>

          <a href="https://www.twitter.com">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>

          <a href="https://www.whatsapp.com">
            <ion-icon name="logo-whatsapp"></ion-icon>
          </a>
        </div>
        <footer>
          Duvidas ou Problemas entre em contato por e-mail <br />
          <ion-icon name="arrow-forward-outline"></ion-icon> Airbnbpet@gmail.com
        </footer>
      </div>

      <!-- ---INICIO da div dos botões em lista ------------>
    </div>
    <!-- FIM da div do contáiner principal -->
    
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>

    <script src="./script.js"></script>
  </body>
</html>
