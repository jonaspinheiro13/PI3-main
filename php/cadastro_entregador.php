<?php

require('db.php');

// Recebendo os dados do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$sobrenome = $_POST['sobrenome'];
$imagem = isset($_POST['imagem']) ? $_POST['imagem'] : '';  
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

// Preparando a query para inserir os dados
$sql = "INSERT INTO entregadores (nome, sobrenome, imagem, dia, mes, ano, rg, cpf, rua, numero, bairro, estado, cidade, cep) 
        VALUES ('$nome', '$sobrenome', '$imagem', '$dia', '$mes', '$ano', '$rg', '$cpf', '$rua', '$numero', '$bairro', '$estado', '$cidade', '$cep')";

// Verificando se a inserção foi bem-sucedida
if ($conn->query($sql) === TRUE) {
    echo "Novo registro criado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

// Fechando a conexão
$conn->close();

if ($_FILES['imagem']['error'] == 0) {
    $imagem_nome = $_FILES['imagem']['name'];
    $imagem_tmp = $_FILES['imagem']['tmp_name'];
    $imagem_destino = 'uploads/' . $imagem_nome;

    // Movendo o arquivo para o diretório de uploads
    if (move_uploaded_file($imagem_tmp, $imagem_destino)) {
        echo "Imagem carregada com sucesso!";
    } else {
        echo "Erro ao carregar a imagem!";
    }
} else {
    echo "Nenhuma imagem foi carregada.";
}


?>
