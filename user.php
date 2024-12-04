<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bancodedadosdoecommerce";
$conn = new mysqli($servername, $username, $password,
$dbname);       



if ($_SERVER["REQUEST_METHOD"] == "POST") {

$nomedousuario = $_POST["nomedousuario"];
$senhadousuario = $_POST["senhadousuario"];
}

$stmt = $conn->prepare("INSERT INTO usuarios (nome, senha) VALUES (?, ?)");

$stmt->bind_param("ss", $nomedousuario, $senhadousuario);


$sql = "SELECT id, nome, preco, descricao, imagem, tipo_imagem FROM produtos";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


<h1>Seja muito Bem Vindo!</h1>
    <h1>
        Essa é a Página do Usuário
    </h1>
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
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>