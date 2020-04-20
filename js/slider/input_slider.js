$('#btnsimpan').click(function(){
	simpan_data();
});

function simpan_data(){

	var base_url = $('#base_url').val();
	var judul = $('#judul').val();
	var picture = $('#picture').prop('files')[0];
	var picture_name = $('input[name=picture]').val().split('\\').pop();
	
	if (document.getElementById('status').checked) {
		var status = 1;
	}else{
		var status = 0;
	}
	
	var lanjut = true;

	if(judul.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Judul Kosong</div>');
		return false;
	}
	if(picture_name.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Menyimpan! Gambar Kosong</div>');
		return false;
	}
	
	if(lanjut==true){
		var form_data = new FormData();

		form_data.append('judul',judul);
		form_data.append('picture',picture);
		form_data.append('status',status);
		form_data.append('picture_name',picture_name);

		$.ajax({
			type : "POST", 
			url  : base_url+'tools/simpan_slider',
        	data : form_data,
        	processData : false,
        	contentType : false,
        	dataType : "json", 
        	cache : false,
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

$('#btnclear').click(function(){
	clear_data();
	$("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
    $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
});

function clear_data(){
	$('#picture').ace_file_input('reset_input_ui');
	$('#judul').val('');	
	document.getElementById("status").checked = false;
}