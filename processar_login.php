<?php
        
        $usuario = 'root';
        $senha = '';
        $database = 'airbnbpet';
        $host = 'localhost';
        
        $mysqli = new mysqli($host, $usuario, $senha, $database);
        
        if($mysqli->error) {
            die("Falha ao conectar ao banco de dados: " . $mysqli->error);
        }
        if(isset($_POST['cpf']) || isset($_POST['senha'])) {
        
            if(strlen($_POST['email']) == 0) {
                echo "Preencha seu cpf";
            } else if(strlen($_POST['senha']) == 0) {
                echo "Preencha sua senha";
            } else {
        
                $cpf = $mysqli->real_escape_string($_POST['cpf']);
                $senha = $mysqli->real_escape_string($_POST['senha']);
        
                $sql_code = "SELECT * FROM usuarios WHERE cpf = '$cpf' AND senha = '$senha'";
                $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        
                $quantidade = $sql_query->num_rows;
        
                if($quantidade == 1) {
                    
                    $usuario = $sql_query->fetch_assoc();
        
                    if(!isset($_SESSION)) {
                        session_start();
                    }
        
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['nome'] = $usuario['nome'];
        
                    header("Location: painel.php");
        
                } else {
                    echo "Falha ao logar! cpf ou senha incorretos";
                }
        
            }
        
        }
        ?>