<?php
    require_once '../Models/conexao.php';
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];

    // // Conectar ao banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // // Checar conexão
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // Consulta SQL para buscar registros com nome e CPF correspondentes
    $sql = "SELECT * FROM clinica WHERE nome='$nome' AND cpf='$cpf'";
    $result = $conn->query($sql);

    // Exibir resultados da busca
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Nome: " . $row["nome"] . "<br>";
        echo "CPF: " . $row["cpf"] . "<br>";
        
    }
    } else {
    echo "Nenhum resultado encontrado.";
    }

    $conn->close();
?>