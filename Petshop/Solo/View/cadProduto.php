<?php  
include_once ('../Connection/verificaEmail.php');

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Formulário de Cards</title>
</head>
<body>
  <h2>Cadastre seu Produto</h2>
  <form action="../Connection/logicaCadProduto.php" method="POST" >
    <label for="nome">Nome:</label><br>
    <input type="text" id="nome" name="nome"><br><br>

    <label for="preco">Preço:</label><br>
    <input type="number" id="preco" name="preco"><br><br>

    <label for="descricao">Descrição:</label><br>
    <textarea id="descricao" name="descricao" rows="4" cols="50"></textarea><br><br>

    <label for="img">Imagem (URL):</label><br>
    <input type="text" id="img" name="img"><br><br>

    <label for="tag">Tag:</label> <br>
    <select name="tag" id="tag">
      
    <?php
        include_once('../Connection/ConexaoBanco.php');

        // Consulta para obter as tags do banco de dados
        $sql = "SELECT nome FROM tag";
        $result = $conexao->query($sql);

        // Verifica se a consulta foi bem-sucedida
        if ($result && $result->num_rows > 0) {
            // Exibe as opções no datalist
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['nome'] . "'>". $row['nome'] . "</option>";
            }
        } else {
            echo "<option value=''>Nenhuma tag encontrada.</option>";
        }
        ?> 
    </select>

    <input type="submit" value="Enviar" name="submit">
    
  </form>
  

</body>
</html>