<?php
define ('HOST', 'localhost');
define ('USER', 'root');
define ('PASS', '');
define ('BASE', 'clinica');

// Cria uma conexão com o banco de dados usando o MySQLi
$conexao = new MySQLi(HOST, USER, PASS, BASE);
$conexao->set_charset("utf8");

// Verifica se ocorreu algum erro na conexão
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

?>
