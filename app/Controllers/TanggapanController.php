<?php 
namespace App\Controllers;

use App\Models\Pengaduan;
use CodeIgniter\Controller;
use App\Models\Tanggapan;

class TanggapanController extends BaseController{
    protected $pengaduann, $tanggapann;
    public function __construct()
    {
        $this->pengaduann = new Pengaduan();
        $this->tanggapann = new Tanggapan();
    }
    public function simpan()
    {
        $data= [
            'tgl_tanggapan'=> date('Y-m-d H:i:s'),
            'id_petugas'=>session()->get('id_petugas'),
            'tanggapan'=> $this->request->getPost('tanggapan'),
            'id_pengaduan'=> $this->request->getPost('id_pengaduan'),
        ];
        $this->tanggapann->insert($data);
        $this->pengaduann->set('status','selesai');
        $this->pengaduann->where('id_pengaduan', $this->request->getPost('id_pengaduan'));
        $this->pengaduann->update();
        return redirect('pengaduan');
    }
    public function getTanggapan()
    {
        $data= $this->tanggapann->where('id_pengaduan', $this->request->getGet('id_pengaduan'))->findAll();
        return response()->setJSON($data);
    }
    public function laporan()
    {
        $data['pengaduan']= $this->pengaduann->findAll();
        return view('laporan_view',$data);
    }
}