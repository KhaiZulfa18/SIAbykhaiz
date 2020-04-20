$('#btnsent').click(function(){
	kirim_data();
});

$('#btnclear').click(function(){
	clear_data();
});

function kirim_data(){

	//$('#attention').html('<div class="alert alert-success" role="alert">Email Terkirim!</div>');

	var base_url = $('#base_url').val();
	var penerima = $('#penerima').val();
	var subject = $('#subject').val();
	var message = $('#editor1').html();	

	var lanjut = true;

	if(penerima.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Mengirim! Penerima Kosong</div>');
		return false;
	}
	if(subject.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Mengirim! Subject Kosong</div>');
		return false;
	}
	if(message.length==0){
		$('#attention').html('<div class="alert alert-danger" role="alert">Gagal Mengirim! Pesan Kosong</div>');
		return false;
	}

	if(lanjut==true){
		$.ajax({
			type : "POST", 
			url  : base_url+'tools/kirimemail',
        	data : {
        		penerima:penerima,
        		subject:subject,
        		message:message
        	},
        	dataType:"json",
        	//beforeSend: function (){
			//	$("#formulir").LoadingOverlay("show");
        	//},
			success	: function(response){ 
				if(response.status=='gagal'){
					$('#attention').html(response.pesan);
					//$("#formulir").LoadingOverlay("hide", true);
				}
				else{
					$('#attention').html(response.pesan);
					//$("#formulir").LoadingOverlay("hide", true);
					clear_data();
            	}
			}
		});
	}
}

function clear_data(){
	$('#penerima').val('');
	$('#subject').val('');
	$('#editor1').html('');
}