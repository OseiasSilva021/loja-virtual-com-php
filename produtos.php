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

echo "esses são os dados enviados: <br>
Nome do Produto: $nome <br>
Preço do Produto; $preco <br>
Descrição do Produto: $descricao <br>
Imagem do Produto: $imagem";


?>