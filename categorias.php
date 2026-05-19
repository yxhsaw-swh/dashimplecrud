<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Categorias - ADS System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="sidebar">
        <h2>Menu</h2>
        <a href="inicio.php"><i class="fa-solid fa-house"></i> Início</a>
        <a href="categorias.php"><i class="fa-solid fa-tags"></i> Categorias</a>
        <a href="postagens.php"><i class="fa-solid fa-pen-to-square"></i> Postagens</a>
        <a href="usuarios.php"><i class="fa-solid fa-users"></i> Usuários</a>
        <br>
        <a href="login.php" style="color: #ff4444;"><i class="fa-solid fa-right-from-bracket"></i> Sair</a>
    </nav>

    <main class="main-content">
        <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <div>
                <h1 style="color: #007bff;">Gestão de Categorias</h1>
                <p style="color: #bbb;">Gerencie as etiquetas e tópicos do sistema.</p>
            </div>
            <a href="cad-categoria.php" class="btn" style="display: flex; align-items: center; gap: 8px; text-decoration: none;">
                <i class="fa-solid fa-plus"></i> Nova Categoria
            </a>
        </header>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome da Categoria</th>
                    <th>Descrição</th>
                    <th>Qtd. Postagens</th>
                    <th style="text-align: center;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td><strong>Programação Python</strong></td>
                    <td>Lógica, scripts e automação com a linguagem Python.</td>
                    <td>12</td>
                    <td style="text-align: center;">
                        <a href="#" style="color: #ffc107; margin-right: 10px;"><i class="fa-solid fa-pen"></i></a>
                        <a href="#" style="color: #ff4444;"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td><strong>Banco de Dados</strong></td>
                    <td>Consultas SQL e modelagem de dados</td>
                    <td>08</td>
                    <td style="text-align: center;">
                        <a href="#" style="color: #ffc107; margin-right: 10px;"><i class="fa-solid fa-pen"></i></a>
                        <a href="#" style="color: #ff4444;"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                 <td>002</td>
                    <td><strong> Mundo Retrô</strong></td>
                    <td>Estética Y2K, fotografia anos 90 e tendências vintage.</td>
                    <td>015</td>
                    <td style="text-align: center;">
                        <a href="#" style="color: #ffc107; margin-right: 10px;"><i class="fa-solid fa-pen"></i></a>
                        <a href="#" style="color: #ff4444;"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
            </tbody>

        </table>
    </main>
       <script>
        document.getElementById('ano').textContent = new Date().getFullYear();

        function renderCategorias() {
            const lista = JSON.parse(localStorage.getItem('bancoCategoria')) || [];
            const tbody = document.getElementById('corpo-tabela');

            if (lista.length === 0) {
                tbody.innerHTML = '<tr><td colspan="4" align="center">Nenhuma categoria cadastrada.</td></tr>';
                document.getElementById('info-registros').textContent = 'Total: 0 registro(s)';
                return;
            }

            tbody.innerHTML = lista.map((c, i) => {
                const statusLabel = c.status == 1 ? 'Ativo' : 'Inativo';
                const statusClass = c.status == 1 ? 'ativo' : 'inativo';
                return `
                    <tr>
                        <td>${String(i + 1).padStart(2, '0')}</td>
                        <td>${c.nome}</td>
                        <td><span class="badge ${statusClass}">${statusLabel}</span></td>
                        <td>
                            <button class="btn-icon" onclick="editar(${i})"><i class="fa-solid fa-pen"></i></button>
                            <button class="btn-icon" onclick="excluir(${i})"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                `;
            }).join('');

            document.getElementById('info-registros').textContent = `Total: ${lista.length} registro(s)`;
        }

        function editar(index) {
            const lista = JSON.parse(localStorage.getItem('bancoCategoria')) || [];
            sessionStorage.setItem('editCategoria', JSON.stringify({ index, dados: lista[index] }));
            window.location.href = 'cad-categoria.html';
        }

        function excluir(index) {
            if (!confirm('Deseja excluir esta categoria?')) return;
            const lista = JSON.parse(localStorage.getItem('bancoCategoria')) || [];
            lista.splice(index, 1);
            localStorage.setItem('bancoCategoria', JSON.stringify(lista));
            renderCategorias();
        }

        renderCategorias();
    </script>
</body>
</html>