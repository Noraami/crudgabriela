<?php
require "bd.php";
header("Cache-control: no-store, no-chache, must-revalidate, max-age=0");
header("Pragma: no-cache");
session_start();

// Se já estiver logado, vai direto para a turma
if (isset($_SESSION["nome_professor"])) {
    header("Location: turma.php");
    exit;
}

$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"] ?? "");
    $senha = trim($_POST["senha"] ?? "");

    $stmt = $conn->prepare("SELECT pk_professor, nome_professor, senha_professor FROM professor WHERE email_professor = ? AND senha_professor = ?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $dados = $resultado->fetch_assoc();
        $_SESSION["nome_professor"] = $dados["nome_professor"];
        $_SESSION["professor_id"] = $dados["pk_professor"];
        $_SESSION["conectado"] = true;
        header("Location: turma.php");
        exit;
    } else {
        $erro = "E-mail ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body class="background">
    <div class="container">
        <div class="log">
            <h2>Login - PROFESSOR</h2>
            <form method="post" autocomplete="off">
                <input type="email" id="email" name="email" placeholder="Email" class="box" autocomplete="off" required><br><br>
                <input type="password" id="senha" name="senha" placeholder="Senha" class="box" autocomplete="new-password" required><br><br>
                <button type="submit" name="login" class="btn">Entrar</button>
                <?php if ($erro): ?>
                    <div class="erro"><?= htmlspecialchars($erro) ?></div>
                <?php endif; ?>
            </form>
        </div>
    </div>
    <script>
        const $bg = document.querySelector(".background");
        const mouseScale = 0.15;

        // Set initial size
        $bg.style.setProperty("--size", "200%");

        $bg.addEventListener("mousemove", e => {
            const rect = $bg.getBoundingClientRect();
            const x = ((e.clientX - rect.left) / rect.width * 100 - 50);
            const y = ((e.clientY - rect.top) / rect.height * 100 - 50);

            $bg.style.setProperty("--mouseX", `${(x * mouseScale).toFixed(2)}%`);
            $bg.style.setProperty("--mouseY", `${(y * mouseScale).toFixed(2)}%`);

        });

        $bg.addEventListener("mouseleave", () => {
            // Reset to default position when mouse leaves
            $bg.style.setProperty("--mouseX", "0%");
            $bg.style.setProperty("--mouseY", "0%");
            $bg.style.setProperty("--size", "200%");
        });
    </script>
</body>

</html>