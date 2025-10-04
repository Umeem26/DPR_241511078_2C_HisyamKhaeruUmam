<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\PenggajianModel; // Pastikan baris ini ada

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

        return view('template', ['content' => view('public_anggota_view', $data)]);
    }

    // Fungsi untuk menampilkan data penggajian ke publik
    public function penggajian()
    {
        $anggotaModel = new AnggotaModel();
        $penggajianModel = new PenggajianModel();
        
        $semuaAnggota = $anggotaModel->findAll();
        $dataPenggajian = [];

        foreach ($semuaAnggota as $anggota) {
            $komponen = $penggajianModel->getKomponenByAnggota($anggota['id_anggota']);
            $takeHomePay = 0;

            foreach ($komponen as $item) {
                if ($item['nama_komponen'] == 'Tunjangan Istri/Suami') {
                    if ($anggota['status_pernikahan'] == 'Kawin') {
                        $takeHomePay += $item['nominal'];
                    }
                    continue;
                }
                if ($item['nama_komponen'] == 'Tunjangan Anak') {
                    if ($anggota['jumlah_anak'] > 0) {
                        $jumlahAnakDihitung = min($anggota['jumlah_anak'], 2);
                        $takeHomePay += ($item['nominal'] * $jumlahAnakDihitung);
                    }
                    continue;
                }
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
            'title' => 'Data Penggajian Anggota DPR',
            'data_penggajian' => $dataPenggajian
        ];

        return view('template', ['content' => view('public_penggajian_view', $data)]);
    }
}