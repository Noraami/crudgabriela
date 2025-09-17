<?php
require_once('bd.php');

session_start();

$nome = $_POST['nomeTurma'] ?? '';

$stmt = $conn->prepare("INSERT INTO turma (nome_turma, fk_professor) VALUES (?, ?)");
$stmt->bind_param("si", $nome, $_SESSION['professor_id']);

if ($stmt->execute()) {
    header("Location: turma.php");
    exit;
} else {
    echo "Erro ao inserir: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>