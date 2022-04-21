<?php
if (isset($_POST["nome"]) && isset($_POST["idade"])) {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    echo "<h2>Nome: $nome <br/> Idade: $idade</h2>";
}
?>
<form action="index.php">
    <button type="submit">Voltar</button>
</form>