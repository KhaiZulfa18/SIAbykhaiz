<table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
	<thead>
		<tr>
			<th class="center" width="50px">No</th>
			<th class="center" width="150px">Nama Jurusan</th>
			<th class="center" width="150px">Singkatan</th>
			<th class="center" width="200px">Ketua Kejuruan</th>
			<?php if ($this->session->userdata('level')==1) { ?>
			<th class="center" width="200px">Aksi</th>
			<?php } ?>
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
		<?php foreach ($list_jurusan as $data) { 
			$id_kejuruan = $data->kejuruan;
			?>
			<tr>
				<td class="center" id="no"><?php echo $no; ?></td>
				<td class="center" id="nama"><?php echo $data->nama; ?></td>
				<td class="center" id="singkatan"><?php echo $data->singkatan; ?></td>
				<td class="center" id="kejuruan"><?php echo ketua_kejuruan($id_kejuruan); ?></td>
				<?php if ($this->session->userdata('level')==1) { ?>
				<td class="center" id="aksi">
                	<div class="btn-group">
                		<a href="<?php echo base_url('akademik/edit_jurusan/'.$data->id); ?>">
	                		<button class="btn btn-xs btn-info" id="edit"><i class="ace-icon fa fa-pencil bigger-120"></i>Edit</button>
	                	</a>
                	</div>
					<div class="btn-group">
						<a>
                			<button class="btn btn-xs btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>')" id='hapus'><i class="ace-icon fa fa-trash bigger-120"></i>Hapus</button>
                		</a>
                	</div>
				</td>
				<?php } ?> 
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>