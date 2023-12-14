<?php session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();}

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pets</title>
</head>
<body>
    <h1>Meus Pets</h1>

    <label for="usuario">Usuário: <?php echo $_SESSION['email']; ?></label> <br>
    
<form action="" method="POST">
    <label for="pets">Pets:</label>
    <div class="listaPets">
        <?php include_once('../Connection/meusPetsLogica.php')?>
    </div>
    </form>
    <form action="..//Connection/excluirMeuPet.php" method="POST">
    <input type="text" name="nomePet" value="">
   <input type="submit" name="excluir" value="excluir">
    </form>
    <br><br>
    <!-- Adicione este formulário para realizar o logout -->
<form action="../Connection/logOut.php" method="POST">
    <input type="submit" value="Logout" name="logout">
</form>
<a href="agendarPet.php">Agendar Consulta</a>
</body>
</html>