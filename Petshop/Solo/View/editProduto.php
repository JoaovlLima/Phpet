<?php
include_once ('../Connection/verificaEmail.php');
if(!empty($_GET['id_produto']))
{
  include_once('../Connection/ConexaoBanco.php');
  $id_produto = $_GET['id_produto'];

  $sqlSelect = "SELECT * FROM mydb.produto WHERE id_produto = $id_produto" ;
  $result = $conexao->query($sqlSelect);
  print_r($result);
  if($result->num_rows>0){

    while($user_data = mysqli_fetch_assoc($result))
    {
      $id_produto = $user_data['id_produto'];
      $nome = $user_data['nome'];
      $preco = $user_data['preco'];
      $descricao = $user_data['descricao'];
      $img = $user_data['img'];
      $tag = $user_data['tag'];
     
    }

  
  }else{
    echo 'id não encontrado';
  }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Formulário de Cards</title>
</head>
<body>
  <h2>Cadastre seu Produto</h2>
  <form action="../Connection/edicaoProduto.php" method="POST">
    
  <span>ID do Produto: <?php echo $id_produto; ?></span>
<input type="hidden" name="id_produto" value="<?php echo $id_produto; ?>"><br><br>

    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome" value="<?php echo $nome ?>"><br><br>

    <label for="preco">Preço:</label><br>
    <input type="text" id="preco" name="preco" value="<?php echo $preco ?>"><br><br>

    <label for="descricao">Descrição:</label><br>
    <textarea id="descricao" name="descricao" rows="4" cols="50"><?php echo $descricao ?></textarea><br><br>

    <label for="img">Imagem (URL):</label><br>
    <input type="text" id="img" name="img" value="<?php echo $img ?>"><br><br>

    <label for="tag">Tag:</label><br>
    <input type="text" id="tag" name="tag" value="<?php echo $tag ?>"><br><br>

    <input type="submit" value="Atualizar" name="Atualizar">
  </form>
</body>
</html>