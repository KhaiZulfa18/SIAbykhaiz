<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends CI_Controller {

	// Cek apakah sudah login
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('idadmin')){
			redirect('loginuser/loginadmin');
        }
		else {
			$this->load->model('useradmin');
			$this->load->helper('user_helper');

		}
        //$this->load->model('useradmin');
        //$this->load->helper('user_helper');
	}

	public function index(){
		redirect('akademik/home');
	}

	public function sendemail(){
		//$cek = $this->useradmin->get_data('id','admin');
		$data['headertitle'] = 'Sent Email';
		$data['menu'] = 'sendemail';
		$data['menu_induk'] = 'email';

		$this->load->view('admin/email/v_sendemail',$data);
	}


	public function kirimemail(){
		$admin = $this->session->userdata('idadmin');
        $this->load->library('email');

        $penerima = $this->input->post('penerima');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');

        if ($penerima=='admin') {
        	$cek = $this->useradmin->get_data('id','ASC','admin')->row();
        	$kirimke = $cek->email;
        }
        if ($penerima=='guru') {
        	$cek = $this->useradmin->get_data('id','ASC','guru')->row();
        	$kirimke = $cek->email;
        }
        if ($penerima=='siswa') {
        	$cek = $this->useradmin->get_data('id','ASC','siswa')->row();
        	$kirimke = $cek->email;
        }

        // Kirim email
                $configmail = [
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8',
                    'protocol'  => 'smtp',
                    'smtp_crypto' => 'tls',     
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_user' => 'khaizulfa18@gmail.com',  // Ganti dengan email gmail kamu
                    'smtp_pass' => 'khaizuddin',             // Password gmail kamu
                    'smtp_port' => 587,
                    'wordwrap'  => false,
                    'newline'   => "\r\n"
                ];

                    //Load library email dan konfigurasinya
                    //$this->load->library('email');
                    $this->email->initialize($configmail);

                    $this->email->from('khaizulfa18@gmail.com', 'Khai Zulfa');
                    $list = array($kirimke);
                    $this->email->to($list);
                    $this->email->subject($subject);
                    $this->email->message($message);
                    $kirim = $this->email->send();

                    if($kirim){
                        //$this->session->set_flashdata("sukses","<div class='alert alert-success' role='alert'>Email berhasil terkirim! </div>"); 
                        $response['status'] = 'gagal';
                		$response['pesan'] = '<div class="alert alert-success" role="alert">Email Berhasil Terkirim!</div>';
                        $status = '1';
                    }
                    else{
                        $txtgagal = $this->email->print_debugger();
                        //$this->session->set_flashdata("gagal",$txtgagal); 
                        $response['status'] = 'gagal';
                		$response['pesan'] = '<div class="alert alert-danger" role="alert">Gagal Terkirim! '.$txtgagal.'</div>';
                        $status = '0'; 
                    } 

                /*$input = array(
                		'penerima'=>$kirimke,
                		'subject'=>$subject,
                		'message'=>$message,
                		'status'=>$status,
                		'pengirim'=>$admin,
                    );*/
                $input['penerima']=$kirimke;
                $input['subject']=$subject;
                $input['message']=$message;
                $input['status']=$status;
                $input['pengirim']=$admin;
                $this->useradmin->input_data($input,'email');

                echo json_encode($response);
	}

    //======================Masukkan===============
    public function masukkan(){
        $data['headertitle'] = 'Data Masukkan';
        $data['menu'] = 'data_masukkan';
        $data['menu_induk'] = 'tools';

        $this->load->view('admin/masukkan/v_datamasukkan', $data);
    }

    public function get_masukkan(){

        $sort = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;

        if (empty($sort)) {
            $sortby = 'id';
        }
        if ($sort=="nama") {
            $sortby = 'nama';
        }
        if ($sort=="email") {
            $sortby = 'email';
        }
        if ($sort=="subjek") {
            $sortby = 'subjek';
        }
        if ($sort=="waktu") {
            $sortby = 'waktu';
        }
        if (!empty($cari)) {
            $like['nama'] = $cari;
            $like2['masukan'] = $cari;
            $where = NULL;
        }
        else {
            $like = NULL;
            $like2 = NULL;
            $where = NULL;
        }

        $data['list_masukkan'] = $this->useradmin->get_data_cond_two($where,$like,$like2,$sortby,'ASC',$offset,$dataPerPage,'masukkan')->result();
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('admin/masukkan/tabel_masukkan', $data);
    }  

    public function paging_masukkan(){
        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        if (!empty($cari)) {
            $like['nama'] = $cari;
            $like2['masukan'] = $cari;
            $where = NULL;
        }
        else {
            $like = NULL;
            $like2 = NULL;
            $where = NULL;
        }
        $jumData = $this->useradmin->get_paging_cond_two($where,$like,$like2,'masukkan')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('admin/masukkan/paging_masukkan', $data);
    }

    public function delete_masukkan(){
        //$this->load->model("useradmin");

        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->useradmin->delete_data($where,'masukkan');
    }


    //=====================Nilai==========================
    public function input_nilai($id=NULL){
        if(empty($id)){
            redirect('akademik/data_siswa');
        }
        else{
            $where['id'] = $id;
            $idguru = $this->session->userdata('idadmin');

            $cek = $this->useradmin->get_data_where($where,'siswa')->row();

            $data['headertitle'] = 'Input Nilai';
            $data['menu_induk'] = '';
            $data['menu'] = '';

            $data['id'] = $id;
            $data['nama'] = $cek->nama;
            $data['nisn'] = $cek->nisn;
            $data['kelas'] = $cek->kelas;
            $data['idguru'] = $idguru;

            $this->load->view('admin/nilai/v_inputnilai',$data);
        }
    }
    public function simpan_nilai(){
        $id_siswa = $this->input->post('id_siswa');
        $id_guru = $this->input->post('id_guru');
        $mtk = $this->input->post('mtk');
        $indo = $this->input->post('indo');
        $inggris = $this->input->post('inggris');

        $avg = $mtk+$indo+$inggris;
        $rerata = $avg/3;

        $input['id_siswa'] = $id_siswa;
        $input['id_guru'] = $id_guru;
        $input['mtk'] = $mtk;
        $input['b_indo'] = $indo;
        $input['b_inggris'] = $inggris;
        $input['rerata'] = $rerata;

        $this->useradmin->input_data($input,'nilai');
    }

    public function data_nilai(){
        $data['headertitle'] = 'Data Nilai';
        $data['menu'] = 'data_nilai';
        $data['menu_induk'] = 'nilai';

        $this->load->view('admin/nilai/v_datanilai', $data);
    }

    public function get_nilai(){

        $status = $this->input->post('status');
        $orderby = $this->input->post('orderby');
        $ordertype = $this->input->post('ordertype');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;

        if (empty($orderby)) {
            $orderby = 'id_siswa';
        }
        if ($orderby=="mtk") {
            $orderby = 'mtk';
        }
        if ($orderby=="indo") {
            $orderby = 'b_indo';
        }
        if ($orderby=="inggris") {
            $orderby = 'b_inggris';
        }
        if ($orderby=="rerata") {
            $orderby = 'rerata';
        }

        if (empty($status)){
            $where = NULL;
        }elseif ($status=='A') {
            $where['rerata'] = '80';
        }elseif ($status=='B') {
            $where['rerata'] = '90' ;
        }

        if ($ordertype=='terbesar') {
            $ordertype = 'DESC';
        }
        if ($ordertype=='terkecil') {
            $ordertype = 'ASC';
        }

        if (!empty($cari)) {
            $like = NULL;
        }
        else {
            $like = NULL;
        }

        $data['list_nilai'] = $this->useradmin->get_data_cond($where,$like,$orderby,$ordertype,$offset,$dataPerPage,'nilai')->result();
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('admin/nilai/tabel_nilai', $data);    
    }

    public function paging_nilai(){
        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        if (!empty($cari)) {
            $like = NULL;
            $where = NULL;
        }
        else {
            $like = NULL;
            $like2 = NULL;
            $where = NULL;
        }
        $jumData = $this->useradmin->get_paging_cond($where,$like,'nilai')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('admin/nilai/paging_nilai', $data);
    }

    public function edit_nilai($id=NULL){
        if(empty($id)){
            redirect('tools/data_nilai');
        }
        else{
            $id_guru_baru = $this->session->userdata('idadmin');
            $where['id'] = $id;

            $cek = $this->useradmin->get_data_where($where,'nilai')->row();

            $data['headertitle'] = 'Edit Data Nilai';
            $data['menu_induk'] = '';
            $data['menu'] = '';

            $id_siswa = $cek->id_siswa;

            $data['id'] = $id;
            $data['id_siswa'] = $id_siswa;
            $data['id_guru'] = $cek->id_guru;
            $data['mtk'] = $cek->mtk;
            $data['indo'] = $cek->b_indo;
            $data['inggris'] = $cek->b_inggris;
            $data['id_guru_baru'] = $id_guru_baru;

            $where2['id'] = $id_siswa; 

            $cek_siswa = $this->useradmin->get_data_where($where2,'siswa')->row();
            $data['nama'] = $cek_siswa->nama;
            $data['nisn'] = $cek_siswa->nisn;
            $data['kelas'] = $cek_siswa->kelas;
        
            $this->load->view('admin/nilai/v_editnilai',$data);
        }
    }

    public function update_nilai(){
    
        $id = $this->input->post('id');
        $id_siswa = $this->input->post('id_siswa');
        $id_guru_lama = $this->input->post('id_guru_lama');
        $id_guru_baru = $this->input->post('id_guru_baru');
        $mtk = $this->input->post('mtk');
        $indo = $this->input->post('indo');
        $inggris = $this->input->post('inggris');

        $id_guru_comb = $id_guru_lama.'-'.$id_guru_baru;
        $avg = $mtk+$indo+$inggris;
        $rerata = $avg/3; 
        
        $where['id'] = $id;

        $update['id_siswa'] = $id_siswa;
        $update['id_guru'] = $id_guru_comb;
        $update['mtk'] = $mtk;
        $update['b_indo'] = $indo;
        $update['b_inggris'] = $inggris;
        $update['rerata'] = $rerata;

        $this->useradmin->update_data($where,$update,'nilai');
    }

    public function delete_nilai(){
        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->useradmin->delete_data($where,'nilai');
    }


    //==========================Slider=========================
    public function setting_slider(){
        $data['headertitle'] = 'Setting Slider';
        $data['menu'] = 'setting_slider';
        $data['menu_induk'] = 'tools';

        $this->load->view('admin/slider/v_inputslider',$data);
    }

    public function simpan_slider(){

        $judul = $this->input->post('judul');
        $status = $this->input->post('status');

        if(!empty($_FILES['picture']['name'])){

            $config['upload_path']   = './images/slider/';
            $config['allowed_types'] = 'jpg|jpeg|gif|png';
            $config['max_size'] = 5000;
            $newname = pathinfo($_FILES['picture']['name'], PATHINFO_FILENAME);
            $newname = str_replace(',', '_', $newname);
            $newname = str_replace('.', '_', $newname);
            $newname = str_replace('"', '_', $newname);
            $newname = str_replace("'", "_", $newname);
            $newname = str_replace(' ', '_', $newname);
            $config['file_name'] = $newname;

            if (!is_dir($config['upload_path'])) {
                    mkdir($config['upload_path'], 0777, TRUE);
            }

            $this->load->library('upload', $config);
                 
            if ( ! $this->upload->do_upload('picture')){
                $response['pesan'] = '<div class="alert alert-danger" role="alert">Gagal Upload! '.$this->upload->display_errors();'! </div>';
                $response['status'] = "gagal";
                echo json_encode($response);
                exit();
            }
            else{
                $upload_data = $this->upload->data();
                $picture_name = $upload_data['file_name'];

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                                 
                /* setelah diresize kita buat thumbnailnya */
                $conf['image_library'] = 'gd2';
                $conf['source_image'] = './images/slider/'.$picture_name;
                $conf['new_image'] = './images/slider_thumb/'.$picture_name;
                $conf['create_thumb'] = TRUE;
                $conf['maintain_ratio'] = TRUE;
                $conf['width'] = 1500;
                //$conf['height'] = 108;
                                 
                $this->load->library('image_lib', $conf);
                $this->image_lib->initialize($conf);
                $this->image_lib->resize();
            }

            $input['judul']=$judul;
            $input['picture']=$picture_name;
            $input['status']=$status;

            $this->useradmin->input_data($input,'web_slider');
            $response['pesan'] = '<div class="alert alert-success" role="alert">Berhasil Upload Slider!</div>';
            $response['status'] = "sukses";
        }
        echo json_encode($response);
    }

    public function data_slider(){
        $data['headertitle'] = 'Data Slider';
        $data['menu'] = 'data_slider';
        $data['menu_induk'] = 'tools';

        $this->load->view('admin/slider/v_dataslider',$data);
    }

    public function get_slider(){

        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 5;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;

        if (empty($status)) {
            $where = NULL;
        }
        if ($status=="1") {
            $where['status'] = 1;
        }
        if ($status=="0") {
            $where['status'] = 0;
        }
        
        if (!empty($cari)) {
            $like['judul'] = $cari;
        }
        else {
            $like = NULL;
        }

        $data['list_slider'] = $this->useradmin->get_data_cond($where,$like,'id','ASC',$offset,$dataPerPage,'web_slider')->result();
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('admin/slider/tabel_slider', $data);
    } 

     public function paging_slider(){
        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 5;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        if (empty($status)) {
            $where = NULL;
        }
        if ($status=="1") {
            $where['status'] = 1;
        }
        if ($status=="0") {
            $where['status'] = 0;
        }
        
        if (!empty($cari)) {
            $like['judul'] = $cari;
        }
        else {
            $like = NULL;
        }

        $jumData = $this->useradmin->get_paging_cond($where,$like,'web_slider')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('admin/slider/paging_slider', $data);
    }

    public function delete_slider(){

        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->useradmin->delete_data($where,'web_slider');
    }

    public function ubah_slider(){

        $id = $this->input->post('id');
        $status = $this->input->post('status');

        $where['id'] = $id;

        if ($status==1) {
            $status = 0;
        }else{
            $status = 1;
        }

        $update['status'] = $status;

        $this->useradmin->update_data($where,$update,'web_slider');
    } 
}