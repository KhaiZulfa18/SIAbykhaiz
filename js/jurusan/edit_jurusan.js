$('#btnedit').click(function(){
	edit();
});

function edit(){

	var base_url = $('#base_url').val();
	var id = $('#id').val();
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
			url  : base_url+'akademik/update_jurusan',
        	data : {
        		id:id,
        		jurusan:jurusan,
        		singkatan:singkatan,
        		kejuruan:kejuruan
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

	window.location.assign(base_url+"akademik/data_jurusan");
}