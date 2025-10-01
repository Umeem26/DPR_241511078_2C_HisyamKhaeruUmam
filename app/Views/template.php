<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Sistem Gaji DPR') ?></title>
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f4f4f4; }
        .navbar { background: #333; color: #fff; padding: 1rem; display: flex; justify-content: space-between; align-items: center; }
        .navbar a { color: #fff; text-decoration: none; padding: 0 1rem; }
        .container { max-width: 1000px; margin: 2rem auto; padding: 2rem; background: #fff; border-radius: 8px; }
    </style>
</head>
<body>
    <nav class="navbar">
        <div>
            <a href="<?= base_url('/dashboard') ?>">Dashboard</a>
            <a href="<?= base_url('/anggota') ?>">Data Anggota</a>
        </div>
        <div>
            <a href="<?= base_url('/logout') ?>">Logout</a>
        </div>
    </nav>
    <div class="container">
        <?= $content ?? '' ?>
    </div>
</body>
</html>