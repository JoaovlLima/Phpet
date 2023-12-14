<?php include_once('ConexaoBanco.php');

if (isset($_GET['especie_id'])) {
    $especie_id = $_GET['especie_id'];

    $sql = "SELECT id_raca, nome FROM raca WHERE especie_id_especie = $especie_id";
    $result = $conexao->query($sql);

    if ($result && $result->num_rows > 0) {
        $options = "<option value=''>Selecione a raça</option>";
        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='" . $row['id_raca'] . "'>" . $row['nome'] . "</option>";
        }
        echo $options;
    } else {
        echo "<option value=''>Nenhuma raça encontrada</option>";
    }
} else {
    echo "<option value=''>Erro: Nenhum ID de espécie recebido</option>";
}

// Fechar conexão após o uso
mysqli_close($conexao);
?>