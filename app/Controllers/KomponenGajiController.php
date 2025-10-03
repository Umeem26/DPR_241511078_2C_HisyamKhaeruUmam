<?php

namespace App\Controllers;

use App\Models\KomponenGajiModel;

class KomponenGajiController extends BaseController
{
    // Menampilkan daftar semua komponen gaji
    public function index()
    {
        // Proteksi halaman, hanya admin yang boleh akses
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }

        $komponenGajiModel = new KomponenGajiModel();

        $data = [
            'title'        => 'Data Komponen Gaji',
            'komponen_gaji' => $komponenGajiModel->findAll()
        ];

        return view('template', ['content' => view('komponen_gaji_view', $data)]);
    }
}