<h2 class="mb-4">Data Komponen Gaji & Tunjangan</h2>
<a href="<?= base_url('/komponen-gaji/tambah') ?>" class="btn btn-primary mb-3">+ Tambah Komponen Gaji</a>
<hr>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nama Komponen</th>
                <th>Kategori</th>
                <th>Berlaku Untuk</th>
                <th>Nominal</th>
                <th>Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($komponen_gaji as $row): ?>
            <tr>
                <td><?= esc($row['nama_komponen']) ?></td>
                <td><?= esc($row['kategori']) ?></td>
                <td><?= esc($row['jabatan']) ?></td>
                <td>Rp <?= number_format($row['nominal'], 2, ',', '.') ?></td>
                <td><?= esc($row['satuan']) ?></td>
                <td>
                    <a href="<?= base_url('/komponen-gaji/edit/' . $row['id_komponen_gaji']) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('/komponen-gaji/hapus/' . $row['id_komponen_gaji']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>