$('#btnedit').click(function(){
	edit();
});

function edit(){

	var id = $('#id').val();
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
			url  : base_url+'akademik/update_siswa',
			data : {
				id:id,
				nama:nama,
        		kelas:kelas,
        		nisn:nisn,
        		email:email,
        		telepon:telepon,
        		jk:jk,
        		alamat:alamat,
        		tgl_lahir:tgl_lahir
        	},
			success	: function(response){
				back();
			}
		});
	}
}
$('#btnback').click(function() {
	back();
});

function back(){
	var base_url = $('#base_url').val();

	window.location.assign(base_url+"akademik/data_siswa");
}