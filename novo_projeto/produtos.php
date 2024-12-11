<?php
include 'conexao.php';

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Mensagem de alerta
$mensagem = '';

// Inserção de produtos no banco
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? '';
    $preco = $_POST["preco"] ?? '';
    $descricao = $_POST["descricao"] ?? '';

    if (!is_numeric($preco)) {
        $mensagem = "Preço inválido. Por favor, insira um valor numérico.";
    } else {
        if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] === 0) {
            $imagem = file_get_contents($_FILES["imagem"]["tmp_name"]); // Obter dados binários
            $tipo_imagem = $_FILES["imagem"]["type"];

            // Inserir no banco
            $stmt = $conn->prepare("INSERT INTO produtos (nome, preco, descricao, imagem, tipo_imagem) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sdsss", $nome, $preco, $descricao, $imagem, $tipo_imagem);

            if ($stmt->execute()) {
                $mensagem = "Produto cadastrado com sucesso!";
            } else {
                $mensagem = "Erro ao cadastrar o produto.";
            }
            $stmt->close();
        } else {
            $mensagem = "Erro no upload da imagem.";
        }
    }
}

// Recuperar produtos
$sql = "SELECT id, nome, preco, descricao, imagem, tipo_imagem FROM produtos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .containerdosprodutos {
            margin-top: 50px;
        }
        .card {
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gerenciador de Produtos</h1>

        <!-- Exibição de mensagem de sucesso ou erro -->
        <?php if (!empty($mensagem)): ?>
            <div class="alert alert-info"><?= htmlspecialchars($mensagem) ?></div>
        <?php endif; ?>

        <!-- Formulário de Cadastro -->
        <form action="produtos.php" method="POST" enctype="multipart/form-data" class="mb-5">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" step="0.01" name="preco" id="preco" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem do Produto</label>
                <input type="file" name="imagem" id="imagem" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar Produto</button>
        </form>

        <!-- Exibição dos Produtos -->
        <div class="container containerdosprodutos">
            <div class="row">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $nome = htmlspecialchars($row["nome"]);
                        $preco = htmlspecialchars($row["preco"]);
                        $descricao = htmlspecialchars($row["descricao"]);
                        $imagem = base64_encode($row["imagem"]); // Codifica a imagem em base64
                        $tipo_imagem = htmlspecialchars($row["tipo_imagem"]);
                ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="data:<?= $tipo_imagem ?>;base64,<?= $imagem ?>" class="card-img-top" alt="<?= $nome ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $nome; ?></h5>
                                    <p class="card-text">
                                        <strong>Preço:</strong> R$ <?php echo $preco; ?><br>
                                        <strong>Descrição:</strong> <?php echo $descricao; ?>
                                    </p>
                                    <a href="#" class="btn btn-primary">Comprar Agora</a>
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
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
