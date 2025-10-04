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

    // Menampilkan form untuk menambah data
    public function tambah()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }

        $data = [
            'title' => 'Tambah Komponen Gaji'
        ];

        return view('template', ['content' => view('komponen_gaji_tambah_view', $data)]);
    }

    // Menyimpan data baru
    public function simpan()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }

        $komponenGajiModel = new KomponenGajiModel();

        $komponenGajiModel->save([
            'nama_komponen' => $this->request->getPost('nama_komponen'),
            'kategori'      => $this->request->getPost('kategori'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'nominal'       => $this->request->getPost('nominal'),
            'satuan'        => $this->request->getPost('satuan')
        ]);

        return redirect()->to('/komponen-gaji');
    }

    // Menampilkan form untuk mengedit data
    public function edit($id)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }

        $komponenGajiModel = new KomponenGajiModel();
        
        $data = [
            'title'   => 'Ubah Komponen Gaji',
            'komponen' => $komponenGajiModel->find($id)
        ];

        return view('template', ['content' => view('komponen_gaji_edit_view', $data)]);
    }

    // Memperbarui data di database
    public function update($id)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }

        $komponenGajiModel = new KomponenGajiModel();

        $komponenGajiModel->update($id, [
            'nama_komponen' => $this->request->getPost('nama_komponen'),
            'kategori'      => $this->request->getPost('kategori'),
            'jabatan'       => $this->request->getPost('jabatan'),
            'nominal'       => $this->request->getPost('nominal'),
            'satuan'        => $this->request->getPost('satuan')
        ]);

        return redirect()->to('/komponen-gaji');
    }

    // Menghapus data
    public function hapus($id)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }
        
        $komponenGajiModel = new KomponenGajiModel();
        $komponenGajiModel->delete($id);

        return redirect()->to('/komponen-gaji');
    }
}