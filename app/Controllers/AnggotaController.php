<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class AnggotaController extends BaseController
{
    // Menampilkan daftar semua anggota
    public function index()
    {
        // Proteksi halaman, hanya admin yang boleh akses
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }

        $anggotaModel = new AnggotaModel();

        $data = [
            'title'   => 'Data Anggota DPR',
            'anggota' => $anggotaModel->findAll()
        ];

        return view('template', ['content' => view('anggota_view', $data)]);
    }

    // Menampilkan form untuk menambah data anggota
    public function tambah()
    {
        // Proteksi halaman
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }

        $data = [
            'title' => 'Tambah Data Anggota'
        ];

        return view('template', ['content' => view('anggota_tambah_view', $data)]);
    }

    // Menyimpan data anggota baru
    public function simpan()
    {
        // Proteksi
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }

        $anggotaModel = new AnggotaModel();

        $anggotaModel->save([
            'nama_depan'        => $this->request->getPost('nama_depan'),
            'nama_belakang'     => $this->request->getPost('nama_belakang'),
            'gelar_depan'       => $this->request->getPost('gelar_depan'),
            'gelar_belakang'    => $this->request->getPost('gelar_belakang'),
            'jabatan'           => $this->request->getPost('jabatan'),
            'status_pernikahan' => $this->request->getPost('status_pernikahan'),
            'jumlah_anak'       => $this->request->getPost('jumlah_anak')
        ]);

        return redirect()->to('/anggota');
    }
}