<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {

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

	// Jika sudah login / Tampil halaman beranda
	public function index(){
		redirect('akademik/home');
	}

	// Tampil halaman home
	public function home(){

        $guru = $this->useradmin->get_data('id','ASC','guru')->num_rows();
        $admin = $this->useradmin->get_data('id','ASC','admin')->num_rows();
        $kelas = $this->useradmin->get_data('id','ASC','kelas')->num_rows();
        $siswa = $this->useradmin->get_data('id','ASC','siswa')->num_rows();
        $jurusan = $this->useradmin->get_data('id','ASC','jurusan')->num_rows();

        $where['gender'] = 'Perempuan';
        $siswa_pr = $this->useradmin->get_gen_siswa($where)->num_rows();
        $where1['gender'] = 'Laki-laki';
        $siswa_lk = $this->useradmin->get_gen_siswa($where1)->num_rows();

        $data['siswa_pr'] = $siswa_pr;
        $data['siswa_lk'] = $siswa_lk;
        $data['siswa'] = $siswa;
        $data['kelas'] = $kelas;
        $data['guru'] = $guru;
        $data['admin'] = $admin;
        $data['jurusan'] = $jurusan;
		$data['headertitle'] = 'Home';
		$data['menu'] = 'home';
		$data['menu_induk'] = 'beranda';
		$this->load->view('admin/home/view_home', $data);
	}

	// ==================GURU=================

	public function inputguru(){
		$data['headertitle'] = 'Input Guru';
		$data['menu'] = 'input_guru';
		$data['menu_induk'] = 'guru';
        
		$this->load->view('admin/guru/v_inputguru', $data);		
	}

    public function simpan_guru(){
        $this->load->model('useradmin');

        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $jk = $this->input->post('jk');
        $alamat = $this->input->post('alamat');
        $nip = $this->input->post('nip');   
        $tgl_lahir = $this->input->post('tgl_lahir');

        $id_guru = 'GR-'.$nip;
        $lvl = 2;

        $input['nama'] = $nama;
        $input['id_guru'] = $id_guru;
        $input['username'] = $username;
        $input['password'] = $password;
        $input['nip'] = $nip;
        $input['email'] = $email;
        $input['telepon'] = $telepon;
        $input['gender'] = $jk;
        $input['tgl_lahir'] = $tgl_lahir;
        $input['alamat'] = $alamat;
        $input['level'] = $lvl;
        $this->useradmin->input_data($input,'guru');
    }

    Public function data_guru(){
        $data['headertitle'] = 'Data Guru';
        $data['menu'] = 'data_guru';
        $data['menu_induk'] = 'guru';
        $this->load->view('admin/guru/v_dataguru', $data);      
    }

     public function get_guru(){
        $this->load->model('useradmin');

        $gender = $this->input->post('gender');
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

        
        if ($gender==NULL) {
            $where = NULL;
        }
        if ($gender=="L") {
            $where['gender'] = 'Laki-laki';
        }
        if ($gender=="P") {
            $where['gender'] = 'Perempuan';
        }
        if (!empty($cari)) {
            $like['nama'] = $cari;
        }
        else {
            $like = NULL;
        }
        $data['list_guru'] = $this->useradmin->get_data_cond($where,$like,'id','ASC',$offset,$dataPerPage,'guru')->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('admin/guru/tabel_guru', $data);
    }  

    public function paging_guru(){
        $gender = $this->input->post('gender');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 5;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }

        if ($gender==NULL) {
            $where = NULL;
        }
        if ($gender=="L") {
            $where['gender'] = 'Laki-laki';
        }
        if ($gender=="P") {
            $where['gender'] = 'Perempuan';
        }
        if (!empty($cari)) {
            $like['nama'] = $cari;
        }
        else {
            $like = NULL;
        }
        
        $jumData = $this->useradmin->get_paging_cond($where,$like,'guru')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('admin/guru/paging_guru', $data);
    }

    public function delete_guru(){
        $this->load->model("useradmin");

        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->useradmin->delete_data($where,'guru');
    }


    // ================ADMIN================
    public function inputadmin(){
        $data['headertitle'] = 'Input Admin';
        $data['menu'] = 'input_admin';
        $data['menu_induk'] = 'admin';
        
        $this->load->view('admin/admintu/v_inputadmin', $data);     
    }

    public function simpan_admin(){
        $this->load->model('useradmin');

        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $jk = $this->input->post('jk');
        $alamat = $this->input->post('alamat');
        $nip = $this->input->post('nip'); 
        $tgl_lahir = $this->input->post('tgl_lahir');  

        $id_admin = 'ADM-'.$nip;
        $lvl = 1;

        $input['nama'] = $nama;
        $input['id_admin'] = $id_admin;
        $input['username'] = $username;
        $input['password'] = $password;
        $input['nip'] = $nip;
        $input['email'] = $email;
        $input['telepon'] = $telepon;
        $input['gender'] = $jk;
        $input['tgl_lahir'] = $tgl_lahir;
        $input['alamat'] = $alamat;
        $input['level'] = $lvl;
        $this->useradmin->input_data($input,'admin');
    }

    Public function data_admin(){
        $data['headertitle'] = 'Data Admin TU';
        $data['menu'] = 'data_admin';
        $data['menu_induk'] = 'admin';
        $this->load->view('admin/admintu/v_dataadmin', $data);      
    }

     public function get_admin(){
        $this->load->model('useradmin');

        $gender = $this->input->post('gender');
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

        
        if ($gender==NULL) {
            $where = NULL;
        }
        if ($gender=="L") {
            $where['gender'] = 'Laki-laki';
        }
        if ($gender=="P") {
            $where['gender'] = 'Perempuan';
        }
        if (!empty($cari)) {
            $like['nama'] = $cari;
        }
        else {
            $like = NULL;
        }
        $data['list_admin'] = $this->useradmin->get_data_cond($where,$like,'id','ASC',$offset,$dataPerPage,'admin')->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('admin/admintu/tabel_admin', $data);
    }  

    public function delete_admin(){
        $this->load->model("useradmin");

        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->useradmin->delete_data($where,'admin');
    }

    public function paging_admin(){
        $gender = $this->input->post('gender');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 5;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }

        if ($gender==NULL) {
            $where = NULL;
        }
        if ($gender=="L") {
            $where['gender'] = 'Laki-laki';
        }
        if ($gender=="P") {
            $where['gender'] = 'Perempuan';
        }
        if (!empty($cari)) {
            $like['nama'] = $cari;
        }
        if (!empty($cari)) {
            $like['nama'] = $cari;
        }
        else {
            $like = NULL;
        }
        //$jumData = $this->useradmin->get_paging_member($idpaket,$carimember)->num_rows();
        $jumData = $this->useradmin->get_paging_cond($where,$like,'admin')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('admin/admintu/paging_admin', $data);
    }


    //===============KELAS================
    public function inputkelas(){

        $data['listguru'] = $this->useradmin->get_data('nama','ASC','guru')->result();
        $data['listjurusan'] = $this->useradmin->get_data('nama','ASC','jurusan')->result();
        $data['headertitle'] = 'Tambah Kelas';
        $data['menu'] = 'input_kelas';
        $data['menu_induk'] = 'kelas';

        
        $this->load->view('admin/kelas/v_inputkelas', $data);     
    }

    public function simpan_kelas(){
        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');
        $jurusan = $this->input->post('jurusan');
        $walikelas = $this->input->post('walikelas');

        $idkls = 'KLS'.$nama;
        $idkelas = str_replace(' ', '', $idkls);
        $idkelas = strtolower($idkelas);

        $input['id_kelas'] = $idkelas;
        $input['nama'] = $nama;
        $input['kelas'] = $kelas;
        $input['jurusan'] = $jurusan;
        $input['wali_kelas'] = $walikelas;
        $this->useradmin->input_data($input,'kelas');   
    }

    public function data_kelas(){

        $data['headertitle'] = 'Data Kelas';
        $data['menu'] = 'data_kelas';
        $data['menu_induk'] = 'kelas';

        
        $this->load->view('admin/kelas/v_datakelas', $data);     
    }

    public function get_kelas(){

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
        $offset = ($noPage - 1) * $dataPerPage;

        if (empty($status)) {
            $where = NULL;
        }
        if ($status=="10") {
            $where['kelas'] = '10';
        }
        if ($status=="11") {
            $where['kelas'] = '11';
        }
        if ($status=="12") {
            $where['kelas'] = '12';
        }
        if (!empty($cari)) {
            $like['nama'] = $cari;
        }
        else {
            $like = NULL;
        }
        $data['list_kelas'] = $this->useradmin->get_data_cond($where,$like,'nama','ASC',$offset,$dataPerPage,'kelas')->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('admin/kelas/tabel_kelas', $data);
    }  

     public function paging_kelas(){
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
        if (empty($status)) {
            $where = NULL;
        }
        if ($status=="10") {
            $where['kelas'] = '10';
        }
        if ($status=="11") {
            $where['kelas'] = '11';
        }
        if ($status=="12") {
            $where['kelas'] = '12';
        }
        if (!empty($cari)) {
            $like['nama'] = $cari;
        }
        else {
            $like = NULL;
        }
        $jumData = $this->useradmin->get_paging_cond($where,$like,'kelas')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('admin/kelas/paging_kelas', $data);
    }

    public function delete_kelas(){
        $this->load->model("useradmin");

        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->useradmin->delete_data($where,'kelas');
    }

    public function edit_kelas($id=NULL){
        if(empty($id)){
            redirect('akademik/data_kelas');
        }
        else{
            $where['id'] = $id;

            $cek = $this->useradmin->get_data_where($where,'kelas')->row();

            $data['headertitle'] = 'Edit Data Kelas';
            $data['menu_induk'] = '';
            $data['menu'] = '';

            $data['id'] = $id;
            $data['nama'] = $cek->nama;
            $data['kelas'] = $cek->kelas;
            $data['listjurusan'] = $this->useradmin->get_data('nama','ASC','jurusan')->result();
            $data['listguru'] = $this->useradmin->get_data('nama','ASC','guru')->result();
        
            $this->load->view('admin/kelas/v_editkelas',$data);
        }
    }

    public function update_kelas(){
    
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');
        $jurusan = $this->input->post('jurusan');
        $walikelas = $this->input->post('walikelas');

        $idkls = 'KLS'.$nama;
        $idkelas = str_replace(' ', '', $idkls);
        $idkelas = strtolower($idkelas);
        $where['id'] = $id;

        $update['id_kelas'] = $idkelas;
        $update['nama'] = $nama;
        $update['kelas'] = $kelas;
        $update['jurusan'] = $jurusan;
        $update['wali_kelas'] = $walikelas;
        $this->useradmin->update_data($where,$update,'kelas');
    }


    //=========== Data Siswa PerKelas ====================
     public function kelas($id_kelas=NULL){
        if(empty($id_kelas)){
            redirect('akademik/data_kelas');
        }
        else{
            $where['id_kelas'] = $id_kelas;
            $cek = $this->useradmin->get_data_where($where,'kelas')->row();

            $data['headertitle'] = 'Kelas '.$cek->nama;
            $data['menu'] = 'data_siswa';
            $data['menu_induk'] = 'siswa';
            $data['kelas'] = $cek->nama;
            $data['idkelas'] = $cek->id;
        
            $this->load->view('admin/kelas/v_kelas', $data);
        }
    }

    public function data_siswa_perkelas(){

        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $idkelas = $this->input->post('idkelas');

        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;

        if (!empty($cari)) {
            $like['nama'] = $cari;
        }
        else {
            $like = NULL;
        }

        $where['kelas'] = $idkelas;

        $data['list_siswa'] = $this->useradmin->get_data_cond($where,$like,'nama','ASC',$offset,$dataPerPage,'siswa')->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('admin/siswa/tabel_siswa', $data);
    }  

     public function paging_siswa_perkelas(){
        $status = $this->input->post('status');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $idkelas = $this->input->post('idkelas');

        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        if (!empty($cari)) {
            $like['nama'] = $cari;
        }
        else {
            $like = NULL;
        }

        $where['kelas'] = $idkelas;

        $jumData = $this->useradmin->get_paging_cond($where,$like,'siswa')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('admin/kelas/paging_kelas', $data);
    }


    //==============SISWA============
    public function inputsiswa(){

        $data['listkelas'] = $this->useradmin->get_data('nama','ASC','kelas')->result();
        $data['headertitle'] = 'Tambah Siswa';
        $data['menu'] = 'input_siswa';
        $data['menu_induk'] = 'siswa';

        $this->load->view('admin/siswa/v_inputsiswa', $data);      
    }

    public function simpan_siswa(){
        $this->load->model('useradmin');

        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $jk = $this->input->post('jk');
        $alamat = $this->input->post('alamat');
        $nisn = $this->input->post('nisn');   

        $input['nama'] = $nama;
        $input['kelas'] = $kelas;
        $input['nisn'] = $nisn;
        $input['email'] = $email;
        $input['telepon'] = $telepon;
        $input['gender'] = $jk;
        $input['alamat'] = $alamat;
        $input['tgl_lahir'] = $tgl_lahir;
        $this->useradmin->input_data($input,'siswa');
    }

    public function data_siswa(){

        $kelas = $this->useradmin->get_data('nama','ASC','kelas')->result();

        $data['kelas'] = $kelas;
        $data['headertitle'] = 'Data Siswa';
        $data['menu'] = 'data_siswa';
        $data['menu_induk'] = 'siswa';
        
        $this->load->view('admin/siswa/v_datasiswa', $data);     
    }

    public function get_siswa(){

        $listkelas = $this->useradmin->get_data('nama','ASC','kelas')->result();

        $kelas = $this->input->post('kelas');
        $gender = $this->input->post('gender');
        $sort = $this->input->post('sort');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 10;
        //$namakelas = str_replace('_', ' ', $kelas);
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        $offset = ($noPage - 1) * $dataPerPage;

    
        if (empty($gender)) {
            $where = NULL;
        }
        if ($gender=="L") {
            $where['gender'] = 'Laki-laki';
        }
        if ($gender=="P") {
            $where['gender'] = 'Perempuan';
        }
        if (empty($sort)) {
            $sortby = 'id';
        }
        if ($sort=="nama") {
            $sortby = 'nama';
        }
        if ($sort=="kelas") {
            $sortby = 'kelas';
        }
        if ($sort=="nisn") {
            $sortby = 'nisn';
        }
        if (!empty($kelas)) {
            $like2['kelas'] = $kelas;
        }
        else{
            $like2 = NULL;
        }
        if (!empty($cari)) {
            $like['nama'] = $cari;
        }
        else {
            $like = NULL;
        }
        $data['list_siswa'] = $this->useradmin->get_data_cond($where,$like,$sortby,'ASC',$offset,$dataPerPage,'siswa')->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('admin/siswa/tabel_siswa', $data);
    }    

    public function paging_siswa(){
        $kelas = $this->input->post('kelas');
        $gender = $this->input->post('gender');
        $sort = $this->input->post('sort');
        $cari = $this->input->post('cari');
        $page = $this->input->post('page');
        $dataPerPage = 10;
        if(empty($page)) {
            $noPage = 1;
        }
        else {
            $noPage = $page;
        }
        if (empty($gender)) {
            $where = NULL;
        }
        if ($gender=="L") {
            $where['gender'] = 'Laki-laki';
        }
        if ($gender=="P") {
            $where['gender'] = 'Perempuan';
        }
        if (!empty($cari)) {
            $like['nama'] = $cari;
        }
        else {
            $like = NULL;
        }
        $jumData = $this->useradmin->get_paging_cond($where,$like,'siswa')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('admin/siswa/paging_siswa', $data);
    }

    public function delete_siswa(){
        $this->load->model("useradmin");

        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->useradmin->delete_data($where,'siswa');
    }

    public function edit_siswa($id=NULL){
        if(empty($id)){
            redirect('akademik/data_siswa');
        }
        else{
            $where['id'] = $id;

            $cek = $this->useradmin->get_data_where($where,'siswa')->row();

            $data['headertitle'] = 'Edit Data Siswa';
            $data['menu_induk'] = '';
            $data['menu'] = '';

            $data['id'] = $id;
            $data['nama'] = $cek->nama;
            $data['nisn'] = $cek->nisn;
            $data['email'] = $cek->email;
            $data['telepon'] = $cek->telepon;
            $data['gender'] = $cek->gender;
            $data['alamat'] = $cek->alamat;
            $data['tgl_lahir'] = $cek->tgl_lahir;
            $data['listkelas'] = $this->useradmin->get_data('nama','ASC','kelas')->result();
        
            $this->load->view('admin/siswa/v_editsiswa',$data);
        }
    }

    public function update_siswa(){
    
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');
        $nisn = $this->input->post('nisn');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $gender = $this->input->post('jk');
        $tgl_lahir = $this->input->post('tgl_lahir');

        $where['id'] = $id;

        $update['nama'] = $nama;
        $update['kelas'] = $kelas;
        $update['nisn'] = $nisn;
        $update['email'] = $email;
        $update['alamat'] = $alamat;
        $update['telepon'] = $telepon;
        $update['gender'] = $gender;
        $update['tgl_lahir'] = $tgl_lahir;

        $this->useradmin->update_data($where,$update,'siswa');
    }


    //=======================Jurusan========================
    public function input_jurusan(){

        $data['listguru'] = $this->useradmin->get_data('nama','ASC','guru')->result();
        $data['headertitle'] = 'Tambah Jurusan';
        $data['menu'] = 'input_jurusan';
        $data['menu_induk'] = 'jurusan';

        $this->load->view('admin/jurusan/v_inputjurusan', $data);
    }

    public function simpan_jurusan(){
        
        $jurusan = $this->input->post('jurusan');
        $singkatan = $this->input->post('singkatan');
        $kejuruan = $this->input->post('kejuruan');

        $input['nama'] = $jurusan;
        $input['singkatan'] = $singkatan;
        $input['kejuruan'] = $kejuruan;
        $this->useradmin->input_data($input,'jurusan');      
    }

    public function data_jurusan(){

        $data['headertitle'] = 'Data Jurusan';
        $data['menu'] = 'data_jurusan';
        $data['menu_induk'] = 'jurusan';

        
        $this->load->view('admin/jurusan/v_datajurusan', $data);     
    }

    public function get_jurusan(){

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
        $offset = ($noPage - 1) * $dataPerPage;

        if (!empty($cari)) {
            $like['nama'] = $cari;
            $where = NULL;
        }
        else {
            $like = NULL;
            $where = NULL;
        }
        $data['list_jurusan'] = $this->useradmin->get_data_cond($where,$like,'nama','ASC',$offset,$dataPerPage,'jurusan')->result();
    
        $data['noPage'] = $noPage;
        $data['offset'] = $offset;

        $this->load->view('admin/jurusan/tabel_jurusan', $data);
    }  

     public function paging_jurusan(){
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
            $where = NULL;
        }
        else {
            $like = NULL;
            $where = NULL;
        }
        $jumData = $this->useradmin->get_paging_cond($where,$like,'jurusan')->num_rows();
        $data['jumData'] = $jumData;
        $data['jumPage'] = ceil($jumData/$dataPerPage);
        $data['noPage'] = $noPage;

        $this->load->view('admin/jurusan/paging_jurusan', $data);
    }

    public function delete_jurusan(){
        $this->load->model("useradmin");

        $id = $this->input->post('id');
        $where['id'] = $id;

        $this->useradmin->delete_data($where,'jurusan');
    }

    public function edit_jurusan($id=NULL){
        if(empty($id)){
            redirect('akademik/data_jurusan');
        }
        else{
            $where['id'] = $id;

            $cek = $this->useradmin->get_data_where($where,'jurusan')->row();

            $data['headertitle'] = 'Edit Data Jurusan';
            $data['menu_induk'] = '';
            $data['menu'] = '';

            $data['id'] = $id;
            $data['jurusan'] = $cek->nama;
            $data['singkatan'] = $cek->singkatan;
            $data['kejuruan'] = $cek->kejuruan;
            $data['listguru'] = $this->useradmin->get_data('nama','ASC','guru')->result();
        
            $this->load->view('admin/jurusan/v_editjurusan',$data);
        }
    }

     public function update_jurusan(){
    
        $id = $this->input->post('id');
        $jurusan = $this->input->post('jurusan');
        $singkatan = $this->input->post('singkatan');
        $kejuruan = $this->input->post('kejuruan');

        $where['id'] = $id;

        $update['nama'] = $jurusan;
        $update['singkatan'] = $singkatan;
        $update['kejuruan'] = $kejuruan;
        $this->useradmin->update_data($where,$update,'jurusan');
    }



    //=======================Edit Profil====================
    public function profiladmin(){

        $user = $this->session->userdata('idadmin');

        if(empty($user)){
            redirect('akademik/home');
        }else{
            $this->load->helper('text');
            $data['headertitle'] = 'My Profil';
            $data['menu'] = '';
            $data['menu_induk'] = '';

            $where['id'] = $user;

            $cek = $this->useradmin->get_data_where($where,'admin')->row();

            $data['id'] = $user;
            $data['nama'] = $cek->nama;
            $data['username'] = $cek->username;
            $data['nip'] = $cek->nip;
            $data['email'] = $cek->email;
            $data['telepon'] = $cek->telepon;
            $data['gender'] = $cek->gender;
            $data['alamat'] = $cek->alamat;
            $data['tgl_lahir'] = $cek->tgl_lahir;

            $this->load->view('admin/profil/v_profiladmin', $data);
        }        
    }

    public function editprofiladmin(){
        $user = $this->session->userdata('idadmin');

        if(empty($user)){
            redirect('akademik/home');
        }else{
            $data['headertitle'] = 'Edit Profil';
            $data['menu'] = '';
            $data['menu_induk'] = '';

            $where['id'] = $user;

            $cek = $this->useradmin->get_data_where($where,'admin')->row();

            $data['id'] = $user;
            $data['nama'] = $cek->nama;
            $data['username'] = $cek->username;
            $data['nip'] = $cek->nip;
            $data['email'] = $cek->email;
            $data['telepon'] = $cek->telepon;
            $data['gender'] = $cek->gender;
            $data['alamat'] = $cek->alamat;
            $data['tgl_lahir'] = $cek->tgl_lahir;

            $this->load->view('admin/profil/v_editprofiladmin', $data);
        }   
    }

    public function update_admin(){
    
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $nip = $this->input->post('nip');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $gender = $this->input->post('jk');
        $tgl_lahir = $this->input->post('tgl_lahir');

        $id_admin = 'ADM-'.$nip;

        $where['id'] = $id;

        $update['nama'] = $nama;
        $update['username'] = $username;
        $update['id_admin'] = $id_admin;
        $update['nip'] = $nip;
        $update['email'] = $email;
        $update['alamat'] = $alamat;
        $update['telepon'] = $telepon;
        $update['gender'] = $gender;
        $update['tgl_lahir'] = $tgl_lahir;

        $this->useradmin->update_data($where,$update,'admin');
    }

    public function profilguru(){
        $user = $this->session->userdata('idadmin');

        if(empty($user)){
            redirect('akademik/home');
        }else{
            $data['headertitle'] = 'My Profil';
            $data['menu'] = '';
            $data['menu_induk'] = '';

            $where['id'] = $user;

            $cek = $this->useradmin->get_data_where($where,'guru')->row();

            $data['id'] = $user;
            $data['nama'] = $cek->nama;
            $data['username'] = $cek->username;
            $data['nip'] = $cek->nip;
            $data['email'] = $cek->email;
            $data['telepon'] = $cek->telepon;
            $data['gender'] = $cek->gender;
            $data['alamat'] = $cek->alamat;
            $data['tgl_lahir'] = $cek->tgl_lahir;

            $this->load->view('admin/profil/v_profilguru', $data);
        }        
    }

    //  ============PROFIL GURU============
    public function editprofilguru(){
        $user = $this->session->userdata('idadmin');

        if(empty($user)){
            redirect('akademik/home');
        }else{
            $data['headertitle'] = 'Edit Profil';
            $data['menu'] = '';
            $data['menu_induk'] = '';

            $where['id'] = $user;

            $cek = $this->useradmin->get_data_where($where,'guru')->row();

            $data['id'] = $user;
            $data['nama'] = $cek->nama;
            $data['username'] = $cek->username;
            $data['nip'] = $cek->nip;
            $data['email'] = $cek->email;
            $data['telepon'] = $cek->telepon;
            $data['gender'] = $cek->gender;
            $data['alamat'] = $cek->alamat;
            $data['tgl_lahir'] = $cek->tgl_lahir;

            $this->load->view('admin/profil/v_editprofilguru', $data);
        }   
    }

    public function update_guru(){
    
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $nip = $this->input->post('nip');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $telepon = $this->input->post('telepon');
        $gender = $this->input->post('jk');
        $tgl_lahir = $this->input->post('tgl_lahir');

        $id_guru = 'GR-'.$nip;

        $where['id'] = $id;

        $update['nama'] = $nama;
        $update['username'] = $username;
        $update['id_guru'] = $id_guru;
        $update['nip'] = $nip;
        $update['email'] = $email;
        $update['alamat'] = $alamat;
        $update['telepon'] = $telepon;
        $update['gender'] = $gender;
        $update['tgl_lahir'] = $tgl_lahir;

        $this->useradmin->update_data($where,$update,'guru');
    }

    public function ubahpasswordadmin(){
        $user = $this->session->userdata('idadmin');

        if(empty($user)){
            redirect('akademik/home');
        }else{
            $data['headertitle'] = 'Ubah Password';
            $data['menu'] = '';
            $data['menu_induk'] = '';

            $where['id'] = $user;

            $cek = $this->useradmin->get_data_where($where,'admin')->row();

            $data['id'] = $user;
            //$data['password'] = $cek->password;

            $this->load->view('admin/password/v_ubahpassword', $data);
        }   
    }

    public function update_passwordadmin(){
        
        $id = $this->input->post('id');
        //konfirmasi password baru
        $confirmpassword = $this->input->post('confirmpassword');
        //pasword baru
        $passwordbaru = $this->input->post('passwordbaru');
        //pasword sekarang
        $passwordlama = $this ->input->post('passwordlama');

        $where['id'] = $id;

        $cek = $this->useradmin->get_data_where($where,'admin')->row();
        $password = $cek->password;

        //mengecek pasword skrng sama dengan password di database
        if ($passwordlama!=$password) {
            //$this->session->userdata('message','<div class="alert alert-danger" role="alert">Password Anda Salah!</div>');
            $response['status'] = 'gagal';
            $response['pesan'] = '<div class="alert alert-danger" role="alert">Password Anda Salah!</div>';
            //redirect('akademik/ubahpasswordadmin');
        }else{
            //mengecek konfirmasi password benar
            if ($passwordbaru!=$confirmpassword) {
                    //$this->session->userdata('message','<div class="alert aert-danger" role="alert">Konfirmasi Password Salah!</div>');
                    $response['status'] = 'gagal';
                    $response['pesan'] = '<div class="alert alert-danger" role="alert">Konfirmasi Password Anda Salah!</div>';
                    //redirect('akademik/ubahpasswordadmin');
            }elseif ($password==$passwordbaru) {
                //$this->session->userdata('message','<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Sama Dengan Password Lama!</div>');
                    $response['status'] = 'gagal';
                    $response['pesan'] = '<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Sama Dengan Password Lama!</div>';
                   //redirect('akademik/ubahpasswordadmin');*/
            }
            else{
                //Password s
                $update['password'] = $passwordbaru;
                $this->useradmin->update_data($where,$update,'admin');

                //$this->session->userdata('message','<div class="alert alert-success" role="alert">Password Diubah!</div>');
                $response['status'] = 'gagal';
                $response['pesan'] = '<div class="alert alert-success" role="alert">Password Diubah!</div>';
                //redirect('akademik/ubahpasswordadmin');
            }
        }
        echo json_encode($response);
    }

    public function ubahpasswordguru(){
        $user = $this->session->userdata('idadmin');

        if(empty($user)){
            redirect('akademik/home');
        }else{
            $data['headertitle'] = 'Ubah Password';
            $data['menu'] = '';
            $data['menu_induk'] = '';

            $where['id'] = $user;

            $cek = $this->useradmin->get_data_where($where,'guru')->row();

            $data['id'] = $user;
            //$data['password'] = $cek->password;

            $this->load->view('admin/password/v_ubahpasswordguru', $data);
        }   
    }

    public function update_passwordguru(){
        
        $id = $this->input->post('id');
        //konfirmasi password baru
        $confirmpassword = $this->input->post('confirmpassword');
        //pasword baru
        $passwordbaru = $this->input->post('passwordbaru');
        //pasword sekarang
        $passwordlama = $this ->input->post('passwordlama');

        $where['id'] = $id;

        $cek = $this->useradmin->get_data_where($where,'guru')->row();
        $password = $cek->password;

        //mengecek pasword skrng sama dengan password di database
        if ($passwordlama!=$password) {
            //$this->session->userdata('message','<div class="alert alert-danger" role="alert">Password Anda Salah!</div>');
            $response['status'] = 'gagal';
            $response['pesan'] = '<div class="alert alert-danger" role="alert">Password Anda Salah!</div>';
            //redirect('akademik/ubahpasswordadmin');
        }else{
            //mengecek konfirmasi password benar
            if ($passwordbaru!=$confirmpassword) {
                    //$this->session->userdata('message','<div class="alert aert-danger" role="alert">Konfirmasi Password Salah!</div>');
                    $response['status'] = 'gagal';
                    $response['pesan'] = '<div class="alert alert-danger" role="alert">Konfirmasi Password Anda Salah!</div>';
                    //redirect('akademik/ubahpasswordadmin');
            }elseif ($password==$passwordbaru) {
                //$this->session->userdata('message','<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Sama Dengan Password Lama!</div>');
                    $response['status'] = 'gagal';
                    $response['pesan'] = '<div class="alert alert-danger" role="alert">Password Baru Tidak Boleh Sama Dengan Password Lama!</div>';
                   //redirect('akademik/ubahpasswordadmin');*/
            }
            else{
                //Password s
                $update['password'] = $passwordbaru;
                $this->useradmin->update_data($where,$update,'guru');

                //$this->session->userdata('message','<div class="alert alert-success" role="alert">Password Diubah!</div>');
                $response['status'] = 'gagal';
                $response['pesan'] = '<div class="alert alert-success" role="alert">Password Diubah!</div>';
                //redirect('akademik/ubahpasswordadmin');
            }
        }
        echo json_encode($response);
    }    
}