<?php
session_start();

if (!isset($_SESSION["conectado"]) || $_SESSION["conectado"] != true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Turmas</title>
</head>

<body class="turma_background">
    <div class="tbox">
        <div class="headerturma">
            <h2 id="h2t">Bem-vindo,
                <?php
                echo $_SESSION["nome_professor"];
                ?>!
            </h2>
            <a href="sair.php">
                <input type="button" value="Sair" event="sair.php" class="btnturma" id="btnsair">
            </a>
        </div>
        <hr>

        <div class="">
            <div class="">
                <h2>Turmas</h2>
                <a href="cadastrar_turma.php">
                    <input type="button" value="cadastrar">
                </a>

            </div>

            <br>
            <br>

            <div class="">
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("listar_turmas.php");
                        if (!empty($turmas)) {
                            foreach ($turmas as $linha) {
                                echo '<tr>
                            <td> ' . $linha['pk_turma'] . ' </td>
                            <td> ' . $linha['nome_turma'] . ' </td>
                            <td> <a href="listar_atividades_turma.php?codigo="' . $linha['pk_turma'] . '"> <input type = "button" value="Atividade" class="btnturma"> </a> </td>
                            <td> <a href="excluir_turma.php?codigo="' . $linha['pk_turma'] . '"> <input type = "button" value="Excluir" class="btnturma"> </a> </td>
                            
                        </tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>