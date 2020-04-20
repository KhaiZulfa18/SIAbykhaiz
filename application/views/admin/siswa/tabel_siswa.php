<table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
	<thead>
		<tr>
			<th class="center" width="50px">No</th>
			<th class="center" width="125px">NISN</th>
			<th class="center" width="200px">Nama</th>
			<th class="center" width="200px">Kelas</th>
			<th class="center" width="200px">Email</th>
			<th class="center" width="200px">No.Telepon</th>
			<th class="center" width="150px">Jenis Kelamin</th>
			<th class="center" width="200px">Tanggal Lahir</th>
			<th class="center" width="300px">Alamat</th>
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
		<?php foreach ($list_siswa as $data) { 
			$id_kelas = $data->kelas;
			?>
			<tr>
				<td class="center" id="no"><?php echo $no; ?></td>
				<td class="center" id="nip"><?php echo $data->nisn; ?></td>
				<td class="left" id="nama"><?php echo $data->nama; ?></td>
				<td class="left" id="kelas"><?php echo cek_kelas($id_kelas); ?></td>
				<td class="left" id="email"><?php echo $data->email; ?></td>
				<td class="left" id="telepon"><?php echo $data->telepon; ?></td>
				<td class="left" id="jk"><?php echo $data->gender; ?></td>
				<td class="left" id="tgl_lahir"><?php echo tanggal_indonesia($data->tgl_lahir); ?></td>
				<td class="left" id="alamat"><?php echo $data->alamat; ?></td>
				<td class="center" id="aksi">
					<?php 
					$cek = cek_nilai($data->id);
					if ($this->session->userdata('level')==1) { ?>
					<div class="btn-group">
                		<a href="<?php echo base_url('akademik/edit_siswa/'.$data->id); ?>">
	                		<button class="btn btn-xs btn-info" id="edit" ><i class="ace-icon fa fa-pencil bigger-120"></i>Edit</button>
	                	</a>
                	</div>
					<div class="btn-group">
						<a>
                			<button class="btn btn-xs btn-danger" onClick="hapus('<?php echo $data->id; ?>','<?php echo $noPage; ?>')" id='hapus'><i class="ace-icon fa fa-trash bigger-120"></i>Hapus</button>
                		</a>
                	</div>
                <?php }elseif ($this->session->userdata('level')==2) { ?>
                	<div class="btn-group">
                		<?php if($cek==0){ ?>
                		<a href="<?php echo base_url('tools/input_nilai/'.$data->id); ?>">
	                		<button class="btn btn-xs btn-info" id="input_nilai" ><i class="ace-icon fa fa-pencil bigger-120"></i>Isi Nilai</button>
	                	</a>
	                	<?php }elseif ($cek==1) { ?> 
	                	<a href="<?php echo base_url('tools/ubah_nilai/'.$data->id); ?>">
	                	<button class="btn btn-xs btn-success" id="edit_nilai" ><i class="ace-icon fa fa-pencil bigger-120"></i>Ubah</button>
	                	</a>
	                	<?php } ?>
                	</div>
                <?php } ?>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>