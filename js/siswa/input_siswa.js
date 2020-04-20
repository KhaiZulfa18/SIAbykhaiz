$('#btnsimpan').click(function(){
	simpan_data();
});

function simpan_data(){

	$('#attention').html('<div class="alert alert-success" role="alert">Berhasil Menyimpan Data!</div>');

	var base_url = $('#base_url').val();
	var nama = $('#nama').val();
	var kelas = $('#kelas').val();
	var nisn = $('#nisn').val();
	var email = $('#email').val();
	var telepon = $('#telepon').val();
	var jk = $('#jk').val();
	var alamat = $('#alamat').val();
	var tgl_lahir = $('#tgl_lahir').val();

	var lanjut = true;

	if(nama.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Nama Belum Diisi</div>');
		return false;
	}
	if(kelas.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Silahkan Pilih Kelas</div>');
		return false;
	}
	if(email.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Email Belum Diisi</div>');
		return false;
	}
	if(nisn.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! NISN Belum Diisi</div>');
		return false;
	}
	if(alamat.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! alamat Belum Diisi</div>');
		return false;
	}
	if(jk.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Silahkan Pilih Jenis Kelamin</div>');
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'akademik/simpan_siswa',
        	data : {
        		nama:nama,
        		kelas:kelas,
        		nisn:nisn,
        		email:email,
        		telepon:telepon,
        		jk:jk,
        		alamat,alamat,
        		tgl_lahir, tgl_lahir
        	},
        	beforeSend: function (){
			$("#tabel-data").LoadingOverlay("show");
        	},
			success	: function(response){ 
				if(response.status=='gagal'){
					$('#attention').html(response.pesan);
				}
				else{
					$('#attention').html(response.pesan);
					clear_data();
            	}
			}
		});
	}
}

function clear_data(){
	$('#nama').val('');
	$('#kelas').val('');
	$('#tgl_lahir').val('');
	$('#email').val('');
	$('#telepon').val('');
	$('#alamat').val('');
	$('#jk').val('');
	$('#nisn').val('');

}