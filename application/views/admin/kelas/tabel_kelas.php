<table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
	<thead>
		<tr>
			<th class="center" width="50px">No</th>
			<th class="center" width="150px">Nama</th>
			<th class="center" width="150px">Kelas</th>
			<th class="center" width="200px">Jurusan</th>
			<th class="center" width="200px">Wali Kelas</th>
			<th class="center" width="200px">Aksi</th>
		</tr>
	</thead>

	<?php
	if($noPage==1){
		$no = 1;
	} else {
		$no = $offset+1;
	}
	?>

	<tbody>
		<?php foreach ($list_kelas as $data) { 
			$id_jurusan = $data->jurusan;
			$id_walikelas = $data->wali_kelas;
			?>
			<tr>
				<td class="center" id="no"><?php echo $no; ?></td>
				<td class="center" id="nama"><?php echo $data->nama; ?></td>
				<td class="center" id="kelas"><?php echo $data->kelas; ?></td>
				<td class="center" id="jurusan"><?php echo cek_jurusan($id_jurusan); ?></td>
				<td class="center" id="walikelas"><?php echo cek_walikelas($id_walikelas); ?></td>
				<td class="center" id="aksi">
					<div class="btn-group">
                		<a href="<?php echo base_url('akademik/kelas/'.$data->id_kelas); ?>">
	                		<button class="btn btn-xs btn-success" id="show"><i class="ace-icon fa fa-eye bigger-120"></i>Lihat</button>
	                	</a>
                	</div>
                	<?php if ($this->session->userdata('level')==1) { ?>
                	<div class="btn-group">
                		<a href="<?php echo base_url('akademik/edit_kelas/'.$data->id); ?>">
	                		<button class="btn btn-xs btn-info" id="edit"><i class="ace-icon fa fa-pencil bigger-120"></i>Edit</button>
	                	</a>
                	</div>
					<div class="btn-group">
						<a>
                			<button class="btn btn-xs btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>')" id='hapus'><i class="ace-icon fa fa-trash bigger-120"></i>Hapus</button>
                		</a>
                	</div>
                	<?php } ?> 
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>