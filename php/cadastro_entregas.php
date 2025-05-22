<?php

require('db.php');

// Verificando se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pegando os dados do formulário
    $nome_cliente = $_POST['nome'];
    $numero_pedido = $_POST['numeroPedido'];
    $data_entrega = $_POST['dataEntrega']; 
    $hora = $_POST['horaEntrega'];
    $valor = $_POST['valor'];
    $endereco_cliente = $_POST['EnderecoCliente'];
    $telefone = $_POST['telefone'];
    $itens_pedido = $_POST['itensPedido'];



    // Preparando a consulta SQL para inserção
    $sql = "INSERT INTO entregas (nome_cliente, numero_pedido, data_entrega, hora, valor, endereco_cliente, telefone, itens_pedido)
            VALUES ('$nome_cliente', '$numero_pedido', '$data_entrega', '$hora', '$valor', '$endereco_cliente', '$telefone', '$itens_pedido')";

    // Executando a consulta
    if ($conn->query($sql) === TRUE) {
        echo "Novo registro criado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Fechando a conexão
$conn->close();
?>
