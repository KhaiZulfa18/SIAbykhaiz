			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<ul class="nav nav-list">

					<li class="<?php if($menu=='home'){ echo 'active'; } ?>">
						<a href="<?php echo base_url(); ?>akademik">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text"> Beranda </span>
						</a>
					</li>
					<!-- Kelompok Menu Pengaturan -->
					<li class="<?php if($menu_induk=='guru'){ echo 'active open'; } ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-briefcase"></i>
							<span class="menu-text"> Guru </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php if($menu=='data_guru'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>akademik/data_guru">
									<i class="menu-icon fa fa-caret-right"></i>
									Data Guru
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

						<?php if ($this->session->userdata('level')==1) { ?>
						<ul class="submenu">
							<li class="<?php if($menu=='input_guru'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>akademik/inputguru">
									<i class="menu-icon fa fa-caret-right"></i>
									Input Guru
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
						<?php } ?>
					</li>
					<li class="<?php if($menu_induk=='admin'){ echo 'active open'; } ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Admin TU </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php if($menu=='data_admin'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>akademik/data_admin">
									<i class="menu-icon fa fa-caret-right"></i>
									Data Admin
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

						<?php if ($this->session->userdata('level')==1) { ?>
						<ul class="submenu">
							<li class="<?php if($menu=='input_admin'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>akademik/inputadmin">
									<i class="menu-icon fa fa-caret-right"></i>
									Input Admin
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
						<?php } ?>
					</li>
					<li class="<?php if($menu_induk=='siswa'){ echo 'active open'; } ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-graduation-cap"></i>
							<span class="menu-text"> Siswa </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php if($menu=='data_siswa'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>akademik/data_siswa">
									<i class="menu-icon fa fa-caret-right"></i>
									Data Siswa
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

						<?php if ($this->session->userdata('level')==1) { ?>
						<ul class="submenu">
							<li class="<?php if($menu=='input_siswa'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>akademik/inputsiswa">
									<i class="menu-icon fa fa-caret-right"></i>
									Input Siswa
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
						<?php }?>
					</li>
					<li class="<?php if($menu_induk=='nilai'){ echo 'active open'; } ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Nilai </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php if($menu=='data_nilai'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>tools/data_nilai">
									<i class="menu-icon fa fa-caret-right"></i>
									Data Nilai
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>			
					<li class="<?php if($menu_induk=='kelas'){ echo 'active open'; } ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text"> Kelas </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php if($menu=='data_kelas'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>akademik/data_kelas">
									<i class="menu-icon fa fa-caret-right"></i>
									Data Kelas
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

						<?php if ($this->session->userdata('level')==1) { ?>
						<ul class="submenu">
							<li class="<?php if($menu=='input_kelas'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>akademik/inputkelas">
									<i class="menu-icon fa fa-caret-right"></i>
									Input Kelas
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
						<?php } ?>
					</li>
					<li class="<?php if($menu_induk=='jurusan'){ echo 'active open'; } ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-flask"></i>
							<span class="menu-text"> Jurusan </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php if($menu=='data_jurusan'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>akademik/data_jurusan">
									<i class="menu-icon fa fa-caret-right"></i>
									Data Jurusan
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

						<?php if ($this->session->userdata('level')==1) { ?>
						<ul class="submenu">
							<li class="<?php if($menu=='input_jurusan'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>akademik/input_jurusan">
									<i class="menu-icon fa fa-caret-right"></i>
									Input Jurusan
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
						<?php } ?>
					</li>
					<li class="<?php if($menu_induk=='tools'){ echo 'active open'; } ?>">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-cogs"></i>
							<span class="menu-text"> Tools </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<?php if ($this->session->userdata('level')==1) { ?>
						<ul class="submenu">
							<li class="<?php if($menu=='data_masukkan'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>tools/masukkan">
									<i class="menu-icon fa fa-caret-right"></i>
									Data Masukkan
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

						<ul class="submenu">
							<li class="<?php if($menu=='data_slider'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>tools/data_slider">
									<i class="menu-icon fa fa-caret-right"></i>
									Data Slider
								</a>

								<b class="arrow"></b>
							</li>
						</ul>

						<ul class="submenu">
							<li class="<?php if($menu=='setting_slider'){ echo 'active'; } ?>">
								<a href="<?php echo base_url(); ?>tools/setting_slider">
									<i class="menu-icon fa fa-caret-right"></i>
									Input Slider
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
						<?php } ?>
					</li>			
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>