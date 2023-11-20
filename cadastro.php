<!DOCTYPE html>
<html lang="pt-br" class="">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro</title>
    <link rel="stylesheet" href="fundo.css" />
  </head>
  <body>
   

    <div id="container">
      <!-- ----inicio da div do icone do perfil principal ------------>
      

      <div id="profile">
        
      <a href="index.html">
        <img src="./assets/assets/AIRBNB-PET.png" alt="logo de shiba" />
      </a>
      
        <p>AIRBNB PET</p>        
              <p>Seja Um Voluntário Você Também </p>
      </div>
      
        
        <div id="cadastro">
        <form action="processar_cadastro.php" method="post" enctype="multipart/form-data">

        <label for="nome">Nome:___          
        <input type="text" name="nome" id="nome" required>
        </label><br><br>
    
        <label for="endereco">Endereço:
        <input type="text" name="endereco" id="endereco" required>
        </label><br><br>

        <label for="cidade">Cidade:
        <select name="cidade" id="cidade" required>
        <option value="palhoca">Palhoça</option>
        <option value="saojose">São José</option>
        </select>
        </label><br><br>

        <label for="telefone">Telefone:_
        <input type="text" name="telefone" id="telefone" required>
        </label><br><br>
    
        <label for="email">E-mail:___
        <input type="email" name="email" id="email" required>
        </label><br><br>
    
        <label>CPF:.____
        <input type="text" name="cpf" id="cpf" required>
        </label><br><br>

        <label>Senha ___
        <input type="password" name="senha" id="senha" required>
        </label><br><br>

        <div>
        Repita a senha
        </div>
        <br>

        <label>Senha ___
        <input type="password" name="senharep" id="senharep" required>
        </label><br><br>

        <div id="profile">
        
        Faça uma pequena descrição do seu espaço disponível, porte e tipos de pets<br> 
        aos quais vai oferecer serviços
      
        </div>
        <label>
        <textarea name="sobre" id="sobre" rows="5" cols="40" style="color: black;"></textarea>
        </label><br><br>

        <br>
        Adicione as fotos de seu anúncio:
        <p>
        <br>
      
        
        <label for="imagem1">Imagem (Capa):
        <input type="file" name="imagem1" id="imagem1">
        </label><br><br>

        <label for="imagem2">Imagem2:_____
        <input type="file" name="imagem2" id="imagem2">
        </label><br><br>

        <label for="imagem3">Imagem3:_____
        <input type="file" name="imagem3" id="imagem3">
        </label><br><br>

        <label for="imagem4">Imagem4:_____
        <input type="file" name="imagem4" id="imagem4">
        </label><br><br>

        <label for="imagem5">Imagem5:_____
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

            Duvidas ou Problemas entre em contato por e-mail <br> <ion-icon name="arrow-forward-outline"></ion-icon> Airbnbpet@gmail.com


          </footer>


    </div>  
    <!-- FIM da div do contáiner principal -->

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="./script.js"></script>
        
        
  </body>
</html>
