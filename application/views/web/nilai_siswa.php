<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title><?php echo $headertitle; ?></title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/logo smk/smk4.png">
    

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/ace-master/assets/css/bootstrap.min.css" />

    <!-- Icons font CSS-->
    <link href="<?php echo base_url(); ?>css/form/colorlib-regform-5/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>css/form/colorlib-regform-5/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url(); ?>css/form/colorlib-regform-5/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>css/form/colorlib-regform-5/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url(); ?>css/form/colorlib-regform-5/css/main.css" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Data Nilai</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('school/nilai') ?>" >
                        <div class="form-row ">
                            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                            <div class="name">NISN</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="nisn" id="nisn" placeholder="NISN" required="required">
                                            <label class="label--desc">* Wajib diisi</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="form"></div>
                        <div id="attention"></div>
                        
                        <div>
                            <button class="btn btn--radius-2 btn--blue" type="submit" id="">Cek Nilai</button>
                            <a href="<?php echo base_url('school/home') ?>" >
                            <button class="btn btn--radius-2 btn--red" type="button" id="">Kembali</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        $this->load->view('basic-scripts'); 
    ?>
    <?php 
        $this->load->view('ace-scripts'); 
    ?>

    <!-- Jquery JS-->
    <script src="<?php echo base_url(); ?>css/form/colorlib-regform-5/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="<?php echo base_url(); ?>css/form/colorlib-regform-5/vendor/select2/select2.min.js"></script>
    <script src="<?php echo base_url(); ?>css/form/colorlib-regform-5/vendor/datepicker/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>css/form/colorlib-regform-5/vendor/datepicker/daterangepicker.js"></script>
    

    <!-- Main JS-->
    <script src="<?php echo base_url(); ?>css/form/colorlib-regform-5/js/global.js"></script>

    <script src="<?php echo base_url(); ?>plugins/jquery-loading-overlay/dist/loadingoverlay.min.js"></script>
    <script src="<?php echo base_url(); ?>js/web/nilai.js?v=1.0.3"></script>


</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->