<?php


if(isset($_POST['submit'])) {
    include_once("ConexaoBanco.php");

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $img = $_POST['img'];
    $tag = $_POST['tag'];
    
    var_dump($_POST);

    $sql = "SELECT * FROM produto WHERE nome = '$nome'";
    $result = $conexao->query($sql);

    if(mysqli_num_rows($result) < 1) {
      
            $sqlInsert = "INSERT INTO produto (nome, preco, descricao, img, tag) 
              VALUES ('$nome', '$preco', '$descricao', '$img', '$tag')";
            $resultInsert = mysqli_query($conexao, $sqlInsert);

            if($resultInsert) {
                echo "Produto registrado com sucesso";
            } else {
                echo "Erro ao registrar: " . mysqli_error($conexao);
            }
       
    } else {
        echo "Produto já registrado";
    }

    // Fechar conexão após o uso
    mysqli_close($conexao);
} else {
    echo "Erro";
}
?>