<table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
	<thead>
		<tr>
			<th class="center" width="50px">No</th>
			<th class="center" width="200px">Nama</th>
			<th class="center" width="200px">Email</th>
			<th class="center" width="200px">Subjek</th>
			<th class="center" width="300px">Isi Masukkan</th>
			<th class="center" width="200px">Waktu</th>
			<th class="center" width="150px">Aksi</th>
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
		<?php foreach ($list_masukkan as $data) { 
			?>
			<tr>
				<td class="center" id="no"><?php echo $no; ?></td>
				<td class="center" id="nama"><?php echo $data->nama; ?></td>
				<td class="center" id="email"><?php echo $data->email; ?></td>
				<td class="center" id="subjek"><?php echo $data->subjek; ?></td>
				<td class="center" id="masukkan"><?php echo $data->masukan; ?></td>
				<td class="center" id="waktu"><?php echo $data->waktu; ?></td>
				<td class="center" id="aksi">
					<div class="btn-group">
						<a>
                			<button class="btn btn-xs btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>')" id='hapus'><i class="ace-icon fa fa-trash bigger-120"></i>Hapus</button>
                		</a>
                	</div>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>