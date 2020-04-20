$('#btnedit').click(function(){
	edit();
});

function edit(){

	var id = $('#id').val();
	var base_url = $('#base_url').val();
	var nama = $('#nama').val();
	var kelas = $('#kelas').val();
	var jurusan = $('#jurusan').val();
	var walikelas = $('#walikelas').val();

	var lanjut = true;

	if(nama.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Nama Belum Diisi</div>');
		return false;
	}
	if(jurusan.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Username Belum Diisi</div>');
		return false;
	}
	if(kelas.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Password Belum Diisi</div>');
		return false;
	}
	if(walikelas.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Email Belum Diisi</div>');
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'akademik/update_kelas',
			data : {
				id:id,
          		nama:nama,
        		kelas:kelas,
        		jurusan:jurusan,
        		walikelas:walikelas
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

	window.location.assign(base_url+"akademik/data_kelas");
}