<?php
if (!empty($_GET['id_perfilpet'])) {
    include_once('ConexaoBanco.php');
    
    // Obtém o ID do produto a ser excluído
    $id_perfilpet = $_GET['id_perfilpet'];
    
    $sqlDelete = "DELETE FROM mydb.perfilpet WHERE id_perfilpet = $id_perfilpet";
    
    // Executa o comando de exclusão
    if ($conexao->query($sqlDelete) === TRUE) {
        echo "Produto excluído com sucesso";
    } else {
        echo "Erro ao excluir o produto: " . $conexao->error;
    }
    
    header('Location: ../View/consultPet.php');
    exit();
} else {
    echo "ID do produto não especificado";
}
?>