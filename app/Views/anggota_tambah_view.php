<h2>Tambah Data Anggota Baru</h2>
<hr>
<form action="<?= base_url('/anggota/simpan') ?>" method="post">
    <?= csrf_field() ?>
    <table cellpadding="5">
        <tr>
            <td>Nama Depan</td>
            <td><input type="text" name="nama_depan" required></td>
        </tr>
        <tr>
            <td>Nama Belakang</td>
            <td><input type="text" name="nama_belakang" required></td>
        </tr>
        <tr>
            <td>Gelar Depan</td>
            <td><input type="text" name="gelar_depan"></td>
        </tr>
        <tr>
            <td>Gelar Belakang</td>
            <td><input type="text" name="gelar_belakang"></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>
                <select name="jabatan" required>
                    <option value="Ketua">Ketua</option>
                    <option value="Wakil Ketua">Wakil Ketua</option>
                    <option value="Anggota">Anggota</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Status Pernikahan</td>
            <td>
                <select name="status_pernikahan" required>
                    <option value="Kawin">Kawin</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Jumlah Anak</td>
            <td><input type="number" name="jumlah_anak" value="0" required></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit">Simpan</button>
                <a href="<?= base_url('/anggota') ?>">Batal</a>
            </td>
        </tr>
    </table>
</form>