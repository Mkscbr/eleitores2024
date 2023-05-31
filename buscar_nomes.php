<?php

include('config.php');


// Verificar se o parâmetro do nome foi enviado via requisição GET
if (isset($_GET['nome'])) {
    $nome = $_GET['nome'];
    
    // Realizar a busca no banco de dados
    $sql = "SELECT nome FROM pessoa WHERE nome LIKE '%$nome%'";
    $result = $conn->query($sql);
    
    $nomesSugeridos = array();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nomesSugeridos[] = $row['nome'];
        }
    }
    
    // Retornar a lista de nomes sugeridos em formato JSON
    header('Content-Type: application/json');
    echo json_encode($nomesSugeridos);
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
