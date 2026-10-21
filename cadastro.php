<?php
require_once "conexao.php";
$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = trim($_POST["titulo"]);
    $ano = (int)$_POST["ano"];
    $genero = trim($_POST["genero"]);
    $nota = (float)$_POST["nota"];
    $sinopse = trim($_POST["sinopse"]);
    if ($titulo !== "" && $genero !== "") {
        $stmt = $pdo->prepare("INSERT INTO filmes (titulo, ano, genero, nota, sinopse) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$titulo, $ano, $genero, $nota, $sinopse]);
        $mensagem = "Filme cadastrado com sucesso!";
    }
}
$filmes = $pdo->query("SELECT * FROM filmes ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html><html lang="pt-BR"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"><title>Cadastro - CineFlix</title><link rel="stylesheet" href="../css/style.css"></head>
<body><header><h1> CineFlix</h1><nav><a href="../index.html">Home</a><a href="../pages/filmes.html">Filmes</a><a href="../pages/generos.html">Gêneros</a><a class="ativo" href="cadastro.php">Cadastrar</a></nav></header>
<main class="secao"><h2> Cadastrar filme</h2>
<?php if($mensagem): ?><p style="background:#173d25;padding:12px;border-radius:6px;margin-bottom:20px;"><?= htmlspecialchars($mensagem) ?></p><?php endif; ?>
<form method="POST" style="max-width:650px;display:grid;gap:12px">
<input class="busca" name="titulo" placeholder="Nome do filme" required>
<input class="busca" name="ano" type="number" placeholder="Ano" required>
<input class="busca" name="genero" placeholder="Gênero" required>
<input class="busca" name="nota" type="number" step="0.1" min="0" max="10" placeholder="Nota (0 a 10)" required>
<textarea class="busca" name="sinopse" placeholder="Sinopse" rows="5"></textarea>
<button class="botao" type="submit" style="margin:0;width:max-content">Cadastrar filme</button>
</form>
<h2 style="margin-top:45px"> Filmes cadastrados</h2>
<div class="cards">
<?php foreach($filmes as $filme): ?>
<article class="card"><div class="capa"><?= htmlspecialchars($filme["titulo"]) ?></div><h3><?= htmlspecialchars($filme["titulo"]) ?></h3><p><?= htmlspecialchars($filme["genero"]) ?> • <?= $filme["ano"] ?></p><span> <?= number_format($filme["nota"],1) ?></span><p><?= htmlspecialchars($filme["sinopse"]) ?></p><p><a class="botao" style="margin:10px 0 0 16px" href="editar.php?id=<?= $filme["id"] ?>">Editar</a> <a class="botao" style="margin:10px 0 0 5px;background:#555" href="excluir.php?id=<?= $filme["id"] ?>" onclick="return confirm('Excluir este filme?')">Excluir</a></p></article>
<?php endforeach; ?>
</div></main><footer><p>2026 CineFlix - Larah Garcia</p></footer></body></html>