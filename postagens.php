<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Postagens - ADS System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="main-content">
        <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <div>
                <h1 style="color: #007bff;">Gestão de Postagens</h1>
                <p style="color: #bbb;">Administre as publicações e rascunhos do seu blog.</p>
            </div>
            <a href="cad-postagens.php" class="btn" style="background: #007bff; color: white; padding: 10px 20px; border-radius: 4px; text-decoration: none;">+ Nova Postagem</a>
        </header>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th>Data de Publicação</th>
                    <th>Status</th>
                    <th style="text-align: center;">Ações</th>
                </tr>
            </thead>
            <tbody id="tabela-postagens"></tbody>
        </table>
    </main>

    <script>
        const tabela = document.getElementById('tabela-postagens');

        function carregarPostagens() {
            let postagens = JSON.parse(localStorage.getItem('bancoPostagens')) || [];

            if (postagens.length === 0) {
                tabela.innerHTML = `<tr><td colspan="6" style="text-align: center; color: #888; padding: 20px;">Nenhuma postagem cadastrada no LocalStorage.</td></tr>`;
                return;
            }

            tabela.innerHTML = postagens.map((post, index) => {
                const idVisual = String(index + 1).padStart(3, '0');
                const statusColor = post.status === 'publicado' ? '#00ff00' : '#ffc107';
                
                return `
                    <tr>
                        <td>${idVisual}</td>
                        <td><strong>${post.titulo}</strong></td>
                        <td>${post.categoria}</td>
                        <td>${post.data}</td>
                        <td style="color: ${statusColor}; text-transform: capitalize;">${post.status}</td>
                        <td style="text-align: center;">
                            <a href="cad-postagens.php?index=${index}" style="color: #ffc107; margin-right: 15px; text-decoration: none;">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <a href="#" style="color: #ff4444;" onclick="deletarPostagem(${index})">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                `;
            }).join('');
        }

        function deletarPostagem(index) {
            if (confirm("Tem certeza que deseja excluir esta postagem?")) {
                let postagens = JSON.parse(localStorage.getItem('bancoPostagens')) || [];
                postagens.splice(index, 1);
                localStorage.setItem('bancoPostagens', JSON.stringify(postagens));
                carregarPostagens();
            }
        }

        carregarPostagens();
    </script>
</body>
</html>