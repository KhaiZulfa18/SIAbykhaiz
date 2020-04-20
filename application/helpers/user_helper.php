<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Fungsi ubah format tanggal
if ( !function_exists('format_tanggal') ) {
	
	function format_tanggal($tgl){
		if (!empty($tgl)) {
			$pecah = explode('-', $tgl);
			$hasil = $pecah[2].'-'.$pecah[1].'-'.$pecah[0];

			return $hasil;
		}
	}

}

// Fungsi ambil nama paket member berdasar id paket
if ( !function_exists('nama_paket_member') ) {

	function nama_paket_member($idpaket){
		$CI =& get_instance();

		$where = array('id' => $idpaket);
		$table = 'paket_member';

		$cek = $CI->useradmin->get_data_where($where,$table);
		$jml = $cek->num_rows();
		if($jml==0) {
			$nama = '';
		}
		else {
			$rec = $cek->row();
			$nama = $rec->jenis;
		}
		return $nama;
	}

}

//Fungsi Mengecek id member
if ( !function_exists('cek_idmember') ) {

	function cek_idmember($idmember){
		$CI =& get_instance();

		$where = array('id_member' => $idmember);
		$table = 'send_email_tmp';

		$cek = $CI->useradmin->get_data_where($where,$table);
		$jml = $cek->num_rows();
		if($jml==0) {
			$id = 0;
		}
		else {
			$id = 1;
		}
		return $id;
	}

}

//cek pembayaran po buku
if ( !function_exists('cek_pembayaran') ) {

	function cek_pembayaran($id){
		$CI =& get_instance();

		$where = array('id' => $id);
		$table = 'pre_order_buku';

		$cek = $CI->useradmin->get_data_where($where,$table);
		$jml = $cek->num_rows();
		if($jml==0) {
			$id = 0;
		}
		else {
			$id = 1;
		}
		return $id;
	}

}

// Fungsi format angka ke rupiah
if ( !function_exists('format_rupiah') ) {

    function format_rupiah($angka){
        $rupiah = number_format($angka,0,',','.');
        return $rupiah;
    }

}

// Fungsi ubah format tanggal Indonesia
if ( !function_exists('format_tanggal_indo') ) {
	
	function format_tanggal_indo($tgllengkap){
		if (!empty($tgllengkap)) {
			$pecah = explode(' ', $tgllengkap);
			$tanggal = $pecah[0];
			//$jam = $pecah[1];

			$BulanIndo = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
			$tahun = substr($tanggal, 0, 4);
			$bulan = substr($tanggal, 5, 2);
			$tgl   = substr($tanggal, 8, 2);
 
			$hasil = $tgl.' '.$BulanIndo[(int)$bulan].' '.$tahun;//.', '.$jam;

			return $hasil;
		}
	}

}

if ( ! function_exists('tanggal_indonesia')) {
  	function tanggal_indonesia($tanggal) {
	    $ubahTanggal = gmdate($tanggal, time()+60*60*8);
	    $pecahTanggal = explode('-', $ubahTanggal);
	    $tanggal = $pecahTanggal[0];
	    $bulan = bulan_panjang($pecahTanggal[1]);
	    $tahun = $pecahTanggal[2];
	    return $tanggal.' '.$bulan.' '.$tahun;
  }
}

if ( ! function_exists('bulan_panjang')) {
  	function bulan_panjang($bulan) {
	    switch ($bulan) {
	    	case 1:
	        	return 'Januari';
	        	break;
	      	case 2:
	        	return 'Februari';
	        	break;
	      	case 3:
	        	return 'Maret';
	        	break;
	      	case 4:
	        	return 'April';
	        	break;
	      	case 5:
	        	return 'Mei';
	        	break;
	      	case 6:
	        	return 'Juni';
	        	break;
	      	case 7:
	        	return 'Juli';
	        	break;
	      	case 8:
	        	return 'Agustus';
	        	break;
	      	case 9:
	        	return 'September';
	        	break;
	      	case 10:
	        	return 'Oktober';
	        	break;
	      	case 11:
	        	return 'November';
	        	break;
	      	case 12:
	        	return 'Desember';
	        	break;
    }
  }
}

if ( !function_exists('cek_nilai') ) {

	function cek_nilai($id){
		$CI =& get_instance();

		$where = array('id_siswa' => $id);
		$table = 'nilai';

		$cek = $CI->useradmin->get_data_where($where,$table);
		$jml = $cek->num_rows();
		if($jml==0) {
			$cek = 0;
		}
		else {
			$cek = 1;
		}
		return $cek;
	}
}

if ( !function_exists('cek_nilai_status') ) {

	function cek_nilai_status($rerata){
		$CI =& get_instance();

		$jml = $rerata;
		if($jml>=90) {
			$status = 'A';
		}elseif ($jml>=80){
			$status = 'B';
		}elseif ($jml>=70){
			$status = 'C';
		}else{
			$status = 'D';
		}

		return $status;
	}
}

if ( !function_exists('nama_siswa')) {
	function nama_siswa ($id_siswa){
		$CI =& get_instance();

		$where['id']=$id_siswa;

		$cek = $CI->useradmin->get_data_where($where,'siswa')->row();
		$nama_siswa = $cek->nama;
		
		return $nama_siswa;
	}
}

if ( !function_exists('nisn_siswa')) {
	function nisn_siswa ($id_siswa){
		$CI =& get_instance();

		$where['id']=$id_siswa;

		$cek = $CI->useradmin->get_data_where($where,'siswa')->row();
		$nisn_siswa = $cek->nisn;
		
		return $nisn_siswa;

	}
}

if ( !function_exists('ketua_kejuruan')) {
	function ketua_kejuruan ($id_kejuruan){
		$CI =& get_instance();

		$where['id']=$id_kejuruan;

		$cek = $CI->useradmin->get_data_where($where,'guru')->row();

		if (empty($cek)) {
			$ketua_kejuruan = "-";
		}else{
			$ketua_kejuruan = $cek->nama;
		}

		return $ketua_kejuruan;

	}
}

if ( !function_exists('cek_jurusan')) {
	function cek_jurusan ($id_jurusan){
		$CI =& get_instance();

		$where['id']=$id_jurusan;

		$cek = $CI->useradmin->get_data_where($where,'jurusan')->row();

		if (empty($cek)) {
			$jurusan = "-";
		}else{
			$jurusan = $cek->nama;
		}

		return $jurusan;
	}
}

if ( !function_exists('cek_walikelas')) {
	function cek_walikelas ($id_walikelas){
		$CI =& get_instance();

		$where['id']=$id_walikelas;

		$cek = $CI->useradmin->get_data_where($where,'guru')->row();

		if (empty($cek)) {
			$wali_kelas = "-";
		}else{
			$wali_kelas = $cek->nama;
		}

		return $wali_kelas;

	}
}

if ( !function_exists('cek_kelas')) {
	function cek_kelas ($id_kelas){
		$CI =& get_instance();

		$where['id']=$id_kelas;

		$cek = $CI->useradmin->get_data_where($where,'kelas')->row();
		if (empty($cek)) {
			$kelas = "-";
		}else{
			$kelas = $cek->nama;
		}		

		return $kelas;
	}
}

