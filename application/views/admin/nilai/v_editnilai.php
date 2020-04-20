<!DOCTYPE html>
<html lang="en">
	<head>
		<?php $this->load->view('header'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/ace-master/assets/css/bootstrap-datepicker3.min.css" />
	</head>

	<body class="no-skin">
		<?php $this->load->view('navbar'); ?>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<?php $this->load->view('sidebar'); ?>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-users home-icon"></i>
								<a href="#">Sistem Informasi Akademik</a>
							</li>

							<li class="active">Input Nilai</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Input Nilai
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-11">
								<!-- PAGE CONTENT BEGINS -->
								<form class="form-horizontal" role="form">

									<div class="form-group">
										<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
										<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
										<input type="hidden" name="id_siswa" id="id_siswa" value="<?php echo $id_siswa; ?>">
										<input type="hidden" name="id_guru_lama" id="id_guru_lama" value="<?php echo $id_guru; ?>">
										<input type="hidden" name="id_guru_baru" id="id_guru_baru" value="<?php echo $id_guru_baru; ?>">

										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>

										<div class="col-sm-9">
											<input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" class="col-xs-10 col-sm-5" disabled="disabled"/>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NISN </label>
										<div class="col-sm-9">
											<input type="text" id="nisn" name="nisn" value="<?php echo $nisn; ?>" class="col-xs-10 col-sm-5" disabled="disabled"/>
											</select>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kelas </label>
										<div class="col-sm-9">
											<input type="text" id="kelas" name="kelas" value="<?php echo $kelas; ?>" class="col-xs-10 col-sm-5" disabled="disabled"/>
											</select>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Matematika </label>
										<div class="col-sm-9">
											<input type="number" id="mtk" name="mtk" placeholder="Isi Nilai" class="col-xs-10 col-sm-2" value="<?php echo $mtk; ?>" />
											</select>
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bahasa Indonesia </label>
										<div class="col-sm-9">
											<input type="number" id="indo" name="indo" placeholder="Isi Nilai" class="col-xs-10 col-sm-2" value="<?php echo $indo; ?>" />
										</div>
									</div>

									<div class="space-4"></div>

									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Bahasa Inggris </label>
										<div class="col-sm-9">
											<input type="number" id="inggris" name="inggris" placeholder="Isi Nilai" class="col-xs-10 col-sm-2" value="<?php echo $inggris; ?>" />
										</div>
									</div>

									<div class="space-6"></div>

									<div class="form-group">
										<div class="col-md-12 red" id="attention"></div>
									</div>
									
									<div class="col-md-offset-3 col-md-9">
										<button class="btn btn-info" type="button" id="btnedit">
											<i class="ace-icon fa fa-pencil-square-o bigger-110"></i>
											Ubah
										</button>

										&nbsp; &nbsp; &nbsp;
										<button class="btn" type="button" id="btnback">
											<i class="ace-icon fa fa-undo bigger-110"></i>
											Kembali
										</button>
									</div>
								</form>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php $this->load->view('footer'); ?>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<?php $this->load->view('basic-scripts'); ?>

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
		<script src="<?php echo base_url(); ?>css/ace-master/assets/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>js/nilai/edit_nilai.js?v=1.0.3" type="text/javascript"></script>

		<?php $this->load->view('ace-scripts'); ?>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			});
		</script>
	</body>
</html>
