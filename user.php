<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bancodedadosdoecommerce";
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['adicionar_carrinho'])) {
    $produto_id = $_POST['produto_id'];
    $usuario_id = $_SESSION['user_id']; // Ajustado para "user_id"

    // Verifica se o produto já está no carrinho
    $stmt = $conn->prepare("SELECT id FROM carrinho WHERE usuario_id = ? AND produto_id = ?");
    $stmt->bind_param("ii", $usuario_id, $produto_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Se já existir, incrementa a quantidade
        $stmt = $conn->prepare("UPDATE carrinho SET quantidade = quantidade + 1 WHERE usuario_id = ? AND produto_id = ?");
        $stmt->bind_param("ii", $usuario_id, $produto_id);
    } else {
        // Caso contrário, adiciona o produto ao carrinho
        $stmt = $conn->prepare("INSERT INTO carrinho (usuario_id, produto_id, quantidade) VALUES (?, ?, 1)");
        $stmt->bind_param("ii", $usuario_id, $produto_id);
    }
    $stmt->execute();
}

// Recuperar os produtos do banco de dados
$sql = "SELECT id, nome, preco, descricao, imagem, tipo_imagem FROM produtos";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css\style.css">

    <style>
        .titulodeboasvindas{
            text-align: center;
        }
        #deslogar{
            background-color: rgb(72, 165, 215);
            width: 13%;
            margin: auto;
            border: solid 1px black;
            border-radius: 3px;
        }
    </style>
</head>
<body>


<header>
    <nav>
        <h3>E-COMMERCE COM PHP</h3>
        <!-- Exibe a quantidade de itens no carrinho -->
        <a href="carrinho.php"><h3 id="carrinho">Carrinho</h3></a>
    </nav>
</header>
<h1 class="titulodeboasvindas">Bem-vindo, <?= htmlspecialchars($_SESSION['user_nome']); ?>!</h1>
<h3 class="titulodeboasvindas" id="deslogar">
<a href="logout.php">Sair da conta</a>
</h3>

<div class="container containerdosprodutos">
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = htmlspecialchars($row["id"]);
                $nome = htmlspecialchars($row["nome"]);
                $preco = htmlspecialchars($row["preco"]);
                $descricao = htmlspecialchars($row["descricao"]);
                $imagem = base64_encode($row["imagem"]);
                $tipo_imagem = htmlspecialchars($row["tipo_imagem"]);
        ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="data:<?= $tipo_imagem ?>;base64,<?= $imagem ?>" class="card-img-top" alt="<?= $nome ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $nome ?></h5>
                        <p class="card-text">
                            <strong>Preço:</strong> R$ <?= $preco ?><br>
                            <strong>Descrição:</strong> <?= $descricao ?>
                        </p>
                        <!-- Formulário para adicionar ao carrinho -->
                        <form method="POST">
                            <input type="hidden" name="produto_id" value="<?= $id ?>">
                            <button type="submit" name="adicionar_carrinho" class="btn btn-primary">Comprar Agora</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
            }
        } else {
            echo "<p class='text-center'>Nenhum produto cadastrado.</p>";
        }
        $conn->close();
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
