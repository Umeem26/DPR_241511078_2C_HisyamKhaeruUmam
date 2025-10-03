<h2 class="mb-4">Data Anggota DPR</h2>
<a href="<?= base_url('/anggota/tambah') ?>" class="btn btn-primary mb-3">+ Tambah Data Anggota</a>
<hr>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
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
                    <a href="<?= base_url('/anggota/edit/' . $row['id_anggota']) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>