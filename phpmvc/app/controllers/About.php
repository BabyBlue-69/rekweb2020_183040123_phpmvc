<?php 

class About extends Controller{
	public function index($nama = 'Firdaus', $pekerjaan = 'Kapitent', $umur = 23){
		// echo "Hai, nama saya $nama, saya adalah seorang $pekerjaan. Saya berumur $umur tahun.";
		$data['nama'] = $nama;
		$data['pekerjaan'] = $pekerjaan;
		$data['umur'] = $umur;
		$data['judul'] = 'Tentang Saya';
		$this->view('templates/header', $data);
		$this->view('about/index', $data);
		$this->view('templates/footer');
	}
	public function page(){
		// echo 'About/page';
		$data['judul'] = 'Halaman';
		$this->view('templates/header', $data);
		$this->view('about/page');
		$this->view('templates/footer');
	}
}


 ?>