<?php
include_once('ConexaoBanco.php');

if((isset($_POST['Atualizar'])))
{
    $id_produto=$_POST["id_produto"];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $img = $_POST['img'];
    $tag = $_POST['tag'];
   
   

    $sqlUpdate = "UPDATE mydb.produto SET nome='$nome',preco='$preco',descricao='$descricao',img='$img',tag='$tag'
    WHERE id_produto = '$id_produto'";

if ($conexao->query($sqlUpdate) === TRUE) {
    echo "Registro atualizado com sucesso";
} else {
    echo "Erro ao atualizar o registro: " . $conexao->error;
}

}
header('Location: ../View/consultProd.php')
?>