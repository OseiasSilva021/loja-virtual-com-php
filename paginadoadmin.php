<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bancodedadosdoecommerce";
$conn = new mysqli($servername, $username, $password,
$dbname);       






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        h1, h2{
            text-align: center;
        }
        form{
            width: 72%;
            margin: auto;
            background-color: antiquewhite;
        }
        input, button{
            margin: 1%;
            padding-left: 1%;
            padding-right: 1%;
            font-size: 1.3rem;

        }

        
    </style>
</head>
<body>
    
        <h1>Seja muito Bem Vindo, Admin!</h1>
     <h2>Aqui você terá a oportunidade de cadastrar, editar, visualizar ou deletar produtos de sua loja virtual. Fique à vontade!</h2>

     <form action="produtos.php" method="POST" >
        <input type="text"  name="nome" placeholder="Qual é o nome do Produto?">
        <input type="text" name="descricao" placeholder="Qual é a descrição do Produto?">
        <input type="number" name="preco" placeholder="Qual é o preço do Produto?">
        <input type="file" name="imagem" placeholder="Qual é a imagem do Produto?">
        <button type="submit" id="submit">Enviar</button>
     </form>

       
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>