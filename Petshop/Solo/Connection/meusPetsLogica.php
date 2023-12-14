<?php include_once('ConexaoBanco.php');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    

    
    

   $sqlEsp = "SELECT id_usuario FROM usuario WHERE email = '$email'";
   $resultEsp = $conexao->query($sqlEsp);

   if ($resultEsp && $resultEsp->num_rows>0){
    $rowEsp = $resultEsp->fetch_assoc();
    $id_usuario = $rowEsp['id_usuario'];
   }

    $sql = "SELECT id_perfilpet, nome FROM perfilpet WHERE usuario_id_usuario = $id_usuario";
    $result = $conexao->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['nome'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Nenhum pet encontrado";
    }

} else {
echo "Erro: Nenhum e-mail recebido";
}

// Fechar conexão após o uso
mysqli_close($conexao);
?>