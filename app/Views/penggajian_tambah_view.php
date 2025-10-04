<h2 class="mb-4">Tambah Data Penggajian</h2>
<hr>
<form action="<?= base_url('/penggajian/simpan') ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="id_anggota" class="form-label">Pilih Anggota DPR</label>
        <select class="form-select" id="id_anggota" name="id_anggota" required>
            <option value="" selected disabled>-- Pilih Anggota --</option>
            <?php foreach($anggota as $row): ?>
                <option value="<?= $row['id_anggota'] ?>">
                    <?= esc($row['nama_depan'] . ' ' . $row['nama_belakang']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="id_komponen_gaji" class="form-label">Pilih Komponen Gaji</label>
        <select class="form-select" id="id_komponen_gaji" name="id_komponen_gaji" required>
            <option value="" selected disabled>-- Pilih Komponen --</option>
            <?php foreach($komponen as $row): ?>
                <option value="<?= $row['id_komponen_gaji'] ?>">
                    <?= esc($row['nama_komponen']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <hr>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('/penggajian') ?>" class="btn btn-secondary">Batal</a>
</form>