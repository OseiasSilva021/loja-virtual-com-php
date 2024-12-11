<?php
include 'conexao.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $carrinho_id = $_POST['carrinho_id'];
    $stmt = $conn->prepare("DELETE FROM carrinho WHERE id = ?");
    $stmt->bind_param("i", $carrinho_id);
    if ($stmt->execute()) {
        header("Location: carrinho.php");
        exit();
    } else {
        echo "Erro ao remover o produto.";
    }
}
?>
