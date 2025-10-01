<?php

namespace App\Controllers;

use App\Models\PenggunaModel; 

class AuthController extends BaseController
{
    // Menampilkan halaman form login
    public function index()
    {
        // Tampilan form login akan kita buat nanti
        return view('login_view');
    }

    // Memproses data login
    public function process()
    {
        $penggunaModel = new PenggunaModel();
        $session = session();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $penggunaModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $sessionData = [
                'user_id'    => $user['id_pengguna'],
                'username'   => $user['username'],
                'nama_depan' => $user['nama_depan'],
                'role'       => $user['role'],
                'isLoggedIn' => TRUE
            ];
            $session->set($sessionData);
            
            // Arahkan ke halaman dashboard (akan kita buat nanti)
            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('msg', 'Username atau Password salah.');
            return redirect()->to('/login');
        }
    }

    // Fungsi untuk logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}