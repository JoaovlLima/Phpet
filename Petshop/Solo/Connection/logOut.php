<?php
// Inicie a sessão
session_start();

// Verifique se o botão de logout foi acionado
if (isset($_POST['logout'])) {
    // Remova todas as variáveis de sessão
    session_unset();

    // Destrua a sessão
    session_destroy();

    // Redirecione para a página de login após o logout
    header('Location: ../View/login.php');
    exit();
}
?>