<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Atualizar Cadastro - Processamento</title>
    <link rel="stylesheet" href="style.css" />
</head>

<?php

$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$cidade = $_POST["cidade"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$cpf = $_POST["cpf"];
$sobre = $_POST["sobre"];
$senha = $_POST["senha"];
$senharep = $_POST["senharep"];
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

// Verifica se o CPF já existe no banco de dados
$sqlVerificaCPF = "SELECT cpf FROM cadastro WHERE cpf = '$cpf'";
$resultadoVerificaCPF = mysqli_query($conexao, $sqlVerificaCPF);

if (mysqli_num_rows($resultadoVerificaCPF) > 0) {
    echo "<h1>CPF já cadastrado. Por favor, escolha outro CPF.</h1>";
} else {
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

    // Insira os nomes únicos das imagens no banco de dados
    if (!empty($uploadedImages)) {
        $image1 = isset($uploadedImages[0]) ? $uploadedImages[0] : null;
        $image2 = isset($uploadedImages[1]) ? $uploadedImages[1] : null;
        $image3 = isset($uploadedImages[2]) ? $uploadedImages[2] : null;
        $image4 = isset($uploadedImages[3]) ? $uploadedImages[3] : null;
        $image5 = isset($uploadedImages[4]) ? $uploadedImages[4] : null;

        $sql = "INSERT INTO cadastro (nome, endereco, cidade, telefone, email, cpf, sobre,  senha, imagem1, imagem2, imagem3, imagem4, imagem5, status_online)
            VALUES ('$nome', '$endereco', '$cidade', '$telefone', '$email', '$cpf', '$sobre', '$senha', '$image1', '$image2', '$image3', '$image4', '$image5', '$status_online')";

        $resultado = mysqli_query($conexao, $sql);

        if ($resultado) {
            echo "<h1>Imagens e dados enviados e salvos com sucesso.</h1>";
        } else {
            echo "Erro ao inserir no banco de dados: " . mysqli_error($conexao);
        }
    } else {
        echo "Nenhuma imagem foi enviada ou ocorreu um erro no upload.";
    }
}

// Fechando a conexão com o banco de dados
mysqli_close($conexao);

echo "<h1>Dados Recebidos:</h1>";
echo "<p><strong>Nome:</strong> $nome</p>";
echo "<p><strong>Endereco: </strong> $endereco</p>";
echo "<p><strong>Telefone: </strong> $telefone</p>";
echo "<p><strong>Email: </strong> $email</p>";
echo "<p><strong>CPF: </strong> $cpf</p>";
echo "<p><strong>Senha: </strong> $senha</p>";
echo "<p><strong>Sobre: </strong> $sobre</p>";
echo "<p><strong>Sobre: </strong> $cidade</p>";

?>
<a href="login.php">RETORNAR</a>
</body>
</html>

