<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova Postagem - ADS System</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="main-content">
        <header style="margin-bottom: 30px;">
            <h1 id="form-title" style="color: #007bff;">Criar Nova Postagem</h1>
            <p id="form-desc" style="color: #bbb;">Preencha os campos para publicar um novo conteúdo.</p>
        </header>

        <section class="card-form" style="background: #1e1e1e; padding: 20px; border-radius: 8px;">
            <form id="form-postagem">
                <input type="hidden" id="post_index" value="">

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="color: white; display: block; margin-bottom: 5px;">Título da Postagem</label>
                    <input type="text" id="titulo" placeholder="Ex: Tutorial de PHP" required style="width: 100%; padding: 10px; background: #333; border: 1px solid #444; color: white; border-radius: 4px;">
                </div>

                <div class="form-row" style="display: flex; gap: 20px; margin-bottom: 15px;">
                    <div class="form-group" style="flex: 1;">
                        <label style="color: white; display: block; margin-bottom: 5px;">Categoria</label>
                        <select id="categoria" style="width: 100%; padding: 10px; background: #333; border: 1px solid #444; color: white; border-radius: 4px;">
                        </select>
                    </div>
                    <div class="form-group" style="flex: 1;">
                        <label style="color: white; display: block; margin-bottom: 5px;">Status</label>
                        <select id="status" style="width: 100%; padding: 10px; background: #333; border: 1px solid #444; color: white; border-radius: 4px;">
                            <option value="publicado">Publicar agora</option>
                            <option value="rascunho">Salvar como rascunho</option>
                        </select>
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label style="color: white; display: block; margin-bottom: 5px;">Conteúdo</label>
                    <textarea id="conteudo" rows="10" style="width: 100%; padding: 10px; background: #333; border: 1px solid #444; color: white; border-radius: 4px; resize: vertical;"></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn" id="btn-submit">
                        <i class="fa-solid fa-check"></i> Finalizar Postagem
                    </button>
                    <a href="postagens.php" style="margin-left: 15px; color: #bbb; text-decoration: none;">Cancelar</a>
                </div>
            </form>
        </section>
    </main>

   
    <script>
        document.getElementById('ano').textContent = new Date().getFullYear();

        const categorias = JSON.parse(localStorage.getItem('bancoCategoria')) || [];
        const selectCategoria = document.getElementById('categoria');
        categorias.forEach(c => {
            const opt = document.createElement('option');
            opt.value = c.nome;
            opt.textContent = c.nome;
            selectCategoria.appendChild(opt);
        });

        const edit = JSON.parse(sessionStorage.getItem('editPostagem'));

        if (edit) {
            document.getElementById('form-titulo').innerHTML = '<i class="fa-solid fa-pen"></i> Editar Postagem';
            document.getElementById('titulo').value = edit.dados.titulo;
            document.getElementById('conteudo').value = edit.dados.conteudo;
            document.getElementById('categoria').value = edit.dados.categoria;
            document.getElementById('status').value = edit.dados.status;
        }

        document.getElementById('form-postagem').addEventListener('submit', function (e) {
            e.preventDefault();

            const postagem = {
                titulo: document.getElementById('titulo').value,
                conteudo: document.getElementById('conteudo').value,
                categoria: document.getElementById('categoria').value,
                status: document.getElementById('status').value
            };

            const lista = JSON.parse(localStorage.getItem('bancoPostagem')) || [];

            if (edit) {
                lista[edit.index] = postagem;
                sessionStorage.removeItem('editPostagem');
            } else {
                lista.push(postagem);
            }

            localStorage.setItem('bancoPostagem', JSON.stringify(lista));
            window.location.href = 'postagem.html';
        });
    </script>
</body>
</html>