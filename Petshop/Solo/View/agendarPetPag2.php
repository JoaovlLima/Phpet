<?php
session_start();

var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['nomePetId'])){
        $nomePet = $_POST['nomePetId'];
        // Faça o que precisa com $nomePet
        echo "O nome do pet é: " . $nomePet;
    } else {
        echo "O campo nomePetId não foi enviado ou está vazio.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="/Solo/Css/header.css">
    <link rel="stylesheet" href="../View/AgendaPet/agenda.css">
</head>
<body>
    <nav>
        <div class="header1">
          <a  href=""><img id="logo" src="/Solo/Img/Logo.png" alt="Logo"></a>
          <a  href=""><img id="telefone" src="/Solo/Img/telefone.png" alt="Contato"></a>
          <a  href=""><img id="carrinhoCompra" src="/Solo/Img/carrinhoCompra.png" alt="Carrinho de Compra"></a>
          <a  href=""><img id="usuario" src="/Solo/Img/user.png" alt="Usuário"></a>
          <div class="menuHb">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
          </div>
        </div>
        <div class="header2">
        <a href=""><p>Produtos</p></a>
        <a href=""><p>Veterináro</p></a>
        <a href=""><p>Banho</p></a>
        <a href=""><p>Contato</p></a>
        <a href=""><p>Sobre Nós</p></a>
        </div>
    </nav>

<div class="secao" id="secaoSelecaoRealizada">
<div class="areaServico">
        <div id="petSelecionado">
        <div class="meuPetSelec">

<?php
            include_once('../Connection/ConexaoBanco.php');

            // Inicializa a condição da cláusula WHERE
            $whereCondition = '';

            // Verifica se a tag foi enviada via GET e não está vazia

            // Monta a query SQL com base na condição WHERE
            $sql = "SELECT id_perfilpet, nome, img FROM perfilpet WHERE nome = '$nomePet'";
    $result = $conexao->query($sql);

            // Exibe os cards de acordo com os resultados da consulta
            while ($row = $result->fetch_assoc()) {
                echo "<div class='areaPet2'>";
                echo "<div class='imagemPet' id='imagemPet' >";
                echo "<img src='" .$row['img'] . "' alt=''>";
                echo "</div>";
                echo "<div class='imgPet'>";
                ?>
                <h2>Escolha um serviço para</h2>
                <?php echo "<h3>" . $row['nome'] . "</h3>";
                      echo "</div>";
                      echo "</div>";
            
                
            }
        ?>
        
</div>
           <br>
            <hr>
        <h2>Serviços</h2>
        <br>
        <div class="servico" id="consultas" onclick="selecionarServico(this)">Consultas</div>
        <br>
        <div class="servico" id="vacinas" onclick="selecionarServico(this)">Vacinas</div>
           <br>
        <div class="botoes">
        <button id="voltar" class="voltar" onclick="voltar()">Voltar</button>
        <button disabled id="continuar" class="continuar" onclick="prosseguir()" name="continuar">Continuar</button>
        </div>
    </div>
    </div>
    </div>
    <?php

    // Exibe o nome do pet
    echo "O nome do pet é: " . $nomePet;
    ?>

    <div class="secao" id="secaoOutraEtapa" style="display: none;">
        <h1>realizada</h1>
    </div>
<style>
</style>
<script>
    
</script>
</body>
<script src="../View./AgendaPet/agenda.js"></script>
</html>