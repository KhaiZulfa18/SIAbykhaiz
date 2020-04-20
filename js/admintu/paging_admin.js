function paging(pageno){
	var base_url = $('#base_url').val();
	var cari = $('#cari').val();
	var status = $('#status').val();

	$.ajax({
		type: "POST",		
		url: base_url+'akademik/paging_admin',
		data: {
			status: status,
			cari: cari,
          	page: pageno
		},
		success: function(data) {
			$("#paging").html(data);
		}
	});
}