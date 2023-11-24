
<?php 
require_once "../config/config.php";
$sqlLivros = "SELECT * FROM livros";
$stmtLivros = $pdo->query($sqlLivros);
$livros = $stmtLivros->fetchAll(PDO::FETCH_ASSOC);

foreach ($livros as $livro): ?>
    <div class="sessao">
        <img src="public/assets/livros/<?php echo $livro['imagem']; ?>"><br>
        <span><?php echo $livro['nome_l']; ?></span><br>
        <span>R$<?php echo number_format($livro['preco'], 2, ',', '.'); ?> | Ano <?php echo $livro['ano']; ?> </span>
        <form action="emprestar.php" method="post">
            <input type="hidden" name="livroId" value="<?php echo $livro['id']; ?>">
            <input type="submit" value="Emprestar">
        </form>
    </div>
<?php endforeach; ?>