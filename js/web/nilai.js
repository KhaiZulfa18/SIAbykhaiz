$('#btncek').click(function(){
	cek_nilai();
});

function cek_nilai(){

	var nisn = $('#nisn').val();
	var base_url = $('#base_url').val();

	var lanjut = true;

	if(nisn.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Harap isi NISN anda</div>');
		return false;
	}
	
	
	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'school/get_nilai',
			data : {
				nisn:nisn
        	},
        	dataType:"json",
			success	: function(response){
				if(response.status=='gagal'){
					$('#attention').html(response.pesan);
					clear_data();
				}
				else{
					$('#form').html(data);
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

function clear_data(){
	$('#nisn').val('');
	$('#passwordlama').val('');
	$('#confirmpassword').val('');
}