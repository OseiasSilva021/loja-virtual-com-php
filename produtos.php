<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bancodedadosdoecommerce";
$conn = new mysqli($servername, $username, $password,
$dbname);       


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];
    $imagem = $_POST["imagem"];

}

$stmt = $conn->prepare("INSERT INTO produtos (nome, preco, descricao, imagem) VALUES (?, ?, ?, ?)");

$stmt->bind_param("ssss", $nome, $preco, $descricao, $imagem);


if ($stmt->execute()) {
    echo "Parabéns, o nome, o preço, a descrição e a imagem do produto está salvo no banco de dados!";
}
else{
    echo "deu ruim no banco de dados, mano";
}

$stmt->close();
$conn->close()
?>