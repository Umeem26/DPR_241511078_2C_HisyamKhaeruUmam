<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Sistem Gaji DPR') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .sidebar {
            width: 280px;
            min-height: 100vh;
        }
        .content {
            flex-grow: 1;
            padding: 30px;
            background-color: #f8f9fa;
        }
        .sidebar .nav-link {
            font-size: 1.1rem;
            padding: 12px 20px;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>

    <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
        <a href="<?= base_url('/') ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <i class="bi bi-bank me-2 fs-4"></i>
            <span class="fs-4">Aplikasi Gaji DPR</span>
        </a>
        <hr>

        <ul class="nav nav-pills flex-column mb-auto">
            <?php if (session()->get('isLoggedIn')): // Cek jika sudah login ?>
                <?php $role = session()->get('role'); ?>

                <?php if ($role === 'Admin'): ?>
                    <li class="nav-item">
                        <a href="<?= base_url('/dashboard') ?>" class="nav-link text-white" aria-current="page">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('/anggota') ?>" class="nav-link text-white">
                            <i class="bi bi-people me-2"></i> Data Anggota
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('/komponen-gaji') ?>" class="nav-link text-white">
                            <i class="bi bi-card-list me-2"></i> Komponen Gaji
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('/penggajian') ?>" class="nav-link text-white">
                            <i class="bi bi-cash-coin me-2"></i> Penggajian
                        </a>
                    </li>
                <?php elseif ($role === 'Public'): ?>
                    <li>
                        <a href="<?= base_url('/public/anggota') ?>" class="nav-link text-white">
                            <i class="bi bi-people me-2"></i> Data Anggota
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('/public/penggajian') ?>" class="nav-link text-white">
                            <i class="bi bi-wallet2 me-2"></i> Data Penggajian
                        </a>
                    </li>
                <?php endif; ?>

            <?php else: // Jika BELUM login ?>
                <li>
                    <a href="<?= base_url('/public/anggota') ?>" class="nav-link text-white">
                        <i class="bi bi-people me-2"></i> Data Anggota
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('/public/penggajian') ?>" class="nav-link text-white">
                        <i class="bi bi-wallet2 me-2"></i> Data Penggajian
                    </a>
                </li>
            <?php endif; ?>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle me-2 fs-4"></i>
                <strong><?= esc(session()->get('username') ?? 'Guest') ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                <?php if (session()->get('isLoggedIn')): ?>
                    <li><a class="dropdown-item" href="<?= base_url('/logout') ?>">Sign out</a></li>
                <?php else: ?>
                    <li><a class="dropdown-item" href="<?= base_url('/login') ?>">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="content">
        <?= $content ?? '' ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>