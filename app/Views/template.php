<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Sistem Gaji DPR') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <?php if(session()->get('role') === 'Admin'): ?>
                    Sistem Gaji DPR
                <?php else: ?>
                    Transparansi Gaji DPR
                <?php endif; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">

                <?php if(session()->get('isLoggedIn')): ?>
                    <?php $role = session()->get('role'); ?>

                    <?php if($role === 'Admin'): ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('/anggota') ?>">Data Anggota</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('/komponen-gaji') ?>">Komponen Gaji</a></li>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('/penggajian') ?>">Penggajian</a></li>
                        </ul>
                    <?php elseif($role === 'Public'): ?>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('/public/anggota') ?>">Data Anggota</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('/public/penggajian') ?>">Data Penggajian</a>
                            </li>
                        </ul>
                    <?php endif; ?>

                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('/logout') ?>">Logout</a></li>
                    </ul>

                <?php else: ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('/public/anggota') ?>">Data Anggota</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Data Penggajian</a></li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('/login') ?>">Login Admin</a></li>
                    </ul>
                <?php endif; ?>

            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-body p-4">
                <?= $content ?? '' ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>