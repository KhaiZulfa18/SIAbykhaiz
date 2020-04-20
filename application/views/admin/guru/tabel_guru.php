<table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
	<thead>
		<tr>
			<th class="center" width="50px">No</th>
			<th class="center" width="125px">NIP</th>
			<th class="center" width="200px">Nama</th>
			<th class="center" width="200px">Username</th>
			<th class="center" width="200px">Email</th>
			<th class="center" width="200px">No.Telepon</th>
			<th class="center" width="200px">Tanggal Lahir</th>
			<th class="center" width="150px">Jenis Kelamin</th>
			<th class="center" width="300px">Alamat</th>
			<?php if ($this->session->userdata('level')==1) { ?>
			<th class="center" width="100px">Aksi</th>
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
		<?php foreach ($list_guru as $data) { 
			?>
			<tr>
				<td class="center" id="no"><?php echo $no; ?></td>
				<td class="center" id="nip"><?php echo $data->nip; ?></td>
				<td class="left" id="nama"><?php echo $data->nama; ?></td>
				<td class="left" id="username"><?php echo $data->username; ?></td>
				<td class="left" id="email"><?php echo $data->email; ?></td>
				<td class="left" id="telepon"><?php echo $data->telepon; ?></td>
				<td class="left" id="tgl_lahir"><?php echo tanggal_indonesia($data->tgl_lahir); ?></td>
				<td class="left" id="jk"><?php echo $data->gender; ?></td>
				<td class="left" id="alamat"><?php echo $data->alamat; ?></td>
				<?php if ($this->session->userdata('level')==1) { ?>
				<td class="center" id="aksi">
					<div class="btn-group">
                		<button class="btn btn-xs btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>')" id='hapus'><i class="ace-icon fa fa-trash bigger-120"></i>Hapus</button>
                	</div>
				</td>
				<?php } ?> 
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>