<?php
include_once('../Connection/ConexaoBanco.php');

$sql = "SELECT * FROM produto";
$result = $conexao->query($sql);
/* if (!$result) {
    die("Erro na consulta: " . $conexao->error);
} */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="stylesheet" href="../Css/store.css">
    <link rel="stylesheet" href="../Css/header.css">
</head>
<body>
<!-- Header  -->

<nav>
    <div class="header1">
        <a  href=""><img id="logo" src="../Img/Logo.png" alt="Logo"></a>
        <a  href=""><img id="telefone" src="../Img/telefone.png" alt="Contato"></a>
        <a  href=""><img id="carrinhoCompra" src="../Img/carrinhoCompra.png" alt="Carrinho de Compra"></a>
        <a  href=""><img id="usuario" src="../Img/user.png" alt="Usuário"></a>
        <div class="menuHb">
            <div class="linha1"></div>
            <div class="linha2"></div>
            <div class="linha3"></div>
        </div>
    </div>
    <div class="header2">
        <ul class="navLink">
            <li><a href="#">Produtos</a></li>
            <li><a href="#">Veterinário</a></li>
            <li><a href="#">Banho</a></li>
            <li><a href="#">Contato</a></li>
            <li><a href="#">Sobre Nós</a></li>
            <li id="bg"><a href="#">Carrinho</a></li>
            <li id="bg"><a href="#">Conta</a></li>
        </ul>
    </div>
</nav>


<!-- Site  -->
    <div class="filtro">
        <input type="radio" name="tag" id="racao"  <?php echo (isset($_GET['tag']) && $_GET['tag'] === 'racao') ? 'checked' : ''; ?> onclick="filtrarProdutos('racao')">
        <label for=""><b>Ração</b></label>
        <br>
        <input type="radio" name="tag" id="brinquedos" <?php echo (isset($_GET['tag']) && $_GET['tag'] === 'brinquedos') ? 'checked' : ''; ?> onclick="filtrarProdutos('brinquedos')" >
        <label for=""><b>brinquedos</b></label>
        <br>
        <input type="radio" name="tag" id="acessorios" <?php echo (isset($_GET['tag']) && $_GET['tag'] === 'acessorios') ? 'checked' : ''; ?> onclick="filtrarProdutos('acessorios')">
        <label for=""><b>Acessórios</b></label>   
        <br>
        <input type="radio" name="tag" id="petiscos" <?php echo (isset($_GET['tag']) && $_GET['tag'] === 'petiscos') ? 'checked' : ''; ?> onclick="filtrarProdutos('petiscos')">
        <label for=""><b>Petiscos</b></label>
        <br>
        <input type="radio" name="tag" id="limpeza" <?php echo (isset($_GET['tag']) && $_GET['tag'] === 'limpeza') ? 'checked' : ''; ?> onclick="filtrarProdutos('limpeza')">
        <label for=""><b>limpeza</b></label>
        <br>
        <button type="button" onclick="limparFiltro()">Limpar Filtro</button>
    </div>
    <section class="catalago">
        <h2>Produtos</h2>
        <h6>Resultados Encontrados</h6>
        <div class="produtos" >
        <div class="cards-container">
    <?php
            include_once('../Connection/ConexaoBanco.php');

            // Inicializa a condição da cláusula WHERE
            $whereCondition = '';

            // Verifica se a tag foi enviada via GET e não está vazia
            if (isset($_GET['tag']) && $_GET['tag'] !== '') {
                // Obtém a tag selecionada
                $selectedTag = $_GET['tag'];

                // Cria a condição WHERE com base na tag selecionada
                $whereCondition = "WHERE tag = '$selectedTag'";
            }

            // Monta a query SQL com base na condição WHERE
            $sql = "SELECT * FROM produto $whereCondition";
            $result = $conexao->query($sql);

            // Exibe os cards de acordo com os resultados da consulta
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<img src='" . $row['img'] . "' alt='Imagem do Produto'>";
                echo "<h2>" . $row['nome'] . "</h2>";
                echo "<p>" . $row['descricao'] . "</p>";
                echo "<div class='comprar'>";
                echo "<p>R$ " . $row['preco'] . "</p>";
                echo "<button type='button' id='comprar' name='comprar'>Comprar</button>";
                
                echo "</div>";
                echo "</div>";
            }
        ?>
    </div>

    </div>
    </section>
<style>
     .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin: 10px;
            width: 400px;
            height: 500px;
            float: left;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            display: grid;
            justify-items: center;
            background-color: white;
        }
        .comprar{
            display: flex;
        }
        .comprar button{
            width: 200px;
            height: 50px;
        }
        
        .cards-container {
            display: flex;
            flex-wrap: wrap;
            cursor: pointer;
        }
        
        .filter {
            margin-bottom: 15px;
           
            
        }

        .filter-options {
            display: flex;
            gap: 60px;
        }

        .filter-options label {
            display: inline-block;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            cursor: pointer;
        }
</style>
<script>
    function filtrarProdutos(tag) {
        // Redireciona para a mesma página com o parâmetro 'tag' atualizado
        window.location.href = 'store.php?tag=' + tag;
    }
    function limparFiltro(){
        // Basicamente tirei o parâmetro 'tag' da pagina
   window.location.href = 'store.php';
    }
</script>
 <!-- ------- Footer --------------- -->
<footer>
    <div class="f1">
    <a href=""><img id="instagram" src="../Img/instagram 1.png" alt="Instagram"></a>
    <a href=""><img id="facebook" src="../Img/facebook 1.png" alt="Instagram"></a>
    <a href=""><img id="twitter" src="../Img/twitter 1.png" alt="Instagram"></a>
</div>
<div class="f2">
    <a href=""><p id="sobre">Sobre</p></a>
    <img id="line" src="../Img/Line 2.png" alt="line">
    <a href=""><p id="contato">Contato</p></a>
</div>
    
</footer>
<script src="../Js/navbar.js"></script>
</body>
</html>