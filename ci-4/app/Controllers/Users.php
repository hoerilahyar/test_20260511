<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if (!session()->get('login')) {

            return redirect()->to('/');
        }

        if (session()->get('role') != 'admin') {

            return redirect()->to('/dashboard');
        }

        $data['users'] = $this->userModel->findAll();

        return view('users/index', $data);
    }

    public function new()
    {
        if (!session()->get('login')) {

            return redirect()->to('/');
        }

        if (session()->get('role') != 'admin') {

            return redirect()->to('/dashboard');
        }

        return view('users/create');
    }

    public function create()
    {
        $password = password_hash(
            $this->request->getPost('password'),
            PASSWORD_DEFAULT
        );

        $this->userModel->save([

            'username' => $this->request->getPost('username'),

            'password' => $password,

            'fullname' => $this->request->getPost('fullname'),

            'role' => $this->request->getPost('role')

        ]);

        return redirect()->to('/users');
    }

    public function edit($id)
    {
        if (!session()->get('login')) {

            return redirect()->to('/');
        }

        if (session()->get('role') != 'admin') {

            return redirect()->to('/dashboard');
        }

        $data['user'] = $this->userModel->find($id);

        return view('users/edit', $data);
    }

    public function update($id)
    {
        $data = [

            'username' => $this->request->getPost('username'),

            'fullname' => $this->request->getPost('fullname'),

            'role' => $this->request->getPost('role')

        ];

        if ($this->request->getPost('password')) {

            $data['password'] = password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            );
        }

        $this->userModel->update($id, $data);

        return redirect()->to('/users');
    }

    public function delete($id)
    {
        if ($id == session()->get('user_id')) {

            return redirect()->to('/users');
        }

        $this->userModel->delete($id);

        return redirect()->to('/users');
    }
}
