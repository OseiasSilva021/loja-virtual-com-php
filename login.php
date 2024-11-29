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




if ($stmt->execute()) {
    echo "Parabéns, seu nome e senha foram armazenados no banco de dados";
}
else{
    echo "deu ruim no banco de dados, mano";
}

$stmt->close();
$conn->close()


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
</head>
<body>


<h1>Seja muito Bem Vindo!</h1>
    <h1>
        Essa é a Página do Usuário
    </h1>
</body>
</html>