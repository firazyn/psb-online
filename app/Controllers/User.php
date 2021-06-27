<?php

namespace App\Controllers;

use App\Models\CalonModel;
use App\Models\UserModel;

class User extends BaseController
{

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->calonModel = new CalonModel();
    }

    public function login()
    {
        $data = [
            'title' => 'PSB | Log In',
            'validation' => \config\services::validation()
        ];
        return view('/user/login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'PSB | Daftar',
            'validation' => \config\services::validation()
        ];
        return view('/user/register', $data);
    }

    public function authLogin()
    {
        $request = service('request');

        $username = $request->getVar('username');
        $password = $request->getVar('password');

        $row = $this->userModel->getLogin($username);

        if ($row == NULL) {
            return redirect()->to('/auth/login')->withInput()->with('errlog', 'Username akun tidak terdaftar');
        }
        if ($password == $row->password) {
            $data = [
                'login' => TRUE,
                'username' => $row->username,
                'role' => 'user'
            ];

            session()->set($data);
            session()->setFlashdata('message', 'welcome');
            return redirect()->to('/');
        }
        return redirect()->to('/auth/login')->withInput()->with('errlog', 'Password salah');
    }

    public function saveRegister()
    {
        $request = service('request');

        $rules = [
            'email' => [
                'rules' => 'required|valid_email|max_length[50]|is_unique[user.email]',
                'errors' => [
                    'required' => 'Please input an email',
                    'max_length' => 'The name should not be more than 50 characters',
                    'valid_email' => 'The email is invalid',
                    'is_unique' => 'Email is already used'
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[5]|max_length[16]|is_unique[user.username]',
                'errors' => [
                    'required' => 'Please input a name',
                    'min_length' => 'The username should not be less than 5 characters',
                    'max_length' => 'The username should not be more than 16 characters',
                    'is_unique' => 'The username is already used',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Please input a password',
                    'min_length' => 'The password should not be less than 6 characters'
                ]
            ]
        ];


        if ($this->validate($rules)) {
            $this->userModel->insert([
                'username' => $request->getVar('username'),
                'email' => $request->getVar('email'),
                'password' => $request->getVar('password')
            ]);

            session()->setFlashdata('msg', 'Akun telah terdaftar');

            return redirect()->to('/auth/login');
        } else {
            return redirect()->to('/auth/register')->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }

    public function home()
    {
        $data = [
            'title' => 'PSB | Home',
            'calon' => $this->calonModel->findAll(),
            'userCalon' => $this->calonModel->getUser(session()->get('username'))
        ];

        session()->set('create', 'no');
        return view('/user/home', $data);
    }

    public function create()
    {
        $userCalon = $this->calonModel->getUser(session()->get('username'));
        if (session()->get('username') == $userCalon['user_calon']) {
            return redirect()->to('/');
        }

        $data = [
            'title' => 'PSB | Daftar',
            'validation' => \Config\Services::validation()
        ];

        session()->set('create', 'yes');
        return view('/user/create', $data);
    }

    public function save()
    {
        $request = service('request');


        $rules = [
            'nama' => 'required',
            'wali' => 'required',
        ];

        if ($this->validate($rules)) {
            $this->calonModel->save([
                'user_calon' => session()->get('username'),
                'nama_calon' => $request->getVar('nama'),
                'wali_calon' => $request->getVar('wali'),
                'status_calon' => 'Cadangan'
            ]);

            return redirect()->to('/');
        } else {
            return redirect()->to('/create')->withInput();
        }
    }

    public function edit($username)
    {

        $data = [
            'title' => 'PSB | Ubah Data Calon',
            'validation' => \config\services::validation(),
            'userCalon' => $this->calonModel->getUser(session()->get('username')),
            'calon' => $this->calonModel->getCalon($username)
        ];

        return view('/user/edit', $data);
    }

    public function update($id)
    {
        $request = service('request');

        $rules = [
            'nama' => 'required',
            'wali' => 'required',
            'nilai_saintek' => 'required',
            'nilai_soshum' => 'required',
            'nilai_bahasa' => 'required',
            'bukti' => [
                'rules' => 'uploaded[bukti]|max_size[bukti,40000]|is_image[bukti]|mime_in[bukti,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Please select a picture',
                    'max_size' => 'The picture size is too large (max: 40MB)',
                    'is_image' => 'The uploaded file is not an image',
                    'mime_in' => 'The uploaded file format is not supported',
                ]
            ],
        ];

        $savePicture = $request->getFile('bukti');
        // dd($this->calonModel->save($data));

        if ($this->validate($rules)) {
            $savePicture->move('bukti');
            $data = [
                'id' => $id,
                'nama_calon' => $request->getVar('nama'),
                'wali_calon' => $request->getVar('wali'),
                'nilai_saintek' => $request->getVar('nilai_saintek'),
                'nilai_soshum' => $request->getVar('nilai_soshum'),
                'nilai_bahasa' => $request->getVar('nilai_bahasa'),
                'bukti_pembayaran' => $savePicture->getName(),
            ];

            $this->calonModel->save($data);

            //Saves the data to the table
        } else {
            return redirect()->to('/edit/' . $request->getVar('user'))->withInput();
        }
    }
}
