<?php

namespace App\Controllers;

use App\Models\KeuanganModel;

class Keuangan extends BaseController
{
    public function index()
    {
        return view('modal_awal'); 
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'modal_awal' => 'required|numeric'
        ]);
        
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $keuanganModel = new KeuanganModel();
        
        $data = [
            'modal_awal' => $this->request->getPost('modal_awal'),
        ];

        $keuanganModel->insert($data);

        return redirect()->to('/dashboard_k');
    }
}
