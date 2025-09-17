<?php
    require_once("bd.php");

   $codigo = $_GET['codigo'];

   $stmt = $conn->prepare("DELETE FROM turma WHERE pk_turma = ?");
   $stmt->bind_param("i", $codigo);

   if($stmt->execute()) {
       header("Location: turma.php");
       exit;
   } else {
       echo "Erro ao excluir a turma: " . $stmt->error;
   }
    $stmt->close();
    $conn->close();
?>