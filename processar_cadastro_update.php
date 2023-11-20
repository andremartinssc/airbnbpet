<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Atualizar Cadastro - Processamento</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
<?php

$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$cidade = $_POST["cidade"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$sobre = $_POST["sobre"];
$senha = $_POST["senha"];
$status_online = "analise";

// Define o diretório de upload
$uploadDirectory = 'upload/';

// Conectando com banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$database = "airbnbpet";

$conexao = mysqli_connect($servername, $username, $password, $database);
if (!$conexao) {
    die("Falha na conexao: " . mysqli_connect_error());
}
echo "Sucesso na conexao com banco de dados";

// Arrays para armazenar nomes únicos das imagens
$uploadedImages = array();



// Montar a cláusula SET dinamicamente
$setClause = '';
if (!empty($nome)) $setClause .= "nome = '$nome', ";
if (!empty($endereco)) $setClause .= "endereco = '$endereco', ";
if (!empty($cidade)) $setClause .= "cidade = '$cidade', ";
if (!empty($telefone)) $setClause .= "telefone = '$telefone', ";
if (!empty($email)) $setClause .= "email = '$email', ";
if (!empty($sobre)) $setClause .= "sobre = '$sobre', ";
if (!empty($senha)) $setClause .= "senha = '$senha', ";
$setClause .= "status_online = '$status_online', ";



// Remover a vírgula extra no final da cláusula SET
$setClause = rtrim($setClause, ', ');

session_start();
$sql = "UPDATE cadastro SET $setClause WHERE cpf = '" . $_SESSION['cpf'] . "'";

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    echo "<h1>Dados atualizados com sucesso.</h1>";
} else {
    echo "Erro ao inserir no banco de dados: " . mysqli_error($conexao);
}

// Fechando a conexão com o banco de dados
mysqli_close($conexao);

echo "<h1>Dados Recebidos:</h1>";
echo "<p><strong>Nome:</strong> $nome</p>";
echo "<p><strong>Endereco: </strong> $endereco</p>";
echo "<p><strong>Telefone: </strong> $telefone</p>";
echo "<p><strong>Email: </strong> $email</p>";
echo "<p><strong>Senha: </strong> $senha</p>";
echo "<p><strong>Sobre: </strong> $sobre</p>";
echo "<p><strong>Cidade: </strong> $cidade</p>";

?>
<a href="painel.php">RETORNAR</a>

</body>
</html>
