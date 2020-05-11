<?php

class About extends Controller{

    public function index($nama = 'Theresia',$pekerjaan = "Mahasiswa", $umur = 32){
       //memanggil view yang ada di folder about dan mencari file index
       $data['nama'] = $nama;
       $data['pekerjaan'] = $pekerjaan;
       $data['umur'] = $umur;
       $data['judul'] = 'About Me';
       
       $this->view('templates/header',$data);
       $this->view('about/index', $data);
       $this->view('templates/footer');
    }

    public function page(){
        $data['judul'] = 'Pages';
        $this->view('templates/header',$data);
        $this->view('about/page');
        $this->view('template/footer');
    }

}