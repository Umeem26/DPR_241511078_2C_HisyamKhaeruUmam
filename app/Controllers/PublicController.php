<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class PublicController extends BaseController
{
    // Fungsi untuk menampilkan daftar anggota ke publik
    public function anggota()
    {
        $anggotaModel = new AnggotaModel();

        $data = [
            'title'   => 'Data Anggota DPR',
            'anggota' => $anggotaModel->findAll()
        ];

        // Ganti 'public_template' menjadi 'template'
        return view('template', ['content' => view('public_anggota_view', $data)]);
    }
}