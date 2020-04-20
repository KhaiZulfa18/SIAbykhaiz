<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginuser extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->helper('cookie');
        $this->load->model('useradmin');
    }

    public function index()
    {
    	redirect('loginuser/loginguru');
    }

	public function loginadmin()
	{
		$data['title'] = 'Login Admin';

		$this->load->view('loginuser/loginadmin/loginadmin',$data);
	}

	public function aksi_login()
	{
		$this->load->model('Useradmin');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$where['username'] = $username;
		$where['password'] = $password;
		/*$where = array(
			'username' => $username,
			'password' => md5($password)
			);*/
		$cek = $this->useradmin->cek_login($where,'admin');
		if($cek->num_rows() == 1){
					
                $cookie = array(
                        'name'   => 'cookie_tiket',
                        'value'  => $username,                            
                        'expire' => 1209600 //2 week
                        //'secure' => TRUE
                );
        	    set_cookie($cookie);

        	    $cekrows = $cek->row();
        	    $idadmin = $cekrows->id;
        	    $nama = $cekrows->nama;
        	    $level = $cekrows->level;
        	    $gender = $cekrows->gender;

			$data_session = array(
				'idadmin' => $idadmin,
				'level' => $level,
				'namaadmin' => $nama,
				'gender' => $gender, 
				'status' => "login"
			);
 
			$this->session->set_userdata($data_session);

			redirect('akademik/index');
		}
		else{
			$this->session->set_flashdata('error','Username dan Password Salah!');

			redirect('loginuser/loginadmin');
		}
	}

	public function logoutadmin()
	{
		$this->session->sess_destroy();
		delete_cookie('cookie_tiket');

		redirect('loginuser/loginadmin');
	}

	public function loginguru()
	{
		$data['title'] = 'Login Guru';

		$this->load->view('loginuser/loginguru/loginguru',$data);
	}

	public function aksi_login_guru()
	{
		$this->load->model('Useradmin');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$where['username'] = $username;
		$where['password'] = $password;
		/*$where = array(
			'username' => $username,
			'password' => md5($password)
			);*/
		$cek = $this->useradmin->cek_login($where,'guru');
		if($cek->num_rows() == 1){
					
                $cookie = array(
                        'name'   => 'cookie_tiket',
                        'value'  => $username,                            
                        'expire' => 1209600 //2 week
                        //'secure' => TRUE
                );
        	    set_cookie($cookie);

        	    $cekrows = $cek->row();
        	    $idadmin = $cekrows->id;
        	    $nama = $cekrows->nama;
        	    $level = $cekrows->level;
        	    $gender = $cekrows->gender;

			$data_session = array(
				'idadmin' => $idadmin,
				'level' => $level,
				'namaadmin' => $nama,
				'gender' => $gender,
				'status' => "login"
			);
 
			$this->session->set_userdata($data_session);

			redirect('akademik/index');
		}
		else{
			$this->session->set_flashdata('error','Username dan Password Salah!');

			redirect('loginuser/loginguru');
		}
	}

	public function logoutguru()
	{
		$this->session->sess_destroy();
		delete_cookie('cookie_tiket');

		redirect('loginuser/loginguru');
	}
}