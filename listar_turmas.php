<?php
    include_once("bd.php");
    $resultado = $conn -> query("SELECT * FROM turma");
    if ($resultado && $resultado -> num_rows >0) {
        $listar_turmas = $resultado -> fetch_all(MYSQLI_ASSOC);
    }