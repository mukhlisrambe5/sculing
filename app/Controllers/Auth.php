<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{


    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        return view('login');
    }



    public function cekLogin()
    {

        if (
            $this->validate([
                'username' => [
                    'label' => 'Username',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong !'
                    ]
                ],
            ])
        ) {
            $username = $this->request->getPost("username");
            $password = sha1($this->request->getPost("password"));

            $data = $this->ModelAuth->cekLogin($username, $password);
            if ($data) {
                if (($data['username'] == $username && $data['password'] == $password)) {
                    session()->set('level', $data['level']);
                    session()->set('username', $data['username']);
                    session()->setFlashdata("success", "Anda berhasil Login ");

                    return redirect()->to('home');
                } else {
                    session()->setFlashdata("error", "Username atau Password yang anda masukkan salah ");
                    return redirect()->to('/auth');

                }
            } else {
                session()->setFlashdata("error", "Username atau Password yang anda masukkan salah ");
                return redirect()->to('/')->withInput();

            }
        } else {
            return redirect()->to('/')->withInput();
        }

    }

    public function signout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}