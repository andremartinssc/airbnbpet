<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Imoveis Disponiveis São José - Airbnb Pet</title>
    <link rel="stylesheet" type="text/css" href="consulta_imagens_style.css">
</head>
<body>
<form method="GET" action="search.php"> <!-- Altere 'search.php' para o arquivo real que processará a pesquisa -->
    <label for="search">Pesquisar:</label>
    <input type="text" id="search" name="search">
    <button type="submit">Buscar</button>
</form>

<div id="profile">
        
        <a href="index.html">
          <img src="./assets/assets/AIRBNB-PET.png" alt="logo de shiba" />
        </a>
        
        </div>
    <h1>Locais Disponíveis São José</h1>
    <a href="index.html">Página Inicial</a>
    <div class="imoveis">
        
        <?php
        // Recupere o termo de pesquisa da URL
            $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

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
$sql = "SELECT * FROM cadastro 
        WHERE status_online = 'publicado' AND cidade = 'saojose' AND 
        (nome LIKE '%$searchTerm%' OR endereco LIKE '%$searchTerm%' OR cidade LIKE '%$searchTerm%' OR 
        telefone LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%' OR sobre LIKE '%$searchTerm%')";
        
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {

        
        echo '<h2>' . $row['nome'] . '</h2>';
        echo '<p>Endereço: ' . $row['endereco'] . '</p>';
        echo '<p>Cidade: ' . $row['cidade'] . '</p>';
        echo '<p>Telefone: ' . $row['telefone'] . '</p>';
        echo '<p>Email: ' . $row['email'] . '</p>';
        echo '<p>Sobre: ' . $row['sobre'] . '</p>';
        echo '<div class="imovel">';
        echo '<img src="http://localhost/airbnbpet/upload/ ' . $row['imagem1'] . '" alt="Imagem 1" class="imagem">';
        echo '<img src="http://localhost/airbnbpet/upload/ ' . $row['imagem2'] . '" alt="Imagem 2" class="imagem">';
        echo '<img src="http://localhost/airbnbpet/upload/ ' . $row['imagem3'] . '" alt="Imagem 3" class="imagem">';
        echo '<img src="http://localhost/airbnbpet/upload/ ' . $row['imagem4'] . '" alt="Imagem 4" class="imagem">';
        echo '<img src="http://localhost/airbnbpet/upload/ ' . $row['imagem5'] . '" alt="Imagem 5" class="imagem">';
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

?>
<div class="faixa-branca">';
       </div>';
    </div>
</body>
</html>
