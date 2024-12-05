<?php 
session_start();  // Iniciar a sessão para pegar o ID do usuário
$usuario_id = $_SESSION['usuario_id'];  // Usar o ID do usuário da sessão
$produto_id = $_POST['produto_id'];  // ID do produto enviado pelo formulário

// Verifique se o produto já foi adicionado ao carrinho do usuário
$sql_check = "SELECT * FROM carrinho WHERE usuario_id = ? AND produto_id = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("ii", $usuario_id, $produto_id);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    // Produto já está no carrinho, atualize a quantidade
    $sql_update = "UPDATE carrinho SET quantidade = quantidade + 1 WHERE usuario_id = ? AND produto_id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ii", $usuario_id, $produto_id);
    $stmt_update->execute();
} else {
    // Produto não está no carrinho, insira um novo item
    $sql_insert = "INSERT INTO carrinho (usuario_id, produto_id, quantidade) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("iii", $usuario_id, $produto_id, 1);  // Defina a quantidade como 1
    $stmt_insert->execute();
}


?>