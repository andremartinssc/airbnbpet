<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel do Administrador - Airbnb Pet</title>
    <link rel="stylesheet" type="text/css" href="consulta_imagens_style.css">
</head>
<body>
<!-- 
     <div id="profile">
        
        <a href="index.html">
          <img src="./assets/assets/AIRBNB-PET.png" alt="logo de shiba" /> 
        </a>
        
        </div>  -->
       
        
        <h1>Painel do Administrador</h1>
        <div class="imoveis">  
        <a href="index.html">Página Inicial</a> <br>
        <a href="exibirimoveis_root.php">Exibir Usuários Publicados</a>
        <a href="exibirimoveis_root_reprovados.php">Exibir Reprovados</a>                
        
        <?php 
        
        session_start();
        
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
        
        
        

        echo '  <form action="root.php" method="post" enctype="multipart/form-data">
                        
                        <label for="aprovacao">Verificação:
                        <select name="analise" id="analise">
                        <option value="analise">analise</option>
                        <option value="publicado">publicado</option>
                        <option value="reprovado">reprovado</option>
                        </select>
                        </label>
                        <button class="finalizar" type="submit">
                        Finalizar <ion-icon name="paw-outline"></ion-icon>
                        </button>
                        </form>';

        //busca primeiro cpf
        $sql2 = "SELECT * FROM cadastro WHERE status_online = 'analise'";
        $resultado2 = $conexao->query($sql2);
        $row2 = $resultado2->fetch_assoc();
        
        if ($row2 !== null) {
            $cpf_temp = $row2['cpf'];
                            
        
        if (isset($_POST['analise']) && $_POST['analise'] == 'publicado') {

        if ($_POST['analise'] == 'publicado'){
           

            $sql3 = "UPDATE cadastro SET status_online = 'publicado' WHERE cpf = $cpf_temp";

            $resultado3 = mysqli_query($conexao, $sql3);

            if ($resultado3) {
              echo "<h1>Dados atualizados com sucesso.</h1>";
              header("refresh:1; url=root.php");
                    exit;
            } else {
            echo "Erro ao inserir no banco de dados: " . mysqli_error($conexao);
            }           
        }
        }

        if (isset($_POST['analise']) && $_POST['analise'] == 'reprovado') {

        if ($_POST['analise'] == 'reprovado'){
           

            $sql4 = "UPDATE cadastro SET 
            status_online = 'reprovado', 
            sobre = 'Refaça o cadastro obedecendo às regras da comunidade.
             Caso não seja atualizado em 7 dias, o cadastro será excluído.'
            WHERE cpf = $cpf_temp";


            $resultado4 = mysqli_query($conexao, $sql4);

            if ($resultado4) {
              echo "<h1>Dados atualizados com sucesso.</h1>";
              header("refresh:1; url=root.php");
                    exit;
            } else {
            echo "Erro ao inserir no banco de dados: " . mysqli_error($conexao);
            }           
        }
        }
    }
        // Consulta SQL para selecionar os imóveis
        $sql = "SELECT * FROM cadastro WHERE status_online = 'analise'";
        $resultado = $conexao->query($sql);
        

            if ($resultado->num_rows > 0) {
                
                 while ($row = $resultado->fetch_assoc()) {
                
                    echo 'CPF USUARIO: ' . $row['cpf'];
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

    
        
</body>
</html>
