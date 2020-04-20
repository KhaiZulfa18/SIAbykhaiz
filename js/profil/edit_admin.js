$('#btnedit').click(function(){
	edit();
});

function edit(){

	var id = $('#id').val();
	var base_url = $('#base_url').val();
	var nama = $('#nama').val();
	var username = $('#username').val();
	var nip = $('#nip').val();
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
	if(username.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Username Belum Diisi</div>');
		return false;
	}
	if(nip.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! NIP Belum Diisi</div>');
		return false;
	}
	if(email.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Email Belum Diisi</div>');
		return false;
	}
	if(telepon.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Nomer Telepon Belum Diisi</div>');
		return false;
	}
	if(alamat.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Alamat Belum Diisi<div class="alert alert-danger" role="alert">');
		return false;
	}
	if(jk.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Silahkan Pilih Jenis Kelamin</div>');
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'akademik/update_admin',
			data : {
				id:id,
				nama:nama,
        		username:username,
        		nip:nip,
        		email:email,
        		telepon:telepon,
        		jk:jk,
        		alamat:alamat,
        		tgl_lahir:tgl_lahir
        	},
			success	: function(response){
				if(response.status=='gagal'){
					$('#attention').html(response.pesan);
				}
				else{
					$('#attention').html(response.pesan);
					back();
            	}
			}
		});
	}
}
$('#btnback').click(function() {
	back();
});

function back(){
	var base_url = $('#base_url').val();
	var id = $('#id').val();

	window.location.assign(base_url+"akademik/profiladmin");
}