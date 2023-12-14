<?php
session_start();
 print_r([$_REQUEST]); 

if(isset($_POST['submit'])&& !empty($_POST['email'])&&!empty($_POST['senha'])){
include_once('./Connection/ConexaoBanco.php');

$emailLog = $_POST['email'];
$senhaLog = $_POST['senha'];

$sql = "SELECT * FROM usuario WHERE email = '$emailLog' and senha = '$senhaLog'";
$result = $conexao->query($sql);
if(mysqli_num_rows($result)<1){
   unset($_SESSION['email']);
   unset($_SESSION['senha']); 

   $emailExiste = false;
   header('Location: register.html');
}else{
    $_SESSION['email'] = $emailLog;
    $_SESSION['senha'] = $senhaLog;


}


}else{
    
}

/* if(isset($_POST['submit'])){
$email = $_POST["email"];
$iniciais = '';
if (empty($email)) {
    $iniciais = "USU";
} else {
    // Obtém as duas primeiras letras do email
    $iniciais = substr($email, 0, 2);
}
} */
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="../Css/login.css">
    <link rel="stylesheet" href="../Css/header.css">
</head>
<body>
   <!-- HEADER -->

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
    <section class="login">
        <form class="form" action="../Connection/loginLogica.php" method="POST">
            <h2>LOGIN</h2>
     <label for="">E-mail*</label><br>
     <input type="email" name="email"><br>
     <label for="">Senha*</label><br>
     <input type="password" name="senha" id=""><br>
     <button type="submit" name="submit">Entrar</button>
        </form>
    </section>
    <div class="img">
        <img src="../Img/login.png" alt="">
    </div>
    <script src="../Js/navbar.js"></script>
</body>
</html>