<?php


session_start();

$funcionario = true;
if (!isset($_SESSION['email'])){
    $funcionario = false;
 }
  
  $email = $_SESSION['email'];

  $dominioFunc = 'phpet.com';
  $partesEmail = explode('@', $email);
  $dominioEmail = end($partesEmail);

  if($dominioEmail !== $dominioFunc){
    $funcionario = false;
   
  }
 


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
    <link rel="stylesheet" href="../View./AgendaPet/agenda.css">
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
        <?php
      
        if($funcionario ==true){
        echo "<a href=''>Cadastro Produto</a>";
    }
        ?>
        </div>
    </nav>
<div class="secao" id="secaoMeusPets">
<div class="areaAgenda">
<h1 class="titulo">MEUS PETS</h1>
<h2 class="subtitulo">Qual pet será atendido?</h2>
<br>
<div class="areaPet">
<div class="meuPet">
<form action="agendarPetPag2.php" method="POST" id="formPet" style="display: flex;">
<?php
            include_once('../Connection/ConexaoBanco.php');

            // Inicializa a condição da cláusula WHERE
            $whereCondition = '';

            // Verifica se a tag foi enviada via GET e não está vazia
            if (!isset($_SESSION['email'])) {
                header('Location: login.php');
                exit();}
                else{
                // Obtém a tag selecionada
                $email = $_SESSION['email'];

                // Pegando o id do email logado
                $sqlEsp = "SELECT id_usuario FROM usuario WHERE email = '$email'";
                $resultEsp = $conexao->query($sqlEsp);
             
                if ($resultEsp && $resultEsp->num_rows>0){
                 $rowEsp = $resultEsp->fetch_assoc();
                 $id_usuario = $rowEsp['id_usuario'];
                }
                
                
            }

            // Monta a query SQL com base na condição WHERE
            $sql = "SELECT id_perfilpet, nome, img FROM perfilpet WHERE usuario_id_usuario = $id_usuario";
    $result = $conexao->query($sql);

            // Exibe os cards de acordo com os resultados da consulta
            while ($row = $result->fetch_assoc()) {
                echo "<div class='areaPet' onclick='selecionarPet(this, event)'>";
                echo "<div class='imagemPet' id='imagemPet' >";
                echo "<img src='" .$row['img'] . "' alt=''>";
                echo "</div>";
                echo "<h2>" . $row['nome'] . "</h2>";
                echo "</div>";
            
                
            }
        ?>
        
</div>
<a href="cadPet.php" class="cadastrar">Cadastrar Pet</a>
</div>

<br><br><br>

<input type="hidden" id="nomePetId" name="nomePetId" value="">
<button disabled id="continuar" class="continuar" onclick="prosseguir()" name="continuar">Continuar</button>
</form>
</div>
</div>

<style>
</style>
<script>
    
</script>
</body>
<script src="../View./AgendaPet/agenda.js"></script>
</html>