<h2 class="mb-4">Ubah Data Penggajian</h2>
<p>Anggota: <strong><?= esc($anggota['nama_depan'] . ' ' . $anggota['nama_belakang']) ?></strong></p>
<p>Jabatan: <strong><?= esc($anggota['jabatan']) ?></strong></p>
<hr>

<form action="<?= base_url('/penggajian/update/' . $anggota['id_anggota']) ?>" method="post">
    <?= csrf_field() ?>
    
    <h5>Pilih Komponen Gaji & Tunjangan:</h5>
    <?php foreach($komponen_tersedia as $item): ?>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="komponen[]" 
               value="<?= $item['id_komponen_gaji'] ?>" 
               id="komponen-<?= $item['id_komponen_gaji'] ?>"
               <?php if(in_array($item['id_komponen_gaji'], $komponen_dimiliki)): echo 'checked'; endif; ?>
        >
        <label class="form-check-label" for="komponen-<?= $item['id_komponen_gaji'] ?>">
            <?= esc($item['nama_komponen']) ?> (Rp <?= number_format($item['nominal'], 2, ',', '.') ?>)
        </label>
    </div>
    <?php endforeach; ?>

    <hr>
    <button type="submit" class="btn btn-primary">Update Penggajian</button>
    <a href="<?= base_url('/penggajian') ?>" class="btn btn-secondary">Batal</a>
</form>