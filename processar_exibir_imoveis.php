<?php
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
$sql = "SELECT * FROM cadastro WHERE status_online = 'publicado' AND cidade = 'palhoca'";
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
        echo '<img src="upload/' . $row['imagem1'] . '" alt="Imagem 1" class="imagem">';
        echo '<img src="upload/' . $row['imagem2'] . '" alt="Imagem 2" class="imagem">';
        echo '<img src="upload/' . $row['imagem3'] . '" alt="Imagem 3" class="imagem">';
        echo '<img src="upload/' . $row['imagem4'] . '" alt="Imagem 4" class="imagem">';
        echo '<img src="upload/' . $row['imagem5'] . '" alt="Imagem 5" class="imagem">';
        echo '</div>';
        echo '<div class="faixa-branca">';
        echo '</div>';
       
       
       
    }
} else {
    echo "Nenhum imóvel encontrado.";
}

// Fechar a conexão com o banco de dados
$conexao->close();
?>
