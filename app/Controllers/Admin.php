<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\CalonModel;
use App\Models\UserModel;

class Admin extends BaseController
{

	public function __construct()
	{
		$this->adminModel = new AdminModel();
		$this->userModel = new UserModel();
		$this->calonModel = new CalonModel();
	}

	public function login()
	{
		$data = [
			'title' => 'AdminPSB | Log In'
		];
		return view('/admin/login', $data);
	}

	public function userlist()
	{
		$data = [
			'title' => 'AdminPSB | Users List',
			'users' => $this->userModel->findAll()
		];
		return view('/admin/userlist', $data);
	}

	public function authLogin()
	{
		$request = service('request');

		$username = $request->getVar('username');
		$password = $request->getVar('password');

		$row = $this->adminModel->getLogin($username);

		if ($row == NULL) {
			return redirect()->to('/admin/login')->withInput()->with('errlog', 'Username akun tidak terdaftar');
		}
		if ($password == $row->password) {
			$data = [
				'login' => TRUE,
				'username' => $row->username,
				'role' => 'admin'
			];

			session()->set($data);
			session()->setFlashdata('message', 'welcome');
			return redirect()->to('/admin');
		}
		return redirect()->to('/admin/login')->withInput()->with('errlog', 'Password salah');
	}

	public function logout()
	{
		session()->destroy();
		return redirect()->to('/admin/login');
	}

	public function home()
	{
		if (session()->get('role') != 'admin') {
			return redirect()->to('/admin/logout');
		}

		$data = [
			'title' => 'AdminPSB | Home',
			'calon' => $this->calonModel->findAll()

		];
		return view('/admin/home', $data);
	}

	public function edit($username)
	{
		if (session()->get('role') != 'admin') {
			return redirect()->to('/admin/logout');
		}

		$data = [
			'title' => 'AdminPSB | Ubah Data Calon',
			'validation' => \config\services::validation(),
			'calon' => $this->calonModel->getCalon($username)
		];

		return view('/admin/edit', $data);
	}

	public function update($id)
	{
		if (session()->get('role') != 'admin') {
			return redirect()->to('/admin/logout');
		}

		$request = service('request');

		$rules = [
			'nama' => 'required',
			'wali' => 'required',
		];

		if ($this->validate($rules)) {

			//Saves the data to the table
			$this->calonModel->save([
				'id' => $id,
				'nama_calon' => $request->getVar('nama'),
				'wali_calon' => $request->getVar('wali'),
				'status_calon' => $request->getVar('status'),
			]);

			return redirect()->to('/');
		} else {
			return redirect()->to('/admin/edit/' . $request->getVar('user'))->withInput();
		}
	}

	public function delete($id)
	{
		if (session()->get('role') != 'admin') {
			return redirect()->to('/admin/logout');
		}

		$this->calonModel->delete($id);
		return redirect()->to('/admin');
	}

	public function editUser($username)
	{
		if (session()->get('role') != 'admin') {
			return redirect()->to('/admin/logout');
		}

		$data = [
			'title' => 'AdminPSB | Ubah Data User',
			'validation' => \config\services::validation(),
			'user' => $this->userModel->where('username', $username)->first()
		];

		return view('/admin/editUser', $data);
	}

	public function updateUser($username)
	{
		if (session()->get('role') != 'admin') {
			return redirect()->to('/admin/logout');
		}

		$request = service('request');

		$rules = [
			'username' => 'required',
			'email' => 'required',
			'password' => 'required',
		];

		if ($this->validate($rules)) {

			//Saves the data to the table
			$this->userModel->save([
				'username' => $username,
				'email' => $request->getVar('email'),
				'password' => $request->getVar('password'),
			]);

			return redirect()->to('/admin/userlist');
		} else {
			return redirect()->to('/admin/editUser/' . $request->getVar('username'))->withInput();
		}
	}

	public function deleteUser($username)
	{
		if (session()->get('role') != 'admin') {
			return redirect()->to('/admin/logout');
		}

		$this->calonModel->delete($username);
		return redirect()->to('/admin/userlist');
	}
}
