<h2>Data Anggota DPR</h2>
<a href="<?= base_url('/anggota/tambah') ?>">+ Tambah Data Anggota</a>
<hr>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>Nama Lengkap</th>
            <th>Jabatan</th>
            <th>Status Pernikahan</th>
            <th>Jumlah Anak</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($anggota as $row): ?>
        <tr>
            <td><?= esc($row['gelar_depan'] . ' ' . $row['nama_depan'] . ' ' . $row['nama_belakang'] . ' ' . $row['gelar_belakang']) ?></td>
            <td><?= esc($row['jabatan']) ?></td>
            <td><?= esc($row['status_pernikahan']) ?></td>
            <td><?= esc($row['jumlah_anak']) ?></td>
            <td>
                <a href="#">Edit</a>
                <a href="#">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>