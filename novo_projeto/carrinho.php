<?php
include 'conexao.php';
session_start();

$user_id = $_SESSION['user_id'];

// Recupera os produtos no carrinho do usuário
$stmt = $conn->prepare("
    SELECT c.id AS carrinho_id, p.nome, p.preco, c.quantidade, p.imagem, p.tipo_imagem
    FROM carrinho c
    INNER JOIN produtos p ON c.produto_id = p.id
    WHERE c.usuario_id = ?
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Inicializa o total
$total = 0;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho</title>
</head>
<body>
<h1>Seu Carrinho</h1>
<a href="user.php">Volte para a página do usuário</a>
<?php if ($result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>
        <?php
        // Calcula o subtotal de cada produto e adiciona ao total
        $subtotal = $row['preco'] * $row['quantidade'];
        $total += $subtotal;
        ?>
        <div>
            <h3><?= htmlspecialchars($row['nome']) ?></h3>
            <p>Preço: R$ <?= number_format($row['preco'], 2, ',', '.') ?></p>
            <p>Quantidade: <?= $row['quantidade'] ?></p>
            <p>Subtotal: R$ <?= number_format($subtotal, 2, ',', '.') ?></p>
            <form method="POST" action="remover_carrinho.php">
                <input type="hidden" name="carrinho_id" value="<?= $row['carrinho_id'] ?>">
                <button type="submit">Remover</button>
            </form>
        </div>
    <?php endwhile; ?>
    <h2>Total: R$ <?= number_format($total, 2, ',', '.') ?></h2>
<?php else: ?>
    <p>Seu carrinho está vazio.</p>
<?php endif; ?>
</body>
</html>
