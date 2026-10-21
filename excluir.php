<?php
require_once "conexao.php";
$id = (int)($_GET["id"] ?? 0);
$stmt = $pdo->prepare("DELETE FROM filmes WHERE id = ?");
$stmt->execute([$id]);
header("Location: cadastro.php"); exit;
?>