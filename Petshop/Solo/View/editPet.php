<?php
include_once ('../Connection/verificaEmail.php');
if (!empty($_GET['id_perfilpet'])) {
    include_once('../Connection/ConexaoBanco.php');
    $id_perfilpet = $_GET['id_perfilpet'];

    $sqlSelect = "SELECT * FROM mydb.perfilpet WHERE id_perfilpet = $id_perfilpet";
    $result = $conexao->query($sqlSelect);
    print_r($result);
    if ($result->num_rows > 0) {

        while ($user_data = mysqli_fetch_assoc($result)) {
            $id_perfilpet = $user_data['id_perfilpet'];
            $nome = $user_data['nome'];
            $especie = $user_data['especie'];
            $raca = $user_data['raca'];
            $sexo = $user_data['sexo'];
            $anoNasc = $user_data['ano_nasc'];
            $peso = $user_data['peso'];
            $img = $user_data['img'];
        }
    } else {
        echo 'id não encontrado';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../Connection/editarPet.php" method="POST">
        
        <span> ID Pet: <?php echo $id_perfilpet; ?></span>
        <input type="hidden" name="id_perfilpet" value="<?php echo $id_perfilpet; ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome ?>"><br><br>

        <label for="especie">Espécie:</label>
        <select name="especie" id="especie">
        <option value="<?php echo $especie?>"><?php echo $especie?></option>
            <?php
            include_once('../Connection/ConexaoBanco.php');

            // Consulta para obter as tags do banco de dados
            $sql = "SELECT id_especie, nome FROM especie";
            $result = $conexao->query($sql);

            // Verifica se a consulta foi bem-sucedida
            if ($result && $result->num_rows > 0) {
                // Exibe as opções no datalist
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_especie'] . "'>" . $row['nome'] . "</option>";
                }
            } else {
                echo "<option value=''>Nenhuma tag encontrada.</option>";
            }
            ?>
        </select>
<br><br>
        <label for="raca">Raça:</label>
        <select name="raca" id="raca">
            <option value="<?php echo $raca?>"><?php echo $raca?></option>
        </select>

        <br><br>

        <label for="sexo">Sexo:</label>
        <select name="sexo" id="sexo">
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
        </select> <br><br>

        <label for="ano_nasc">Ano de Nascimento:</label>
        <input type="number" id="anoNasc" name="anoNasc" value="<?php echo $anoNasc ?>" required><br><br>

        <label for="peso">Peso:</label>
        <input type="number" id="peso" name="peso" value="<?php echo $peso ?>" required><br><br>

        <label for="img">Imagem do pet(URL):</label>
        <input type="text" id="img" name="img" value="<?php echo $img ?>" required><br><br>



        <input type="submit" value="Cadastrar" name="Atualizar">
    </form>

    <script>
    document.getElementById("especie").addEventListener("change", function() {
        var especie_id = this.value;
        var racaSelect = document.getElementById("raca");

        // Requisição AJAX para obter as raças correspondentes à espécie selecionada
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "../Connection/getRaca.php?especie_id=" + especie_id, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                racaSelect.innerHTML = xhr.responseText;
                racaSelect.disabled = false;
            } else {
                racaSelect.innerHTML = "<option value=''>Erro ao carregar raças</option>";
            }
        };
        xhr.send();
    });
</script>
</body>

</html>