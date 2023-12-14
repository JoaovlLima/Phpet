<?php
if (!empty($_GET['id_produto'])) {
    include_once('ConexaoBanco.php');
    
    // Obtém o ID do produto a ser excluído
    $id_produto = $_GET['id_produto'];
    
    $sqlDelete = "DELETE FROM mydb.produto WHERE id_produto = $id_produto";
    
    // Executa o comando de exclusão
    if ($conexao->query($sqlDelete) === TRUE) {
        echo "Produto excluído com sucesso";
    } else {
        echo "Erro ao excluir o produto: " . $conexao->error;
    }
    
    header('Location: ../View/consultProd.php');
    exit();
} else {
    echo "ID do produto não especificado";
}
?>