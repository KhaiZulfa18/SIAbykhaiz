<table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
	<thead>
		<tr>
			<th class="center" width="75px">No</th>
			<th class="center" width="200px">Judul</th>
			<th class="center" width="300px">Gambar</th>
			<th class="center" width="120px">Status</th>
			<?php if ($this->session->userdata('level')==1) { ?>
			<th class="center" width="150px">Aksi</th>
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
		<?php foreach ($list_slider as $data) { 

			$cekstatus = $data->status;
			if ($cekstatus==1) {
				$status = '<span style="color: green;">Aktif</span>';
			}else{
				$status = '<span style="color: red;">Non-Aktif</span>';
			}
			?>
			<tr>
				<td class="center" id="no"><?php echo $no; ?></td>
				<td class="center" id="judul"><?php echo $data->judul; ?></td>
				<td class="center" id="gambar">
					<?php 
						$txtgambar = (!empty($data->picture)) ? '<img src="'.base_url().'images/slider/'.$data->picture.'" width="100%">' : '-';
						echo $txtgambar;
					?>
				</td>
				<td class="center" id="status"><?php echo $status; ?></td>
				<?php if ($this->session->userdata('level')==1) { ?>
				<td class="center" id="aksi">
					<div class="btn-group">
						<?php if ($cekstatus==1) { ?>
							<button class="btn btn-xs btn-warning" onClick="ubah('<?php echo $data->id; ?>','<?php echo $data->status; ?>','<?php echo $noPage; ?>')" id='ubah'><i class="ace-icon fa fa-refresh bigger-150"></i>Non-Aktifkan</button>
						<?php }else{ ?>
							<button class="btn btn-xs btn-info" onClick="ubah('<?php echo $data->id; ?>','<?php echo $data->status; ?>','<?php echo $noPage; ?>')" id='ubah'><i class="ace-icon fa fa-refresh bigger-150"></i>Aktifkan</button>
						<?php } ?>
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