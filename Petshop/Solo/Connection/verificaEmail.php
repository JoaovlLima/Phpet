<?php  
session_start();
$funcionario = true;
if (!isset($_SESSION['email'])){
  
  header('location: ../View/home.html');
 }
  
  $email = $_SESSION['email'];

  $dominioFunc = 'phpet.com';
  $partesEmail = explode('@', $email);
  $dominioEmail = end($partesEmail);

  if($dominioEmail !== $dominioFunc){
    $funcionario = false;
    header('location: ../View/home.html');
  }
  $funcionario = true;
?>