<h2 class="mb-4">Tambah Data Penggajian Baru</h2>
<hr>
<form action="#" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="id_anggota" class="form-label">Pilih Anggota DPR</label>
        <select class="form-select" id="id_anggota" name="id_anggota" required>
            <option value="" selected disabled>-- Pilih Anggota --</option>
            <?php foreach($anggota as $row): ?>
                <option value="<?= $row['id_anggota'] ?>">
                    <?= esc($row['nama_depan'] . ' ' . $row['nama_belakang'] . ' (' . $row['jabatan'] . ')') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div id="komponen-gaji-list"></div>

    <hr>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="#" class="btn btn-secondary">Batal</a>
</form>