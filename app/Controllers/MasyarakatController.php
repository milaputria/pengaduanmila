<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Masyarakat;
class MasyarakatController extends BaseController{
    protected $masyarakats;
    function __construct()
    {
        $this->masyarakats = new Masyarakat();
    }
    public function index()
    {
        $data['masyarakat'] = $this->masyarakats->findAll();
        return view('Masyarakat_view', $data);
    }
    public function save()
    {
        $data=array(
            'nik'=> $this->request->getPost('nik'),
            'nama'=> $this->request->getPost('nama'),
            'username'=> $this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password')."",PASSWORD_DEFAULT),
            'telp'=> $this->request->getPost('telp'),
        );
        $this->masyarakats->insert($data);
        session()->setFlashdata("message","Data berhasil disimpan");
        return $this->response->redirect('/masyarakat');
    }
    public function edit($id)
    {
        if ($this->request->getPost('ubahpassword')== null){
            $data=array(
                'nik'=> $this->request->getPost('nik'),
                'nama'=> $this->request->getPost('nama'),
                'username'=> $this->request->getPost('username'),
                'log_in'=>true,
                'telp'=> $this->request->getPost('telp'),
            );
            $this->masyarakats->update($id,$data);
        }else {
            $data=array(
                'nik'=> $this->request->getPost('nik'),
                'nama'=> $this->request->getPost('nama'),
                'username'=> $this->request->getPost('username'),
                'log_in'=>true,
                'telp'=> $this->request->getPost('telp'),
            );
            $this->masyarakats->update($id,$data);
        }
        session()->setFlashdata("message","Data berhasil dirubah");
        return $this->response->redirect('/masyarakat');
    }
    public function delete($id)
    {
        $this->masyarakats->delete($id);
        session()->setFlashdata("message","Data berhasil dihapus");
        return $this->response->redirect('/masyarakat');
    }

}