<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        // Proteksi halaman, hanya admin yang boleh akses
        if (session()->get('role') !== 'Admin') {
            // Jika bukan admin, tendang keluar
            return redirect()->to('/');
        }

        $data = [
            'title' => 'Dashboard'
        ];

        return view('template', ['content' => view('dashboard_view', $data)]);
    }
}