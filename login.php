<!DOCTYPE html>
<html lang="pt-br"> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <link rel="stylesheet" href="style.css">
    <title>Login - Painel do Blog</title>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <i class="fa-solid fa-newspaper logo-icon"></i>
                <h2>Painel do Blog</h2>
            </div>

            <form action="valida_login.php" method="POST">
                <?php if (isset($_GET['erro'])): ?>
                    <p style="color: #ff4444; font-size: 0.9rem; margin-bottom: 15px; text-align: center;">
                    </p>
                <?php endif; ?>

                <div class="form-group">
                    <input type="email" name="email" placeholder="E-mail" required>
                </div>

                <div class="form-group">
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>

                <button type="submit" class="btn-login">Acessar Painel</button>
            </form>
        </div>
    </div>
    
</body>
</html>