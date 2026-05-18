<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLogin')) {
            return redirect()->to('/login')->with('msg', 'Silakan login terlebih dahulu.');
        }

        if ($arguments) {
            $role = session()->get('role');
            if (!in_array($role, $arguments)) {
                return redirect()->to('/' . $role . '/dashboard')->with('msg', 'Anda tidak memiliki akses ke halaman tersebut.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
