<?php
include_once("bd.php");
$sql = "SELECT * FROM turma";
$resultado = $conn->query($sql);
if ($resultado && $resultado->num_rows >= 1) {
    $turmas = $resultado->fetch_all(MYSQLI_ASSOC);
} else {
    echo "<div> Não há turmas cadastradas! </div>";
}

$resultado->free();
$conn->close();
