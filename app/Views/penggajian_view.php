<h2 class="mb-4">Data Penggajian Anggota DPR</h2>
<a href="<?= base_url('/penggajian/tambah') ?>" class="btn btn-primary mb-3">+ Atur Penggajian Anggota</a>
<hr>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>Take Home Pay (Bulanan)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_penggajian as $row): ?>
            <tr>
                <td><?= esc($row['anggota']['gelar_depan'] . ' ' . $row['anggota']['nama_depan'] . ' ' . $row['anggota']['nama_belakang'] . ' ' . $row['anggota']['gelar_belakang']) ?></td>
                <td><?= esc($row['anggota']['jabatan']) ?></td>
                <td>Rp <?= number_format($row['take_home_pay'], 2, ',', '.') ?></td>
                <td>
                    <a href="<?= base_url('/penggajian/detail/' . $row['anggota']['id_anggota']) ?>" class="btn btn-sm btn-info">Detail</a>
                    <a href="<?= base_url('/penggajian/edit/' . $row['anggota']['id_anggota']) ?>" class="btn btn-sm btn-warning">Ubah</a>
                    <a href="<?= base_url('/penggajian/hapus-semua/' . $row['anggota']['id_anggota']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus SEMUA data penggajian untuk anggota ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>