$('#btnsimpan').click(function(){
	simpan_data();
});

function simpan_data(){

	$('#attention').html('<div class="alert alert-success" role="alert">Berhasil Menambah Nilai!</div>');

	var base_url = $('#base_url').val();
	var id_siswa = $('#id_siswa').val();
	var id_guru = $('#id_guru').val();
	var mtk = $('#mtk').val();
	var indo = $('#indo').val();
	var inggris = $('#inggris').val();

	var lanjut = true;

	if(id_siswa.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Terjadi Kesalahan</div>');
		return false;
	}
	if(id_guru.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Terjadi Kesalahan</div>');
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'tools/simpan_nilai',
        	data : {
        		id_siswa:id_siswa,
        		id_guru:id_guru,
        		mtk:mtk,
        		indo:indo,
        		inggris:inggris
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
	$('#mtk').val('');
	$('#inggris').val('');
	$('#indo').val('');
}
