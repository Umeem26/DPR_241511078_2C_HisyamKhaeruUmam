<h1>Selamat Datang, <?= esc(session()->get('nama_depan')) ?>!</h1>
<p>Anda telah berhasil login sebagai **<?= esc(session()->get('role')) ?>**.</p>