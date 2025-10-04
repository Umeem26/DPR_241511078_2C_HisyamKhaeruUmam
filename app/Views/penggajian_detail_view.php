<h2 class="mb-4">Detail Penggajian Anggota</h2>
<hr>

<h4>Profil Anggota</h4>
<table class="table table-bordered" style="max-width: 600px;">
    <tr>
        <th width="200px">Nama Lengkap</th>
        <td><?= esc($anggota['gelar_depan'] . ' ' . $anggota['nama_depan'] . ' ' . $anggota['nama_belakang'] . ' ' . $anggota['gelar_belakang']) ?></td>
    </tr>
    <tr>
        <th>Jabatan</th>
        <td><?= esc($anggota['jabatan']) ?></td>
    </tr>
    <tr>
        <th>Status Pernikahan</th>
        <td><?= esc($anggota['status_pernikahan']) ?></td>
    </tr>
     <tr>
        <th>Jumlah Anak</th>
        <td><?= esc($anggota['jumlah_anak']) ?></td>
    </tr>
</table>

<h4 class="mt-5">Rincian Komponen Gaji (Bulanan)</h4>
<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nama Komponen</th>
            <th>Kategori</th>
            <th>Nominal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($komponen_gaji as $item): ?>
            <?php if($item['satuan'] == 'Bulan'): ?>
                <tr>
                    <td><?= esc($item['nama_komponen']) ?></td>
                    <td><?= esc($item['kategori']) ?></td>
                    <td>Rp <?= number_format($item['nominal'], 2, ',', '.') ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
    <tfoot class="table-light">
        <tr>
            <th colspan="2" class="text-end">Total Take Home Pay (Bulanan)</th>
            <th>Rp <?= number_format($take_home_pay, 2, ',', '.') ?></th>
        </tr>
    </tfoot>
</table>

<a href="<?= base_url('/penggajian') ?>" class="btn btn-secondary mt-4">&larr; Kembali ke Daftar Penggajian</a>