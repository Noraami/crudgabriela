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
    <title>Atividades</title>
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
                <h2>Atividades</h2>
                <a href="cadastrar_atividade.php">
                    <input type="button" value="Cadastrar" class="btnturma" id="btncadastrar">
                </a>

            </div>

            <br>

            <div class="">
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include("lista_atividades.php");

                        if (!empty($atividades)) {
                            foreach ($atividades as $linha) {
                                echo '<tr>
                            <td> ' . $linha['pk_atividade'] . ' </td>
                            <td> ' . $linha['descricao'] . ' </td>
                        </tr>
                    ';
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