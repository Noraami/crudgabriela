<?php
require_once('bd.php');
session_start();
session_destroy();
$_SESSION["nome_professor"] = "";
$_SESSION["professor_id"] = null;
$_SESSION["conectado"] = false;

header("Location: login.php");
?>