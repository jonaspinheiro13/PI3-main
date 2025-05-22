<?php
// Dados de conexão com o banco de dados
$servername = "127.0.0.1"; 
$username = "USUARIO"; 
$password = "1234"; 
$dbname = "cadastros"; 

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
