<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Visualizar Imagens por CPF</title>
    <link rel="stylesheet" type="text/css" href="consulta_imagens_style.css">

</head>
<body>
    <h2>Visualizar Imagens por CPF</h2>
    <form method="POST">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" required>
        
        <button type="submit">Visualizar Imagens</button>
         
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifica se o campo CPF foi preenchido
        if (isset($_POST['cpf'])) {
            $cpf = $_POST['cpf'];

            // Conectar ao banco de dados
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "airbnbpet";

            $conexao = mysqli_connect($servername, $username, $password, $database);
            if (!$conexao) {
                die("Falha na conexao: " . mysqli_connect_error());
            }
            
            // Consulta SQL para recuperar as imagens com base no CPF
            $sql = "SELECT imagem1, imagem2, imagem3, imagem4, imagem5 FROM cadastro WHERE cpf = '$cpf'";

            $resultado = mysqli_query($conexao, $sql);

            // Verifica se há resultados
            
            if (mysqli_num_rows($resultado) > 0) {
                while ($row = mysqli_fetch_assoc($resultado)) {
                    echo '<img src="upload/' . $row['imagem1'] . '" alt="Imagem 1" class="imagem">';
                    echo '<img src="upload/' . $row['imagem2'] . '" alt="Imagem 2" class="imagem">';
                    echo '<img src="upload/' . $row['imagem3'] . '" alt="Imagem 3" class="imagem">';
                    echo '<img src="upload/' . $row['imagem4'] . '" alt="Imagem 4" class="imagem">';
                    echo '<img src="upload/' . $row['imagem5'] . '" alt="Imagem 5" class="imagem">';

                }
            } else {
                echo "Nenhuma imagem encontrada para o CPF informado.";
            }

            // Fechar a conexão com o banco de dados
            mysqli_close($conexao);
        } else {
            echo "CPF não especificado. Por favor, preencha o campo CPF.";
        }
    }
    ?>
    <br>
    <br>
        <ul> <!-- ---linkando a imagem do perfil ------------>
          <li>
            <a href="index.html">Inicio<ion-icon name="paw-outline"></ion-icon></a>
          </li>

        </ul>
    
</body>
</html>
