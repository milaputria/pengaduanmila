<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pengaduan;

class PengaduanController extends BaseController
{
    protected $pengaduann;
    function __construct()
    {
        $this->pengaduann = new Pengaduan();
    }
    public function index()
    {
        if (session()->get('level') == 'masyarakat') {
            $data['pengaduan'] = $this->pengaduann->where(['nik' => session()->get('nik')])->findAll();
        } else {
            $data['pengaduan'] = $this->pengaduann->findAll();
        }
        return view('Pengaduan_view', $data);
    }
    public function save()
    {
        if(empty($_FILES['foto']['name'])){
            $data= [
                'tgl_pengaduan'=> date('Y-m-d H:i:s'),
                'nik'=>session()->get('nik'),
                'isi_laporan'=>$this->request->getPost('isi_laporan'),
                'foto'=> '',
                'status'=> '0',
            ];
        }else{
            $filedata = $this->request->getFile('foto');
            $filename = $filedata->getRandomName();
            $data= [
                'tgl_pengaduan'=> date('Y-m-d H:i:s'),
                'nik'=>session()->get('nik'),
                'isi_laporan'=>$this->request->getPost('isi_laporan'),
                'foto'=> $filename,
                'status'=> '0',
            ];
            $filedata->move('upload/berkas/',$filename);
        }
        $this->pengaduann->insert($data);
        return redirect('pengaduan');
    }
    public function hapus($id)
    {
        $this->pengaduann->delete($id);
        return redirect('pengaduan');
    }
}
