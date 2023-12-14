<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['excluir'])) {
    include_once("ConexaoBanco.php");
    $email = $_SESSION['email'];

    // Recupere o ID do pet a ser excluído do campo oculto enviado via formulário
    $nomePet = $_POST['nomePet'];

    // Obtenha o ID do usuário
    $sqlEsp = "SELECT id_usuario FROM usuario WHERE email = '$email'";
    $resultEsp = $conexao->query($sqlEsp);

    if ($resultEsp && $resultEsp->num_rows > 0) {
        $rowEsp = $resultEsp->fetch_assoc();
        $id_usuario = $rowEsp['id_usuario'];

        // Delete o pet associado ao usuário com o ID correspondente
        $sqlDelete = "DELETE FROM mydb.perfilpet WHERE usuario_id_usuario = $id_usuario AND nome = '$nomePet'";
        $resultDelete = $conexao->query($sqlDelete);

        if ($resultDelete) {
            // A exclusão foi bem-sucedida
            echo "Pet excluído com sucesso!";
        } else {
            // Ocorreu um erro ao excluir o pet
            echo "Erro ao excluir o pet.";
        }
    }
    header('location: ..//View/meusPets.php');
}
?>