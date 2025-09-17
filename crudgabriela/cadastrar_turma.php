<?php
session_start();

if (!isset($_SESSION["conectado"]) || $_SESSION["conectado"] != true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de Turma</title>
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

        <div class="cadturma">
            <div class="">
                <h2>Turmas</h2>
                <a href="cadastrar_turma.php">
                    <input type="button" value="Cadastrar" class="btnturma" id="btncadastrar">
                </a>

            </div>
            <br>
            <div class="formcadturma">
                <form action="inserir_turma.php" method="POST">
                    <label>
                        <h2>Criar Turma</h2>
                    </label>
                    <input type="text" name="nomeTurma" class="box" placeholder="Nome da Turma">
                    <br>
                    <input type="submit" value="Inserir" class="btnturma">
                </form>
            </div>
        </div>
    </div>
</body>

</html>