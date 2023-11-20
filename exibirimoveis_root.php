<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Usuários Publicados</title>
    <link rel="stylesheet" type="text/css" href="consulta_imagens_style.css">
</head>
<body>

<div id="profile">
        
        <a href="root.php">
          <img src="./assets/assets/AIRBNB-PET.png" alt="logo de shiba" /><br>
          
          <a href="root.php">Painel Administrador</a>
        </a>
    </div>
        <div class="search-form-container">
            <form method="GET" action="exibirimoveis_root.php">
            <label for="search">Pesquisar:</label>
            <input type="text" id="search" name="search">
            <button type="submit">Buscar</button>
            </form>
        </div>     

    <h1>Usuários Publicados</h1>
    
    <div class="imoveis">
        
        <?php
        // Recupere o termo de pesquisa da URL
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

// Conectar ao banco de dados (substitua com suas credenciais)
$host = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'airbnbpet';
$count = 0;


$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
}

// Consulta SQL para selecionar os imóveis
$sql = "SELECT * FROM cadastro 
        WHERE status_online = 'publicado' AND 
        (nome LIKE '%$searchTerm%' OR endereco LIKE '%$searchTerm%' OR cidade LIKE '%$searchTerm%' OR 
        telefone LIKE '%$searchTerm%' OR cpf LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%' OR sobre LIKE '%$searchTerm%')";
        
$resultado = $conexao->query($sql);

        echo '<div class="faixa-branca">';
        echo '</div>';

        if (isset($_POST['reanalise'])) {

            if ($_POST['reanalise'] == 'analise'){
               
    
                $sql3 = "UPDATE cadastro SET status_online = 'analise' WHERE cpf = '" . $_POST['cpf_temp'] . "'";

    
                $resultado3 = mysqli_query($conexao, $sql3);
    
                if ($resultado3) {
                    
                  echo "<h1>Usuário Encaminhado para Análise.</h1>";
                  header("refresh:2; url=exibirimoveis_root.php");
                    exit;
                } else {
                echo "Erro ao inserir no banco de dados: " . mysqli_error($conexao);
                }           
            }
            }

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {

        
        echo '<h2>' . $row['nome'] . '</h2>';
        echo '<h2>CPF: ' . $row['cpf'] . '</h2>';
        echo '<p>Endereço: ' . $row['endereco'] . '</p>';
        echo '<p>Cidade: ' . $row['cidade'] . '</p>';
        echo '<p>Telefone: ' . $row['telefone'] . '</p>';
        echo '<p>Email: ' . $row['email'] . '</p>';
        echo '<p>Sobre: ' . $row['sobre'] . '</p>';
        $cpf_temp = $row['cpf'];

        echo '  <form action="exibirimoveis_root.php" method="post" enctype="multipart/form-data">
                        
                <label for="reanalise">Verificação:
                <input type="hidden" name="cpf_temp" value="' . $cpf_temp . '" />
                <select name="reanalise" id="reanalise">
                <option value="publicado">publicado</option>
                <option value="analise">Enviar para análise</option>
                
                </select>
                </label>
                <button class="finalizar" type="submit">
                Enviar <ion-icon name="paw-outline"></ion-icon>
                </button>
                </form>';

                    
        
            
        echo '<div class="imovel">';
        echo '<img src="upload/' . $row['imagem1'] . '" alt="Imagem 1" class="imagem">';
        echo '<img src="upload/' . $row['imagem2'] . '" alt="Imagem 2" class="imagem">';
        echo '<img src="upload/' . $row['imagem3'] . '" alt="Imagem 3" class="imagem">';
        echo '<img src="upload/' . $row['imagem4'] . '" alt="Imagem 4" class="imagem">';
        echo '<img src="upload/' . $row['imagem5'] . '" alt="Imagem 5" class="imagem">';
        echo '</div>';
        
        echo '<br>';
        echo '<div class="faixa-branca">';
        echo '</div>';
        
        
    }
} else {
    echo "Nenhum imóvel encontrado.";
}

// Fechar a conexão com o banco de dados
$conexao->close();
echo '<br';
?>

    </div>
</body>
</html>
