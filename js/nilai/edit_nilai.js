$('#btnedit').click(function(){
	edit();
});

function edit(){

	var base_url = $('#base_url').val();
	var id = $('#id').val();
	var id_siswa = $('#id_siswa').val();
	var id_guru_lama = $('#id_guru_lama').val();
	var id_guru_baru = $('#id_guru_baru').val();
	var mtk = $('#mtk').val();
	var indo = $('#indo').val();
	var inggris = $('#inggris').val();

	var lanjut = true;

	if(id_siswa.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Terjadi Kesalahan</div>');
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'tools/update_nilai',
			data : {
				id:id,
				id_siswa:id_siswa,
        		id_guru_lama:id_guru_lama,
        		id_guru_baru:id_guru_baru,
        		mtk:mtk,
        		indo:indo,
        		inggris:inggris
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

	window.location.assign(base_url+"tools/data_nilai");
}