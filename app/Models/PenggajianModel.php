<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggajianModel extends Model
{
    protected $table            = 'penggajian';
    protected $primaryKey       = 'id_penggajian';
    protected $allowedFields    = ['id_anggota', 'id_komponen_gaji'];

    public function getKomponenByAnggota($id_anggota)
    {
        return $this->db->table('penggajian')
            ->join('komponen_gaji', 'komponen_gaji.id_komponen_gaji = penggajian.id_komponen_gaji')
            ->where('penggajian.id_anggota', $id_anggota)
            ->get()->getResultArray();
    }
}

