<table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
	<thead>
		<tr>
			<th class="center" width="50px">No</th>
			<th class="center" width="125px">NISN</th>
			<th class="center" width="200px">Nama</th>
			<th class="center" width="200px">Matematika</th>
			<th class="center" width="200px">Bahasa Indonesia</th>
			<th class="center" width="200px">Bahasa Inggris</th>
			<th class="center" width="150px">Rata-rata</th>
			<th class="center" width="200px">Status</th>
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
		<?php foreach ($list_nilai as $data) { 
			?>
			<tr>
				<td class="center" id="no"><?php echo $no; ?></td>
				<td class="center" id="nisn"><?php echo nisn_siswa($data->id_siswa); ?></td>
				<td class="left" id="nama"><?php echo nama_siswa($data->id_siswa); ?></td>
				<td class="left" id="mtk"><?php echo $data->mtk; ?></td>
				<td class="left" id="indo"><?php echo $data->b_indo; ?></td>
				<td class="left" id="inggris"><?php echo $data->b_inggris; ?></td>
				<td class="left" id="rerata"><?php echo $data->rerata; ?></td>
				<td class="left" id="status"><?php echo cek_nilai_status($data->rerata); ?></td>
				<td class="center" id="aksi">
				<?php 
					if ($this->session->userdata('level')==1) { ?>
					
					<div class="btn-group">
						<a>
                			<button class="btn btn-xs btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>')" id='hapus'><i class="ace-icon fa fa-trash bigger-120"></i>Hapus</button>
                		</a>
                	</div>
                <?php }elseif ($this->session->userdata('level')==2) { ?>
                	<div class="btn-group">
                		<a href="<?php echo base_url('tools/edit_nilai/'.$data->id); ?>">
	                		<button class="btn btn-xs btn-success" id="edit" ><i class="ace-icon fa fa-pencil bigger-120"></i>Ubah</button>
	                	</a>
                	</div>
                <?php } ?>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>