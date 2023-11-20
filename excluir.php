<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Imóveis Disponíveis Palhoça - Airbnb Pet</title>
    <link rel="stylesheet" type="text/css" href="consulta_imagens_style.css">
</head>
<body>
    <div id="profile">
        <a href="painel.php">
            <img src="./assets/assets/AIRBNB-PET.png" alt="logo de shiba" /><br>
            <a href="painel.php">Painel Usuário</a>
        </a>
    </div>
    
    <form method="POST" action="excluir.php">
        <label for="excluir">Deseja confirmar exclusão do cadastro?</label><br>
        <input type="hidden" name="excluir" value="confirmar">
        <button type="submit">Confirmar</button>
    </form>
    
    <?php
    
    ?>
    
</body>
</html>


<?php
session_start();

// Verifica se o parâmetro 'excluir' foi enviado através do método POST
if(isset($_POST['excluir']) && $_POST['excluir'] === 'confirmar') {
    // Conectar ao banco de dados (substitua com suas credenciais)
    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'airbnbpet';

    $conexao = new mysqli($host, $usuario, $senha, $banco);

    if ($conexao->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
    }

    // Prevenção de injeção de SQL usando prepared statements
    $sql = "DELETE FROM cadastro WHERE cpf = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $_SESSION['cpf']);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<h1>Dados excluídos com sucesso.</h1>";
        // Redireciona para a página desejada após a exclusão
        header("refresh:2; url=index.html");
        exit;
    } else {
        echo "Erro ao excluir dados: " . $conexao->error;
    }

    // Fechar a conexão com o banco de dados
    $stmt->close();
    $conexao->close();
}
?>

