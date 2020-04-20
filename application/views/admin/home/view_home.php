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
								<a href="#">Sistem Informasi Akademik </a>
							</li>

							<li class="active">Home</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Home
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
									<div class="col-sm-7 infobox-container">
										<div class="infobox infobox-blue">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-briefcase"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $guru; ?></span>
												<div class="infobox-content">Guru</div>
											</div>
										</div>

										<div class="infobox infobox-orange">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-desktop"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $admin; ?></span>
												<div class="infobox-content">Admin TU</div>
											</div>
										</div>

										<div class="infobox infobox-red">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-book"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $kelas ?></span>
												<div class="infobox-content">Kelas</div>
											</div>
										</div>

										<div class="infobox infobox-green">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-graduation-cap"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $siswa; ?></span>
												<div class="infobox-content">Siswa</div>
											</div>
										</div>

										<div class="infobox infobox-purple">
											<div class="infobox-icon">
												<i class="ace-icon fa fa-flask"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number"><?php echo $jurusan; ?></span>
												<div class="infobox-content">Jurusan</div>
											</div>
										</div>

										<div class="space-6"></div>

									</div>
								</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="widget-box transparent">
												<div class="widget-header widget-header-flat">
													<h4 class="widget-title lighter">
														<i class="ace-icon fa fa-star orange"></i>
														Jenis Kelamin Siswa/Siswi
													</h4>

													<div class="widget-toolbar">
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>
													</div>
												</div>

												<div class="widget-body">
													<div class="widget-main no-padding">
														<input type="hidden" name="siswa_lk" id="siswa_lk" value="<?php echo $siswa_lk; ?>">
														<input type="hidden" name="siswa_pr" id="siswa_pr" value="<?php echo $siswa_pr; ?>">
														<canvas id="pieChart" ></canvas>
														<div class="hr hr8 hr"></div>
														<div class="col-xs-12">
															<div class="clearfix">
																<div class="grid2">
																	<h4 class="bigger pull-right">Laki-laki</h4>
																</div>
																<div class="grid2">
																	<h4 class="bigger pull-left">Perempuan</h4>
																</div>
															</div>
															<div class="hr hr8 hr"></div>
														</div>
														<div class="hr hr8 hr-double"></div>
													</div><!-- /.widget-main -->
												</div><!-- /.widget-body -->
											</div><!-- /.widget-box -->
										</div><!-- /.col -->

									</div>
								</div>
								<br/>
								<!-- PAGE CONTENT ENDS -->
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
		<script src="<?php echo base_url(); ?>js/datamember.js?v=1.0.6" type="text/javascript"></script>
		<!-- Chart Js -->
		<script src="<?php echo base_url(); ?>css/chart.js/Chart.js"></script>

		<?php $this->load->view('ace-scripts'); ?>
	<script>
		$(function () {
			var siswa_lk = $('#siswa_lk').val();
			var siswa_pr = $('#siswa_pr').val();

			var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
		    var pieChart       = new Chart(pieChartCanvas)
		    var PieData        = [
		      {
		        value    : siswa_lk,
		        color    : '#3c8dbc',
		        highlight: '#3c8dbc',
		        label    : 'Laki-laki'
		      },
		      {
		        value    : siswa_pr,
		        color    : '#ff851b',
		        highlight: '#ff851b',
		        label    : 'Perempuan'
		      }
		    ]
		    var pieOptions     = {
		      //Boolean - Whether we should show a stroke on each segment
		      segmentShowStroke    : true,
		      //String - The colour of each segment stroke
		      segmentStrokeColor   : '#fff',
		      //Number - The width of each segment stroke
		      segmentStrokeWidth   : 2,
		      //Number - The percentage of the chart that we cut out of the middle
		      percentageInnerCutout: 50, // This is 0 for Pie charts
		      //Number - Amount of animation steps
		      animationSteps       : 100,
		      //String - Animation easing effect
		      animationEasing      : 'easeOutBounce',
		      //Boolean - Whether we animate the rotation of the Doughnut
		      animateRotate        : true,
		      //Boolean - Whether we animate scaling the Doughnut from the centre
		      animateScale         : false,
		      //Boolean - whether to make the chart responsive to window resizing
		      responsive           : true,
		      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
		      maintainAspectRatio  : true,
		      //String - A legend template
		      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
		    }
		    //Create pie or douhnut chart
		    // You can switch between pie and douhnut using the method below.
		    pieChart.Doughnut(PieData, pieOptions)

		    //-------------
		    //- BAR CHART -
		    //-------------
		    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
		    var barChart                         = new Chart(barChartCanvas)
		    var barChartData                     = areaChartData
		    barChartData.datasets[1].fillColor   = '#00a65a'
		    barChartData.datasets[1].strokeColor = '#00a65a'
		    barChartData.datasets[1].pointColor  = '#00a65a'
		    var barChartOptions                  = {
		      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
		      scaleBeginAtZero        : true,
		      //Boolean - Whether grid lines are shown across the chart
		      scaleShowGridLines      : true,
		      //String - Colour of the grid lines
		      scaleGridLineColor      : 'rgba(0,0,0,.05)',
		      //Number - Width of the grid lines
		      scaleGridLineWidth      : 1,
		      //Boolean - Whether to show horizontal lines (except X axis)
		      scaleShowHorizontalLines: true,
		      //Boolean - Whether to show vertical lines (except Y axis)
		      scaleShowVerticalLines  : true,
		      //Boolean - If there is a stroke on each bar
		      barShowStroke           : true,
		      //Number - Pixel width of the bar stroke
		      barStrokeWidth          : 2,
		      //Number - Spacing between each of the X value sets
		      barValueSpacing         : 5,
		      //Number - Spacing between data sets within X values
		      barDatasetSpacing       : 1,
		      //String - A legend template
		      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
		      //Boolean - whether to make the chart responsive
		      responsive              : true,
		      maintainAspectRatio     : true
		    }

		    barChartOptions.datasetFill = false
		    barChart.Bar(barChartData, barChartOptions)
		})
	</script>	
	</body>
</html>
