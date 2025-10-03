<h2 class="mb-4">Tambah Komponen Gaji Baru</h2>
<hr>
<form action="<?= base_url('/komponen-gaji/simpan') ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="nama_komponen" class="form-label">Nama Komponen</label>
        <input type="text" class="form-control" id="nama_komponen" name="nama_komponen" required>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori" required>
                <option value="Gaji Pokok">Gaji Pokok</option>
                <option value="Tunjangan Melekat">Tunjangan Melekat</option>
                <option value="Tunjangan Lain">Tunjangan Lain</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label for="jabatan" class="form-label">Berlaku Untuk Jabatan</label>
            <select class="form-select" id="jabatan" name="jabatan" required>
                <option value="Semua">Semua</option>
                <option value="Ketua">Ketua</option>
                <option value="Wakil Ketua">Wakil Ketua</option>
                <option value="Anggota">Anggota</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nominal" class="form-label">Nominal (Rp)</label>
            <input type="number" step="0.01" class="form-control" id="nominal" name="nominal" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <select class="form-select" id="satuan" name="satuan" required>
                <option value="Bulan">Bulan</option>
                <option value="Hari">Hari</option>
                <option value="Periode">Periode</option>
            </select>
        </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('/komponen-gaji') ?>" class="btn btn-secondary">Batal</a>
</form>