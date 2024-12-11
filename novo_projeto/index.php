<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   <style>
    form{
        display: flex;
        flex-direction: column;
        width: 50%;
        margin: auto;

    }
    h1{
        text-align: center;
    }
    a{
        text-decoration: none;
        text-align: center;

    }
   </style>
</head>
<body>
    <h1>
        Registre ou faça login
    </h1>
<form action="registrar.php" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="senha">Senha:</label>
    <input type="password" id="senha" name="senha" required>

    <button type="submit">Registrar</button>
</form>
<a href="login.php"><h2>Se você já possui uma conta, clique aqui para fazer login nela.</h2></a>

</body>
</html>
