<?php

namespace App\Controllers;

use App\Models\AnggotaModel; // Butuh model anggota
use App\Models\KomponenGajiModel; // Butuh model komponen gaji

class PenggajianController extends BaseController
{
    public function tambah()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }

        $anggotaModel = new AnggotaModel();
        
        $data = [
            'title'   => 'Tambah Data Penggajian',
            'anggota' => $anggotaModel->findAll() // Kirim semua data anggota ke view
        ];

        return view('template', ['content' => view('penggajian_tambah_view', $data)]);
    }
}