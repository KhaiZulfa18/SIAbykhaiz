$('#btnsimpan').click(function(){
	simpan_data();
});

function simpan_data(){

	$('#attention').html('<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>');

	var base_url = $('#base_url').val();
	var nama = $('#nama').val();
	var username = $('#username').val();
	var password = $('#password').val();
	var email = $('#email').val();
	var telepon = $('#telepon').val();
	var jk = $('#jk').val();
	var alamat = $('#alamat').val();
	var nip = $('#nip').val();	
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
	if(password.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Password Belum Diisi</div>');
		return false;
	}
	if(email.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Email Belum Diisi</div>');
		return false;
	}
	if(nip.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! NIP Belum Diisi</div>');
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'akademik/simpan_admin',
        	data : {
        		nama:nama,
        		username:username,
        		password:password,
        		email:email,
        		telepon:telepon,
        		jk:jk,
        		alamat:alamat,
        		nip:nip,
        		tgl_lahir:tgl_lahir
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
	$('#username').val('');
	$('#password').val('');
	$('#email').val('');
	$('#telepon').val('');
	$('#alamat').val('');
	$('#jk').val('');
	$('#nip').val('');
	$('#tgl_lahir').val('');
}