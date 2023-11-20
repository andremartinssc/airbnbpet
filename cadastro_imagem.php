<!DOCTYPE html>
<html lang="pt-br" class="">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DevLinks</title>
    <link rel="stylesheet" href="./cadastro.css" />
  </head>
  <body>
    <!---------- inicio da div do contáiner principal -->

    <div id="container">
      <!-- ----inicio da div do icone do perfil principal ------------>
      

      <div id="profile">
        
        <img src="./assets/assets/AIRBNB-PET.png" alt="logo de shiba" /> 
      
        <p>AIRBNB PET</p> 
        
        
        <ul>
          <li>
              Seja Um Voluntário Você Também <ion-icon name="paw-outline"></ion-icon>
          </li>
        </ul>
      </div>

      <!-- ---FIM da div do icone do perfil principal ------------>

      <!-- ---inicio da DIV para criação do botão switch para mudar o modo claro e noturno ------------>
      <div id="switch" onclick="toggleMode()">
        <button></button>
        <span></span>
      </div>
      <!-- ---fim da DIV para criação do botão switch para mudar o modo claro e noturno ------------>

      <!-- ---INICIO da div dos botões em lista ------------>
      <div>
        

        <div id="cadastro">
        <form action="processar_cadastro_imagem.php" method="post" enctype="multipart/form-data">

        <label for="imagem1">Imagem1:
        <input type="file" name="imagem1" id="imagem1">
        </label><br><br>

        <label for="imagem2">Imagem2:
        <input type="file" name="imagem2" id="imagem2">
        </label><br><br>

        <label for="imagem3">Imagem3:
        <input type="file" name="imagem3" id="imagem3">
        </label><br><br>

        <label for="imagem4">Imagem4:
        <input type="file" name="imagem4" id="imagem4">
        </label><br><br>

        <label for="imagem5">Imagem5:
        <input type="file" name="imagem5" id="imagem5">

        </label><br><br>

        <button class="finalizar" type="submit">
        Finalizar <ion-icon name="paw-outline"></ion-icon>
        </button>
        </form>
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
