<h2 class="mb-4">Tambah Data Anggota Baru</h2>
<hr>
<form action="<?= base_url('/anggota/simpan') ?>" method="post">
    <?= csrf_field() ?>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nama_depan" class="form-label">Nama Depan</label>
            <input type="text" class="form-control" id="nama_depan" name="nama_depan" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="nama_belakang" class="form-label">Nama Belakang</label>
            <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="gelar_depan" class="form-label">Gelar Depan</label>
            <input type="text" class="form-control" id="gelar_depan" name="gelar_depan">
        </div>
        <div class="col-md-6 mb-3">
            <label for="gelar_belakang" class="form-label">Gelar Belakang</label>
            <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <select class="form-select" id="jabatan" name="jabatan" required>
                <option value="Ketua">Ketua</option>
                <option value="Wakil Ketua">Wakil Ketua</option>
                <option value="Anggota">Anggota</option>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
            <select class="form-select" id="status_pernikahan" name="status_pernikahan" required>
                <option value="Kawin">Kawin</option>
                <option value="Belum Kawin">Belum Kawin</option>
                <option value="Cerai Hidup">Cerai Hidup</option>
                <option value="Cerai Mati">Cerai Mati</option>
            </select>
        </div>
        <div class="col-md-4 mb-3">
            <label for="jumlah_anak" class="form-label">Jumlah Anak</label>
            <input type="number" class="form-control" id="jumlah_anak" name="jumlah_anak" value="0" required>
        </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('/anggota') ?>" class="btn btn-secondary">Batal</a>
</form>