<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Atualizar Cadastro - Processamento</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
<?php

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

for ($i = 1; $i <= 5; $i++) {
    $imageName = $_FILES["imagem{$i}"]['name'];
    $imageTmpName = $_FILES["imagem{$i}"]['tmp_name'];

    if (!empty($imageName)) {
        // Gere um nome único para a imagem
        $uniqueName = uniqid() . '_' . $imageName;
        $targetFilePath = $uploadDirectory . $uniqueName;

        // Move a imagem para o diretório de upload
        if (move_uploaded_file($imageTmpName, $targetFilePath)) {
            $uploadedImages[] = $uniqueName;
        }
    }
}

session_start();

// Montar a cláusula SET dinamicamente
$setClause = '';
for ($i = 0; $i < 5; $i++) {
    $imageName = isset($uploadedImages[$i]) ? $uploadedImages[$i] : null;
    $setClause .= "imagem" . ($i + 1) . " = '$imageName', ";
}

// Remover a vírgula extra no final da cláusula SET
$setClause = rtrim($setClause, ', ');

$sql = "UPDATE cadastro SET $setClause WHERE cpf = '" . $_SESSION['cpf'] . "'";

$resultado = mysqli_query($conexao, $sql);

if ($resultado) {
    echo "<h1>Imagens atualizadas com sucesso.</h1>";

    // Exibir as imagens
    echo "<h2>Imagens Atualizadas:</h2>";
    
} else {
    echo "Erro ao inserir no banco de dados: " . mysqli_error($conexao);
}

// Fechando a conexão com o banco de dados
mysqli_close($conexao);

?>
<a href="painel.php">RETORNAR</a>

</body>
</html>
