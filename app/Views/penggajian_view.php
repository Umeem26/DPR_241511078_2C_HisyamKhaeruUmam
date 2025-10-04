<h2 class="mb-4">Data Penggajian</h2>
<a href="<?= base_url('/penggajian/tambah') ?>" class="btn btn-primary mb-3">+ Tambah Data Penggajian</a>
<hr>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nama Anggota</th>
                <th>Nama Komponen Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($penggajian as $row): ?>
            <tr>
                <td><?= esc($row['nama_depan'] . ' ' . $row['nama_belakang']) ?></td>
                <td><?= esc($row['nama_komponen']) ?></td>
                <td>
                    <a href="<?= base_url('/penggajian/hapus/' . $row['id_penggajian']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>