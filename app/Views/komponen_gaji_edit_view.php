<h2 class="mb-4">Ubah Komponen Gaji</h2>
<hr>
<form action="<?= base_url('/komponen-gaji/update/' . $komponen['id_komponen_gaji']) ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="nama_komponen" class="form-label">Nama Komponen</label>
        <input type="text" class="form-control" id="nama_komponen" name="nama_komponen" value="<?= esc($komponen['nama_komponen']) ?>" required>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori" required>
                <option value="Gaji Pokok" <?= $komponen['kategori'] == 'Gaji Pokok' ? 'selected' : '' ?>>Gaji Pokok</option>
                <option value="Tunjangan Melekat" <?= $komponen['kategori'] == 'Tunjangan Melekat' ? 'selected' : '' ?>>Tunjangan Melekat</option>
                <option value="Tunjangan Lain" <?= $komponen['kategori'] == 'Tunjangan Lain' ? 'selected' : '' ?>>Tunjangan Lain</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="jabatan" class="form-label">Berlaku Untuk Jabatan</label>
            <select class="form-select" id="jabatan" name="jabatan" required>
                <option value="Semua" <?= $komponen['jabatan'] == 'Semua' ? 'selected' : '' ?>>Semua</option>
                <option value="Ketua" <?= $komponen['jabatan'] == 'Ketua' ? 'selected' : '' ?>>Ketua</option>
                <option value="Wakil Ketua" <?= $komponen['jabatan'] == 'Wakil Ketua' ? 'selected' : '' ?>>Wakil Ketua</option>
                <option value="Anggota" <?= $komponen['jabatan'] == 'Anggota' ? 'selected' : '' ?>>Anggota</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nominal" class="form-label">Nominal (Rp)</label>
            <input type="number" step="0.01" class="form-control" id="nominal" name="nominal" value="<?= esc($komponen['nominal']) ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <select class="form-select" id="satuan" name="satuan" required>
                <option value="Bulan" <?= $komponen['satuan'] == 'Bulan' ? 'selected' : '' ?>>Bulan</option>
                <option value="Hari" <?= $komponen['satuan'] == 'Hari' ? 'selected' : '' ?>>Hari</option>
                <option value="Periode" <?= $komponen['satuan'] == 'Periode' ? 'selected' : '' ?>>Periode</option>
            </select>
        </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('/komponen-gaji') ?>" class="btn btn-secondary">Batal</a>
</form>