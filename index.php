<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    background-color: #fff;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.input-group {
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

.error-message {
    color: red;
    font-size: 14px;
    text-align: center;
    margin-top: 10px;
}

    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" method="POST" action="login.php" >
            <div class="input-group">
                <label for="nomedousuario">Nome de Usuário</label>
                <input type="text" id="nomedousuario" name="nomedousuario" placeholder="Digite seu nome de usuário" required>
            </div>
            <div class="input-group">
                <label for="senhadousuario">Senha</label>
                <input type="password" id="senhadousuario" name="senhadousuario" placeholder="Digite sua senha" required>
            </div>
            <button type="submit">Entrar</button>
            
            <div id="error-message" class="error-message">
                <?php
                if (isset($_SESSION['error_message'])) {
                    echo $_SESSION['error_message'];
                    unset($_SESSION['error_message']);
                }
                ?>
            </div>
        </form>
    </div>

    <script>
        let form = document.getElementById("loginForm")
        form.addEventListener('submit', validateForm)


        function validateForm() {
            let formulario =document.getElementById('loginForm')
            let username = document.getElementById('nomedousuario').value;
            let password = document.getElementById('senhadousuario').value;
            let errorMessage = document.getElementById('error-message');
            
            // Verifica se os campos estão vazios
            
             if(username == "oseias" && password ==  "123"){
                formulario.action = "paginadoadmin.php"
                
            }
            
            else if (username === "" || password === "") {
                errorMessage.textContent = "Por favor, preencha todos os campos!";
                return false;
            }

            // Se os campos estiverem preenchidos corretamente, a validação é bem-sucedida
            errorMessage.textContent = "";
            return true;
        }
        
    </script>
</body>
</html>
