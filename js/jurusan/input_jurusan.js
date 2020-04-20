$('#btnsimpan').click(function(){
	simpan_data();
});

function simpan_data(){

	$('#attention').html('<div class="alert alert-success" role="alert">Data Berhasil Disimpan!</div>');

	var base_url = $('#base_url').val();
	var jurusan = $('#jurusan').val();
	var singkatan = $('#singkatan').val();
	var kejuruan = $('#kejuruan').val();	

	var lanjut = true;

	if(jurusan.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Nama Jurusan Belum Diisi</div>');
		return false;
	}
	if(singkatan.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Singkatan Belum Diisi</div>');
		return false;
	}
	if(kejuruan.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Kejuruan Belum Diisi</div>');
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'akademik/simpan_jurusan',
        	data : {
        		jurusan:jurusan,
        		singkatan:singkatan,
        		kejuruan:kejuruan
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
	
	$('#jurusan').val('');
	$('#singkatan').val('');
	$('#kejuruan').val('');
}