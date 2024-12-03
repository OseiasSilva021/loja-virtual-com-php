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
    <div class="container mt-5">
        <h1 class="text-center">Produtos Cadastrados</h1>
        <div class="row">
            <?php
            
                $sql = "SELECT * FROM produtos";
                $result = $conn->query($sql);
            // Verifica se há produtos no banco
            if ($result->num_rows > 0) {
                // Loop para criar um card para cada produto
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="' . $row["imagem"] . '" class="card-img-top" alt="Imagem do Produto">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["nome"] . '</h5>';
                    echo '<p class="card-text">' . $row["descricao"] . '</p>';
                    echo '<p class="card-text"><strong>Preço:</strong> R$ ' . $row["preco"] . '</p>';
                    echo '<a href="#" class="btn btn-primary">Comprar Agora</a>';
                    echo '</div></div></div>';
                }
            } else {
                echo '<p class="text-center">Nenhum produto disponível no momento.</p>';
            }

            $stmt->close();
            $conn->close();
            ?>
        </div>
    </div>
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>