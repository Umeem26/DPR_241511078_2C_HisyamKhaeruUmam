<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        // Data yang akan dikirim ke view
        $data = [
            'title' => 'Dashboard'
        ];

        // Memuat view dashboard di dalam template utama yang akan kita buat
        return view('template', ['content' => view('dashboard_view', $data)]);
    }
}