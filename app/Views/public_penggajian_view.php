<h2 class="mb-4">Data Penggajian Anggota DPR</h2>
<hr>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>Take Home Pay (Bulanan)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_penggajian as $row): ?>
            <tr>
                <td><?= esc($row['anggota']['gelar_depan'] . ' ' . $row['anggota']['nama_depan'] . ' ' . $row['anggota']['nama_belakang'] . ' ' . $row['anggota']['gelar_belakang']) ?></td>
                <td><?= esc($row['anggota']['jabatan']) ?></td>
                <td>Rp <?= number_format($row['take_home_pay'], 2, ',', '.') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>