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

        $anggotaModel = new AnggotaModel();
        $penggajianModel = new PenggajianModel();
        
        $semuaAnggota = $anggotaModel->findAll();
        $dataPenggajian = [];

        foreach ($semuaAnggota as $anggota) {
            $komponen = $penggajianModel->getKomponenByAnggota($anggota['id_anggota']);
            $takeHomePay = 0;

            foreach ($komponen as $item) {
                // Aturan Tunjangan Istri/Suami
                if ($item['nama_komponen'] == 'Tunjangan Istri/Suami') {
                    if ($anggota['status_pernikahan'] == 'Kawin') {
                        $takeHomePay += $item['nominal'];
                    }
                    continue;
                }

                // Aturan Tunjangan Anak
                if ($item['nama_komponen'] == 'Tunjangan Anak') {
                    if ($anggota['jumlah_anak'] > 0) {
                        $jumlahAnakDihitung = min($anggota['jumlah_anak'], 2);
                        $takeHomePay += ($item['nominal'] * $jumlahAnakDihitung);
                    }
                    continue;
                }

                // Hitung komponen bulanan lainnya
                if ($item['satuan'] == 'Bulan') {
                    $takeHomePay += $item['nominal'];
                }
            }

            $dataPenggajian[] = [
                'anggota' => $anggota,
                'take_home_pay' => $takeHomePay
            ];
        }

        $data = [
            'title' => 'Data Penggajian',
            'data_penggajian' => $dataPenggajian
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

    public function hapusSemua($id_anggota)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }
        
        $penggajianModel = new PenggajianModel();
        
        // Langkah 1: Temukan semua data penggajian yang cocok
        $dataUntukDihapus = $penggajianModel->where('id_anggota', $id_anggota)->findAll();

        // Langkah 2: Jika ada datanya, loop dan hapus satu per satu berdasarkan primary key-nya
        if (!empty($dataUntukDihapus)) {
            foreach ($dataUntukDihapus as $item) {
                // Hapus berdasarkan id_penggajian (primary key dari tabel penggajian)
                $penggajianModel->delete($item['id_penggajian']);
            }
        }

        return redirect()->to('/penggajian')->with('success', 'Semua data penggajian untuk anggota tersebut berhasil dihapus.');
    }

    // Menampilkan detail penggajian per anggota
    public function detail($id_anggota)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/dashboard');
        }

        $anggotaModel = new AnggotaModel();
        $penggajianModel = new PenggajianModel();

        $anggota = $anggotaModel->find($id_anggota);
        $komponen = $penggajianModel->getKomponenByAnggota($id_anggota);
        $takeHomePay = 0;

        foreach ($komponen as $item) {
            // Aturan Tunjangan Istri/Suami
            if ($item['nama_komponen'] == 'Tunjangan Istri/Suami') {
                if ($anggota['status_pernikahan'] == 'Kawin') {
                    $takeHomePay += $item['nominal'];
                }
                continue;
            }

            // Aturan Tunjangan Anak
            if ($item['nama_komponen'] == 'Tunjangan Anak') {
                if ($anggota['jumlah_anak'] > 0) {
                    $jumlahAnakDihitung = min($anggota['jumlah_anak'], 2);
                    $takeHomePay += ($item['nominal'] * $jumlahAnakDihitung);
                }
                continue;
            }

            // Hitung komponen bulanan lainnya
            if ($item['satuan'] == 'Bulan') {
                $takeHomePay += $item['nominal'];
            }
        }

        $data = [
            'title'         => 'Detail Penggajian',
            'anggota'       => $anggota,
            'komponen_gaji' => $komponen,
            'take_home_pay' => $takeHomePay
        ];

        return view('template', ['content' => view('penggajian_detail_view', $data)]);
    }
}