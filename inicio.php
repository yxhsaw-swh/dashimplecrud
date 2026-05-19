<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Gestão</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="main-content">
        <header style="display: flex; justify-content: space-between; align-items: center;">
            <h1 style="color: #007bff;">Tabela de Gestão</h1>
            <a href="gestao.php" class="btn">+ Adicionar Novo</a>
        </header>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome / Título</th>
                    <th>Data</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>Exemplo de Item</td>
                    <td>27/03/2026</td>
                    <td style="color: #00ff00;">Ativo</td>
                    <td>
                        <a href="#" style="color: #007bff; text-decoration: none;"><i class="fa-solid fa-pen"></i> Editar</a>
                    </td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>Outro Registro</td>
                    <td>26/03/2026</td>
                    <td style="color: #00ff00;">Ativo</td>
                    <td>
                        <a href="#" style="color: #007bff; text-decoration: none;"><i class="fa-solid fa-pen"></i> Editar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
     <script>
        document.getElementById('ano').textContent = new Date().getFullYear();
    </script>
</body>
</html>