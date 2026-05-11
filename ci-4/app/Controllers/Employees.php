<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmployeeModel;

class Employees extends BaseController
{
    protected $employeeModel;

    public function __construct()
    {
        $this->employeeModel = new EmployeeModel();
    }

    public function index()
    {
        if (!session()->get('login')) {

            return redirect()->to('/');
        }

        $allowedRoles = ['admin', 'hrd'];

        if (
            !in_array(
                session()->get('role'),
                $allowedRoles
            )
        ) {

            return redirect()->to('/dashboard');
        }

        $data['employees'] = $this->employeeModel->findAll();

        return view('employees/index', $data);
    }

    public function new()
    {
        return view('employees/create');
    }

    public function create()
    {
        $photo = $this->request->getFile('photo');

        $newName = '';

        if ($photo->isValid()) {

            $validationRule = [

                'photo' => [

                    'label' => 'Image File',

                    'rules' => [

                        'uploaded[photo]',
                        'is_image[photo]',
                        'mime_in[photo,image/jpg,image/jpeg]',
                        'max_size[photo,300]'

                    ],

                ],

            ];

            if (!$this->validate($validationRule)) {

                return redirect()->back();
            }

            $newName = $photo->getRandomName();

            $photo->move(
                ROOTPATH . 'public/uploads',
                $newName
            );
        }

        $this->employeeModel->save([

            'employee_name' =>
                $this->request->getPost('employee_name'),

            'email' =>
                $this->request->getPost('email'),

            'phone' =>
                $this->request->getPost('phone'),

            'address' =>
                $this->request->getPost('address'),

            'photo' => $newName

        ]);

        return redirect()->to('/employees');
    }

    // FORM EDIT
    public function edit($id)
    {
        $data['employee'] =
            $this->employeeModel->find($id);

        return view('employees/edit', $data);
    }

    public function update($id)
    {
        $employee = $this->employeeModel->find($id);

        $photo = $this->request->getFile('photo');

        $newName = $employee['photo'];

        if ($photo && $photo->isValid()) {

            $validationRule = [

                'photo' => [

                    'label' => 'Image File',

                    'rules' => [

                        'is_image[photo]',
                        'mime_in[photo,image/jpg,image/jpeg]',
                        'max_size[photo,300]'

                    ],

                ],

            ];

            if (!$this->validate($validationRule)) {

                return redirect()->back();
            }

            $newName = $photo->getRandomName();

            $photo->move(
                ROOTPATH . 'public/uploads',
                $newName
            );

            if (
                $employee['photo'] &&
                file_exists(
                    ROOTPATH .
                    'public/uploads/' .
                    $employee['photo']
                )
            ) {

                unlink(
                    ROOTPATH .
                    'public/uploads/' .
                    $employee['photo']
                );
            }
        }

        $this->employeeModel->update($id, [

            'employee_name' =>
                $this->request->getPost('employee_name'),

            'email' =>
                $this->request->getPost('email'),

            'phone' =>
                $this->request->getPost('phone'),

            'address' =>
                $this->request->getPost('address'),

            'photo' => $newName

        ]);

        return redirect()->to('/employees');
    }

    public function delete($id)
    {
        $employee = $this->employeeModel->find($id);

        if (
            $employee['photo'] &&
            file_exists(
                ROOTPATH .
                'public/uploads/' .
                $employee['photo']
            )
        ) {

            unlink(
                ROOTPATH .
                'public/uploads/' .
                $employee['photo']
            );
        }

        $this->employeeModel->delete($id);

        return redirect()->to('/employees');
    }
}
