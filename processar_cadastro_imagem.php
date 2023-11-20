<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Formulário de Cadastro - Processamento</title>
</head>

<body>
    <?php
    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conectando ao banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "airbnbpet";

        $conexao = mysqli_connect($servername, $username, $password, $database);
        if (!$conexao) {
            die("Falha na conexão: " . mysqli_connect_error());
        }

        // Verifica se as imagens foram enviadas corretamente
        $uploadedImages = array();
        $uploadDirectory = 'upload/';

        for ($i = 1; $i <= 5; $i++) {
            $imageName = $_FILES["imagem{$i}"]['name'];
            $imageTmpName = $_FILES["imagem{$i}"]['tmp_name'];

            if (!empty($imageName)) {
                // Move a imagem para a pasta "upload"
                $targetFilePath = $uploadDirectory . $imageName;

                if (move_uploaded_file($imageTmpName, $targetFilePath)) {
                    $uploadedImages[] = $imageName;
                }
            }
        }

        // Insira os nomes originais das imagens no banco de dados
        if (!empty($uploadedImages)) {
            $image1 = isset($uploadedImages[0]) ? $uploadedImages[0] : null;
            $image2 = isset($uploadedImages[1]) ? $uploadedImages[1] : null;
            $image3 = isset($uploadedImages[2]) ? $uploadedImages[2] : null;
            $image4 = isset($uploadedImages[3]) ? $uploadedImages[3] : null;
            $image5 = isset($uploadedImages[4]) ? $uploadedImages[4] : null;

            $sql = "INSERT INTO cadastro (imagem1, imagem2, imagem3, imagem4, imagem5) 
                    VALUES ('$image1', '$image2', '$image3', '$image4', '$image5')";
            
            $resultado = mysqli_query($conexao, $sql);

            if ($resultado) {
                echo "<h1>Imagens enviadas e salvas com sucesso.</h1>";
            } else {
                echo "Erro ao inserir no banco de dados: " . mysqli_error($conexao);
            }
        } else {
            echo "Nenhuma imagem foi enviada ou ocorreu um erro no upload.";
        }

        // Fechando a conexão com o banco de dados
        mysqli_close($conexao);
    } else {
        echo "O formulário não foi submetido corretamente.";
    }
    ?>

    <a href="index.html">RETORNAR</a>
</body>
</html>
