<?php
declare(strict_types=1);
require_once __DIR__ . '/config/auth.php';
if (is_logged_in()) redirect('/area-aluno/dashboard/');

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    check_csrf();
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'] ?? '';
    if (!$email || $senha === '') {
        $error = 'Informe seu e-mail e senha.';
    } else {
        $stmt = db()->prepare('SELECT * FROM usuarios WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($senha, $user['senha'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            redirect('/area-aluno/dashboard/');
        }
        $error = 'E-mail ou senha inválidos.';
    }
}
?>
<!doctype html>
<html lang="pt-BR" data-theme="system">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Entrar — Área do Aluno</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/area-aluno/css/style.css">
</head>
<body class="auth-page">
<div class="auth-card">
    <div class="brand auth-brand"><span class="brand-mark">A</span><span>Área do Aluno</span></div>
    <div class="auth-heading"><h1>Bem-vindo de volta.</h1><p>Entre para acompanhar sua rotina escolar.</p></div>
    <?php if ($error): ?><div class="flash error"><?= e($error) ?></div><?php endif; ?>
    <form method="post" class="form">
        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
        <label>E-mail<input type="email" name="email" autocomplete="email" required placeholder="voce@escola.com"></label>
        <label>Senha<input type="password" name="senha" autocomplete="current-password" required placeholder="••••••••"></label>
        <button class="btn primary full" type="submit">Entrar</button>
    </form>
    <p class="auth-note">Acesso de demonstração: <strong>joao@escola.local</strong> / <strong>123456</strong></p>
</div>
<script>
(() => {
 const t = localStorage.getItem('areaAlunoTheme') || 'system';
 document.documentElement.dataset.theme = t;
})();
</script>
</body></html>
