<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Controller {

	
	public function __construct() {
		parent::__construct();
	
        $this->load->model('useradmin');
        $this->load->helper('user_helper');
        $this->load->library('form_validation');
	}

	public function index(){
		redirect('school/home');
	}

	public function home(){

		$jurusan = $this->useradmin->get_data('id','ASC','jurusan')->num_rows();
		$namajurusan = $this->useradmin->get_data('id','ASC','jurusan')->result();
		$guru = $this->useradmin->get_data('id','ASC','guru')->num_rows();
        $kelas = $this->useradmin->get_data('id','ASC','kelas')->num_rows();
        $siswa = $this->useradmin->get_data('id','ASC','siswa')->num_rows();

        $where['status'] = 1;
        $slider = $this->useradmin->get_data_where($where,'web_slider')->result();

		$data['headertitle'] = 'SMK N 4 KENDAL';
		$data['namajurusan'] = $namajurusan;
		$data['jurusan'] = $jurusan;
		$data['siswa'] = $siswa;
		$data['guru'] = $guru;
		$data['kelas'] = $kelas;
		$data['slider'] = $slider;

		$this->load->view('Web/home',$data);
	}

	public function kontak(){
		$data['headertitle'] = "Kontak";

		$this->load->view('web/contact',$data);
	}

	public function kirim_masukkan(){
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$subjek = $this->input->post('subjek');
		$masukkan = $this->input->post('masukkan');

		$input['nama'] = $nama;
		$input['email'] = $email;
		$input['subjek'] = $subjek;
		$input['masukan'] = $masukkan;
		$this->useradmin->input_data($input,'masukkan');
	}

	public function nilai_siswa(){
		$data['headertitle'] = "Lihat Nilai";

		$this->load->view('web/nilai_siswa',$data);
	}

	public function nilai(){
		$data['headertitle'] = 'Data Nilai';

		$nisn = $this->input->post('nisn');

		$where['nisn'] = $nisn;

		$cek_siswa = $this->useradmin->get_data_where($where,'siswa')->row();

		if (empty($cek_siswa)) {

			$this->load->view('web/nilai_error',$data);

		}else{
			$id_siswa = $cek_siswa->id;
			$id_kelas = $cek_siswa->kelas;

			$where3['id'] = $id_kelas;
			$cek_kelas = $this->useradmin->get_data_where($where3,'kelas')->row();
			$kelas = $cek_kelas->nama;

			$where2['id_siswa'] = $id_siswa;
			$cek_nilai = $this->useradmin->get_data_where($where2,'nilai')->row();

			if (empty($cek_nilai)) {
				$nilaikosong = 'Tidak Tersedia';

				$data['nisn'] = $nisn;
				$data['nama'] = $cek_siswa->nama;
				$data['kelas'] = $kelas;
				$data['mtk'] = $nilaikosong;
				$data['indo'] = $nilaikosong;
				$data['inggris'] = $nilaikosong;
				$data['rerata'] = $nilaikosong;

			}else{

				$data['nisn'] = $nisn;
				$data['nama'] = $cek_siswa->nama;
				$data['kelas'] = $kelas;
				$data['mtk'] = $cek_nilai->mtk;
				$data['indo'] = $cek_nilai->b_indo;
				$data['inggris'] = $cek_nilai->b_inggris;
				$data['rerata'] = $cek_nilai->rerata;

			}
			$this->load->view('web/hasil_nilai',$data);
		}
	}	
}