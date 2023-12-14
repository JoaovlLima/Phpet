<?php
session_start();
 print_r([$_REQUEST]);

if(isset($_POST['submit'])&& !empty($_POST['email'])&&!empty($_POST['senha'])){
include_once('ConexaoBanco.php');

$emailLog = $_POST['email'];
$senhaLog = $_POST['senha'];

$sql = "SELECT * FROM usuario WHERE email = '$emailLog' and senha = '$senhaLog'";
$result = $conexao->query($sql);
if(mysqli_num_rows($result)<1){
   unset($_SESSION['email']);
   unset($_SESSION['senha']); 

   $emailExiste = false;
   header('Location: ../View/register.html');
}else{
    $_SESSION['email'] = $emailLog;
    $_SESSION['senha'] = $senhaLog;
header('Location: ../View/home.html');

}


}else{
    header('Location: ../View/home.html');
}

?>