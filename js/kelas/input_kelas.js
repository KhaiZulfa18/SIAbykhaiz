$('#btnsimpan').click(function(){
	simpan_data();
});

function simpan_data(){

	$('#attention').html('<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>');

	var base_url = $('#base_url').val();
	var nama = $('#nama').val();
	var kelas = $('#kelas').val();
	var jurusan = $('#jurusan').val();
	var walikelas = $('#walikelas').val();	

	var lanjut = true;

	if(nama.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Nama Kelas Belum Diisi</div>');
		return false;
	}
	if(jurusan.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Jurusan Belum Diisi</div>');
		return false;
	}
	if(kelas.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Kelas Belum Diisi</div>');
		return false;
	}
	if(walikelas.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Wali Kelas Belum Diisi</div>');
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'akademik/simpan_kelas',
        	data : {
        		nama:nama,
        		kelas:kelas,
        		jurusan:jurusan,
        		walikelas:walikelas
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
	$('#jurusan').val('');
	$('#kelas').val('');
	$('#walikelas').val('');
}