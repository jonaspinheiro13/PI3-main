<?php

require('db.php');

// Obtendo os dados do formulário
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$rg = $_POST['rg'];
$cpf = $_POST['cpf'] . $_POST['cpf2'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$cep = $_POST['cep'] . $_POST['cep2'];

// Processando o upload de imagem
if ($_FILES['imagem']['name']) {
    $imagem_nome = $_FILES['imagem']['name'];
    $imagem_tmp = $_FILES['imagem']['tmp_name'];
    $imagem_destino = "uploads/" . $imagem_nome;
    move_uploaded_file($imagem_tmp, $imagem_destino);
} else {
    $imagem_destino = null; // Caso não haja imagem
}

// Inserindo os dados no banco de dados
$sql = "INSERT INTO entregadores (nome, sobrenome, imagem, dia, mes, ano, rg, cpf, rua, numero, bairro, estado, cidade, cep) 
        VALUES ('$nome', '$sobrenome', '$imagem_destino', '$dia', '$mes', '$ano', '$rg', '$cpf', '$rua', '$numero', '$bairro', '$estado', '$cidade', '$cep')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

// Fechando a conexão
$conn->close();
?>
