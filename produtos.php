<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bancodedadosdoecommerce";

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Inserção de produtos no banco
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"] ?? '';
    $preco = $_POST["preco"] ?? '';
    $descricao = $_POST["descricao"] ?? '';
    $imagem = $_POST["imagem"] ?? '';

    if (!empty($nome) && !empty($preco) && !empty($descricao) && !empty($imagem)) {
        $stmt = $conn->prepare("INSERT INTO produtos (nome, preco, descricao, imagem) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $preco, $descricao, $imagem);

        if ($stmt->execute()) {
            echo "<script>alert('Produto inserido com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao inserir produto.');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Por favor, preencha todos os campos!');</script>";
    }
}

// Consulta para exibir os produtos
$sql = "SELECT * FROM produtos";
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

        <!-- Formulário de Cadastro -->
        <form method="POST" class="mb-5">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Produto</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="text" name="preco" id="preco" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="imagem" class="form-label">URL da Imagem</label>
                <input type="text" name="imagem" id="imagem" class="form-control" required>
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
                        $imagem = htmlspecialchars($row["imagem"]);
                ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?php echo $imagem; ?>" class="card-img-top" alt="<?php echo $nome; ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $nome; ?></h5>
                                    <p class="card-text">
                                        <strong>Preço:</strong> R$ <?php echo $preco; ?> <br>
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
