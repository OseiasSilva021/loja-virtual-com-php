<?php
session_start(); // Inicia ou retoma a sessão

require_once 'conexao.php'; // Conexão com o banco

// Função para autenticar o usuário
function autenticarUsuario($email, $senha) {
    global $conn;

    // Consulta para encontrar o usuário pelo email
    $sql = "SELECT id, nome, senha FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        
        // Verifica se a senha é válida
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            return true;
        }
    }
    return false;
}

// Função para verificar se o usuário está logado
function usuarioLogado() {
    return isset($_SESSION['usuario_id']);
}

// Função para garantir que o usuário está logado
function verificarLogin() {
    if (!usuarioLogado()) {
        header("Location: login.php"); // Redireciona para login.php
        exit;
    }
}

// Função para fazer logout
function logout() {
    session_unset();
    session_destroy();
    header("Location: login.php"); // Redireciona para login.php
    exit;
}
?>
