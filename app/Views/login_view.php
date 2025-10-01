<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gaji DPR</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f2f5; }
        .login-box { background: #fff; padding: 40px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); width: 320px; text-align: center; }
        .login-box h2 { margin-bottom: 20px; }
        .login-box input { width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .login-box button { width: 100%; padding: 10px; border: none; background-color: #0d6efd; color: white; border-radius: 4px; cursor: pointer; font-size: 16px; }
        .error { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login Sistem</h2>
        <?php if(session()->getFlashdata('msg')): ?>
            <div class="error"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <form action="<?= base_url('auth/process') ?>" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>