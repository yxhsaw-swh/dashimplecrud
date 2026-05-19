<!DOCTYPE html>    
<html lang="pt-br">    
<head> 
    <meta charset="UTF-8">   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Categoria - ADS System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="main-content">
        <section class="card-form">
            <div class="form-header">
                <h2 id="form-title"><i class="fa-solid fa-tags"></i> Nova Categoria</h2>
                <p id="form-desc">Crie uma nova etiqueta para organizar suas postagens.</p>
            </div>

            <form id="form-categoria">
                <input type="hidden" id="cat_index" value="">

                <div class="form-group">
                    <label for="nome_cat">Nome da Categoria</label>
                    <input type="text" id="nome_cat" placeholder="Ex: Programação PHP" required>
                </div>

                <div class="form-group">
                    <label for="desc_cat">Descrição Curta</label>
                    <textarea id="desc_cat" rows="4" placeholder="Sobre o que é esta categoria?" style="width: 100%; padding: 12px; background: #333; border: 1px solid #444; color: white; border-radius: 6px; resize: none;"></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-save" id="btn-submit">
                        <i class="fa-solid fa-save"></i> Salvar Categoria
                    </button>
                    <a href="categorias.php" class="btn-cancel" style="margin-left: 15px; color: #bbb; text-decoration: none;">Cancelar</a>
                </div>
            </form>
        </section>
    </main>

    <script>
        document.getElementById('ano').textContent = new Date().getFullYear();

        const edit = JSON.parse(sessionStorage.getItem('editCategoria'));

        if (edit) {
            document.getElementById('form-titulo').innerHTML = '<i class="fa-solid fa-pen"></i> Editar Categoria';
            document.getElementById('titulo').value = edit.dados.nome;
            document.getElementById('status').value = edit.dados.status;
        }

        document.getElementById('form-categoria').addEventListener('submit', function (e) {
            e.preventDefault();

            const categoria = {
                nome: document.getElementById('titulo').value,
                status: document.getElementById('status').value
            };

            const lista = JSON.parse(localStorage.getItem('bancoCategoria')) || [];

            if (edit) {
                lista[edit.index] = categoria;
                sessionStorage.removeItem('editCategoria');
            } else {
                lista.push(categoria);
            }

            localStorage.setItem('bancoCategoria', JSON.stringify(lista));
            window.location.href = 'categorias.html';
        });
    </script>
</body>
</html>