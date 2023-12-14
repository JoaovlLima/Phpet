<?php
include_once('ConexaoBanco.php');

if((isset($_POST['Atualizar'])))
{
    $id_perfilpet = $_POST['id_perfilpet'];
    $nome = $_POST['nome'];
    $especie_id = $_POST['especie'];
    $raca_id = $_POST['raca'];
    $sexo = $_POST['sexo'];
    $anoNasc = $_POST['anoNasc'];
    $img = $_POST['img'];
    $peso = $_POST['peso'];
   
   // Consulta ao banco de dados para obter o nome da espécie com base no ID recebido
   $sqlEsp = "SELECT nome FROM especie WHERE id_especie = $especie_id";
   $resultEsp = $conexao->query($sqlEsp);

   if ($resultEsp && $resultEsp->num_rows > 0) {
       $rowEsp = $resultEsp->fetch_assoc();
       $nome_especie = $rowEsp['nome']; // Nome da espécie correspondente ao ID
   }
      
   // Consulta ao banco de dados para obter o nome da raca com base no ID recebido
   $sqlEsp = "SELECT nome FROM raca WHERE id_raca = $raca_id";
   $resultEsp = $conexao->query($sqlEsp);

   if ($resultEsp && $resultEsp->num_rows > 0) {
       $rowEsp = $resultEsp->fetch_assoc();
       $nome_raca = $rowEsp['nome']; // Nome da raca correspondente ao ID
   }

    $sqlUpdate = "UPDATE mydb.perfilpet SET nome='$nome',especie='$nome_especie',raca='$nome_raca',sexo='$sexo',ano_nasc='$anoNasc',img='$img',peso='$peso'
    WHERE id_perfilpet = '$id_perfilpet'";

if ($conexao->query($sqlUpdate) === TRUE) {
    echo "Registro atualizado com sucesso";
} else {
    echo "Erro ao atualizar o registro: " . $conexao->error;
}

}
header('Location: ../View/consultPet.php')
?>