<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\KomponenGajiModel;
use App\Models\PenggajianModel;

class PenggajianController extends BaseController
{
    //Menampilkan daftar penggajian
    public function index()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }

        $penggajianModel = new PenggajianModel();

        $data = [
            'title' => 'Data Penggajian',
            // Kita buat query JOIN di sini untuk mengambil nama anggota dan komponen
            'penggajian' => $penggajianModel->select('penggajian.id_penggajian, anggota.nama_depan, anggota.nama_belakang, komponen_gaji.nama_komponen')
                                           ->join('anggota', 'anggota.id_anggota = penggajian.id_anggota')
                                           ->join('komponen_gaji', 'komponen_gaji.id_komponen_gaji = penggajian.id_komponen_gaji')
                                           ->findAll()
        ];

        return view('template', ['content' => view('penggajian_view', $data)]);
    }

    //Menambah data penggajian baru
    public function tambah()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }

        $anggotaModel = new AnggotaModel();
        $komponenGajiModel = new KomponenGajiModel();
        
        $data = [
            'title'    => 'Tambah Data Penggajian',
            'anggota'  => $anggotaModel->findAll(),
            'komponen' => $komponenGajiModel->findAll()
        ];

        return view('template', ['content' => view('penggajian_tambah_view', $data)]);
    }

    //Menyimpan data penggajian baru
    public function simpan()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }

        $penggajianModel = new PenggajianModel();

        $penggajianModel->save([
            'id_anggota'       => $this->request->getPost('id_anggota'),
            'id_komponen_gaji' => $this->request->getPost('id_komponen_gaji')
        ]);

        return redirect()->to('/penggajian');
    }

    // Menghapus data penggajian
    public function hapus($id)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }
        
        $penggajianModel = new PenggajianModel();
        $penggajianModel->delete($id);

        return redirect()->to('/penggajian');
    }
}