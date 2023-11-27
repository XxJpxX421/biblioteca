<?php
session_start();
include '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/emprestar.css">
</head>
<body>
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar o empréstimo quando o formulário for enviado
    $livroId = $_POST['livroId']; // Recupera o ID do livro do formulário
    $usuarioId = $_SESSION['id']; // Recupera o ID do usuário da sessão

    // Verificar a última devolução para o mesmo livro pelo mesmo usuário
    $sqlUltimaDevolucao = "SELECT MAX(data_devolucao) AS ultima_devolucao FROM historico WHERE id_usuario = ? AND id_livro = ?";
    
    try {
        $stmtUltimaDevolucao = $pdo->prepare($sqlUltimaDevolucao);
        $stmtUltimaDevolucao->execute([$usuarioId, $livroId]);
        $resultUltimaDevolucao = $stmtUltimaDevolucao->fetch(PDO::FETCH_ASSOC);
    
        // Se não houver última devolução ou a última devolução foi há mais de 1 hora
        if ($resultUltimaDevolucao) {
            // Verificar se o usuário já tem um livro em aberto ou não devolvido
            $sqlVerificar = "SELECT id, status FROM emprestimos WHERE id_usuario = ?";
            
            $stmtVerificar = $pdo->prepare($sqlVerificar);
            $stmtVerificar->execute([$usuarioId]);
            $resultVerificar = $stmtVerificar->fetch(PDO::FETCH_ASSOC);

            if ($resultVerificar) {
                // If there is an open or returned loan, do not allow new loans or updates
                if ($resultVerificar['status'] == 'em aberto'){
                    echo "<p class='mensagem-erro'>Você já tem um empréstimo em aberto. Não é permitido realizar novos empréstimos ou atualizações.</p>";
                    echo '<a href= "index.php" class="link-voltar">Voltar</a>';
                }; 
                if ($resultVerificar['status'] == 'devolvido') {
                    // Atualizar o status do empréstimo existente para 'em aberto' e calcular a data de devolução
                    $idEmprestimoExistente = $resultVerificar['id'];
                    $sqlAtualizarStatus = "UPDATE emprestimos 
                                           SET status = 'em aberto', 
                                               dia_d = DATE_ADD(NOW(), INTERVAL 7 DAY), 
                                               nome = (SELECT nome FROM usuarios WHERE id = ?),
                                               id_livro = ?
                                           WHERE id = ?";
                
                    $stmtAtualizarStatus = $pdo->prepare($sqlAtualizarStatus);
                    $stmtAtualizarStatus->execute([$usuarioId, $_POST['livroId'], $idEmprestimoExistente]);
                
                    // Registrar um novo registro no histórico
                    $sqlHistorico = "INSERT INTO historico (id_usuario, id_livro, status, data_registro, data_devolucao) 
                                     VALUES (?, ?, 'em aberto', NOW(), DATE_ADD(NOW(), INTERVAL 7 DAY))";
                    
                    $stmtHistorico = $pdo->prepare($sqlHistorico);
                    $stmtHistorico->execute([$usuarioId, $_POST['livroId']]); // Update here
                
                    echo "<p class='mensagem-sucesso'>Vc emprestou um livro!</p>";
                    echo '<a href= "index.php" class="link-voltar">Voltar</a>';
                }
                
            } else {
                // Inserir um novo empréstimo na tabela de empréstimos com status 'em aberto' e calcular a data de devolução
                $sqlEmprestar = "INSERT INTO emprestimos (id_usuario, id_livro, status, dia_d, nome) VALUES (?, ?, 'em aberto', DATE_ADD(NOW(), INTERVAL 7 DAY), (SELECT nome FROM usuarios WHERE id = ?))";

                $stmtEmprestar = $pdo->prepare($sqlEmprestar);
                $stmtEmprestar->execute([$usuarioId, $livroId, $usuarioId]);

                // Registrar um novo registro no histórico
                $sqlHistorico = "INSERT INTO historico (id_usuario, id_livro, status, data_registro, data_devolucao) VALUES (?, ?, 'em aberto', NOW(), DATE_ADD(NOW(), INTERVAL 7 DAY))";
                $stmtHistorico = $pdo->prepare($sqlHistorico);
                $stmtHistorico->execute([$usuarioId, $livroId]);

                echo "<p class='mensagem-sucesso'>Novo livro emprestado com sucesso!</p>";
                echo '<a href= "index.php" class="link-voltar">Voltar</a>';
            }
        } 
    } catch (PDOException $e) {
        echo "Erro ao processar o empréstimo: " . $e->getMessage();
    }
}
?>
</body>
</html>