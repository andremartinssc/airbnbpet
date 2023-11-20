<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel de Usuário - Airbnb Pet</title>
    <link rel="stylesheet" type="text/css" href="consulta_imagens_style.css">
</head>
<body>
<!-- 
     <div id="profile">
        
        <a href="index.html">
          <img src="./assets/assets/AIRBNB-PET.png" alt="logo de shiba" /> 
        </a>
        
        </div>  -->
       
      
        
        <h1>Painel de Usuário</h1>
        <div class="imoveis">  
        <a href="index.html">Página Inicial</a> <br><br>
        <a href="excluir.php">Excluir Cadastro</a>               

        <?php 
        
        session_start();
        echo ('Usuário: ') . $_SESSION['cpf'];
        echo '<br>';
        
        $cpf = $_SESSION['cpf'];
        $senha_usuario = $_SESSION['senha'];

    
        // Conectar ao banco de dados (substitua com suas credenciais)
        $host = 'localhost'; 
        $usuario = 'root';
        $senha = '';
        $banco = 'airbnbpet';
        
        $conexao = new mysqli($host, $usuario, $senha, $banco);
        
        if ($conexao->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
        }
        
        // Consulta SQL para selecionar os imóveis
        $sql = "SELECT * FROM cadastro WHERE cpf = $cpf AND senha = $senha_usuario ";
        $resultado = $conexao->query($sql);
        
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
        
                
                echo '<h2>' . $row['nome'] . '</h2>';
                echo '<p>Endereço: <br>' . $row['endereco'] . '</p>';
                echo '<p>Telefone: <br>' . $row['telefone'] . '</p>';
                echo '<p>Email: <br>' . $row['email'] . '</p>';
                
                echo '<p>Sobre: <p><br> ' . $row['sobre'] . '</p>';
                echo '<div class="imovel">';
                echo '<img src="upload/' . $row['imagem1'] . '" alt="Imagem 1" class="imagem">';
                echo '<img src="upload/' . $row['imagem2'] . '" alt="Imagem 2" class="imagem">';
                echo '<img src="upload/' . $row['imagem3'] . '" alt="Imagem 3" class="imagem">';
                echo '<img src="upload/' . $row['imagem4'] . '" alt="Imagem 4" class="imagem">';
                echo '<img src="upload/' . $row['imagem5'] . '" alt="Imagem 5" class="imagem">';
                echo '</div>'; 
            }
            
        } else {
            echo "Nenhum imóvel encontrado.";
        }
        
        // Fechar a conexão com o banco de dados
        $conexao->close();
        


        
        
         ?>
    </div>
    <div id="container">
    
        <h2>Alterar as informações de seu anúncio:</h2><br>
        <form action="processar_cadastro_update.php" method="post" enctype="multipart/form-data">

        <label for="nome">Nome:___          
        <input type="text" name="nome" id="nome">
        </label>
    
        <label for="endereco">Endereço:
        <input type="text" name="endereco" id="endereco">
        </label>

        <label for="cidade">Cidade:
        <select name="cidade" id="cidade">
        <option value="palhoca">Palhoça</option>
        <option value="saojose">São José</option>
        </select>
        </label>
    
        <label for="telefone">Telefone:_
        <input type="text" name="telefone" id="telefone">
        </label>
    
        <label for="email">E-mail:___
        <input type="email" name="email" id="email">
        </label>
    
        <label>Senha ___
        <input type="password" name="senha" id="senha">
        </label>

        <div>
        Repita a senha
        </div>
        <br>

        <label>Senha ___
        <input type="password" name="senharep" id="senharep">
        </label>

        <div id="profile">
        
        Faça uma pequena descrição do seu espaço disponível, porte e tipos de pets<br> 
        aos quais vai oferecer serviços
      
        </div>
        <label>
        <textarea name="sobre" id="sobre" rows="5" cols="40" style="color: black;"></textarea>
        </label>

        <br>
       
        <button class="finalizar" type="submit">
        Atualizar Dados<ion-icon name="paw-outline"></ion-icon>
        </button>
        </form><br>


        <form action="processar_cadastro_update_imagem.php" method="post" enctype="multipart/form-data">


        <h2>Alterar as fotos de seu anúncio:</h2><br>


        <label for="imagem1">Imagem (Capa):
        <input type="file" name="imagem1" id="imagem1" required>
        </label><br>

        <label for="imagem2">Imagem2:_____
        <input type="file" name="imagem2" id="imagem2" require>
        </label><br>

        <label for="imagem3">Imagem3:_____
        <input type="file" name="imagem3" id="imagem3" require>
        </label><br>

        <label for="imagem4">Imagem4:_____
        <input type="file" name="imagem4" id="imagem4" required>
        </label><br>

        <label for="imagem5">Imagem5:_____
        <input type="file" name="imagem5" id="imagem5" required>

        </label><br>

        <button class="finalizar" type="submit">
        Atualizar Imagens <ion-icon name="paw-outline"></ion-icon>
        </button>
        </form>

        
        </div>
        
</body>
</html>
