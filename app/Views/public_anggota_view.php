<h2 class="mb-4">Data Anggota DPR</h2>
<hr>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>Status Pernikahan</th>
                <th>Jumlah Anak</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anggota as $row): ?>
            <tr>
                <td><?= esc($row['gelar_depan'] . ' ' . $row['nama_depan'] . ' ' . $row['nama_belakang'] . ' ' . $row['gelar_belakang']) ?></td>
                <td><?= esc($row['jabatan']) ?></td>
                <td><?= esc($row['status_pernikahan']) ?></td>
                <td><?= esc($row['jumlah_anak']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>