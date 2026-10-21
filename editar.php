<?php
require_once "conexao.php";
$id = (int)($_GET["id"] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM filmes WHERE id = ?");
$stmt->execute([$id]);
$filme = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$filme) die("Filme não encontrado.");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("UPDATE filmes SET titulo=?, ano=?, genero=?, nota=?, sinopse=? WHERE id=?");
    $stmt->execute([trim($_POST["titulo"]), (int)$_POST["ano"], trim($_POST["genero"]), (float)$_POST["nota"], trim($_POST["sinopse"]), $id]);
    header("Location: cadastro.php"); exit;
}
?>
<!DOCTYPE html><html lang="pt-BR"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"><title>Editar - CineFlix</title><link rel="stylesheet" href="../css/style.css"></head>
<body><header><h1> CineFlix</h1></header><main class="secao"><h2> Editar filme</h2>
<form method="POST" style="max-width:650px;display:grid;gap:12px">
<input class="busca" name="titulo" value="<?= htmlspecialchars($filme["titulo"]) ?>" required>
<input class="busca" name="ano" type="number" value="<?= $filme["ano"] ?>" required>
<input class="busca" name="genero" value="<?= htmlspecialchars($filme["genero"]) ?>" required>
<input class="busca" name="nota" type="number" step="0.1" min="0" max="10" value="<?= $filme["nota"] ?>" required>
<textarea class="busca" name="sinopse" rows="5"><?= htmlspecialchars($filme["sinopse"]) ?></textarea>
<button class="botao" type="submit" style="margin:0;width:max-content">Salvar alterações</button>
</form></main></body></html>