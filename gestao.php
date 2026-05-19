<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Registro - Gestão ADS</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <?php include 'menu.php'; ?>

    <main class="main-content">
        <section class="card-form">
            <div class="form-header">
                <h2><i class="fa-solid fa-file-circle-plus"></i> Novo Registro de Gestão</h2>
                <p>Insira as informações para atualizar a tabela do sistema.</p>
            </div>

            <form action="inicio.php" method="POST">
                <div class="form-group">
                    <label for="titulo">Nome / Título do Registro</label>
                    <input type="text" id="titulo" name="titulo" placeholder="Ex: Manutenção de Servidores" required>
                </div>

                <div class="form-row">
                    <div class="form-group flex-1">
                        <label for="data">Data do Registro</label>
                        <input type="date" id="data" name="data" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group flex-1">
                        <label for="status">Status Atual</label>
                        <select id="status" name="status">
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                            <option value="Pendente">Pendente</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="obs">Observações Técnicas</label>
                    <textarea id="obs" name="observacoes" rows="3" placeholder="Detalhes relevantes do registro..."></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-save">
                        <i class="fa-solid fa-check"></i> Salvar Registro
                    </button>
                    <a href="inicio.php" class="btn-cancel" style="margin-left: 15px; color: #bbb; text-decoration: none;">
                        Cancelar
                    </a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>