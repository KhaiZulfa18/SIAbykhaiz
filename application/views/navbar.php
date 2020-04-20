		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?php echo base_url(); ?>akademik" class="navbar-brand">
						<small>
							<img src="<?php echo base_url(); ?>images/logo smk/smk4.png" alt="SMK4KENDAL" style="width : 25px"/>
							Akademik Web
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<?php if ($this->session->userdata('gender')=='Laki-laki') {?>
								<img class="nav-user-photo" src="<?php echo base_url(); ?>images/user/001-businessman.png" alt="Foto Admin" />
								<?php } elseif ($this->session->userdata('gender')=='Perempuan') { ?>
								<img class="nav-user-photo" src="<?php echo base_url(); ?>images/user/004-manager.png" alt="Foto Admin" />
								<?php } else { ?>
								<img class="nav-user-photo" src="<?php echo base_url(); ?>images/user/no-photo.png" alt="Foto Admin" />
								<?php } ?>
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $this->session->userdata('namaadmin')?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<?php
										$idadmin = $this->session->userdata('idadmin');
										$lvl = $this->session->userdata('level');
										if ($lvl==1) {
										?>
										<a href="<?php echo base_url('akademik/profiladmin'); ?>">
										<i class="ace-icon fa fa-user"></i>
										My Profil
									</a>
									<?php } elseif ($lvl==2) {
										?>
										<a href="<?php echo base_url('akademik/profilguru'); ?>">
										<i class="ace-icon fa fa-user"></i>
										My Profil
									</a>
									<?php } ?>
								</li>

								<li>
									<?php
										$idadmin = $this->session->userdata('idadmin');
										$lvl = $this->session->userdata('level');
										if ($lvl==1) {
										?>
										<a href="<?php echo base_url('akademik/ubahpasswordadmin'); ?>">
											<i class="ace-icon fa fa-lock"></i>
											Ubah Password
										</a>
									</a>
									<?php } elseif ($lvl==2) {
										?>
										<a href="<?php echo base_url('akademik/ubahpasswordguru'); ?>">
											<i class="ace-icon fa fa-lock"></i>
											Ubah Password
										</a>
									</a>
									<?php } ?>
								</li>

								<li class="divider"></li>

								<li>
									<?php
										$lvl = $this->session->userdata('level');
										if ($lvl==1) {
										?>
										<a href="<?php echo base_url(); ?>loginuser/logoutadmin">
											<i class="ace-icon fa fa-power-off"></i>
											Logout
										</a>
									<?php } elseif ($lvl==2) {
										?>
										<a href="<?php echo base_url(); ?>loginuser/logoutguru">
											<i class="ace-icon fa fa-power-off"></i>
											Logout
										</a>
									<?php } ?>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>