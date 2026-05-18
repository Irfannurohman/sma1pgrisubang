<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        return view('login'); 
    }

    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $roleSelected = $this->request->getVar('role'); // Ambil role yang dipilih di form
        
        $user = $model->getUser($username);

        if ($user) {
            if ($password == $user['password']) {
                if ($user['role'] == $roleSelected) {
                    $session->set([
                        'username' => $user['username'],
                        'role'     => $user['role'],
                        'isLogin'  => true
                    ]);

                    return redirect()->to('/' . $user['role'] . '/dashboard');
                } else {
                    $session->setFlashdata('msg', 'Hak akses tidak sesuai dengan akun ini!');
                    return redirect()->to('/login');
                }
            } else {
                $session->setFlashdata('msg', 'Password Salah');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}