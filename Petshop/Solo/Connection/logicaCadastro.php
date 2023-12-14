<?php
$senhasDiferente = false;

if(isset($_POST['submit'])) {
    include_once("ConexaoBanco.php");

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['confSenha'];

    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $result = $conexao->query($sql);

    if(mysqli_num_rows($result) < 1) {
        if($senha == $confSenha) {
            $senhasDiferente = false;

            $sqlInsert = "INSERT INTO usuario (nome, idade, cpf, telefone, email, senha) 
              VALUES ('$nome', '$idade', '$cpf', '$telefone', '$email', '$senha')";
            $resultInsert = mysqli_query($conexao, $sqlInsert);

            if($resultInsert) {
                echo "Registrado com sucesso";
            } else {
                echo "Erro ao registrar: " . mysqli_error($conexao);
            }
        } else {
            $senhasDiferente = true;
        }
    } else {
        echo "Email já registrado";
    }

    // Fechar conexão após o uso
    mysqli_close($conexao);
} else {
    echo "Erro";
}
?>