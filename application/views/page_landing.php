<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Style.css-->
    <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css">
    <!--Jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- navbar
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/main_con/index"><img src="<?php echo base_url() ?>assets/img/LOGO-01.png" height="60" width="140"></a>
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/main_con/index">Home</a>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/penyakit_con/index">Penyakit</a>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/obat_con/index">Obat</a>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/rs_con/index">Konsultasi</a>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/main_con/about">About</a>
                <?php if ($this->session->userdata('username', 'admin')) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/main_con/logout">Logout</a>
                <?php } else { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>index.php/main_con/login">Login</a>
                <?php }; ?>
            </ul>
        </div>
    </nav> -->
    
    <!-- navbar change color -->
    <script>
        $(window).scroll(function () {
            $('nav').toggleClass('bg-light-scrolled', $(this).scrollTop() > 600);
        });
    </script>

    <!-- carousel -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <!-- indicator -->
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
        </ol>
        <!-- slide image -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url() ?>assets/img/carousel-0.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="<?php echo base_url() ?>assets/img/carousel-1.jpg" alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <!-- card -->
    <div class="container">
        <div class="row justify-content-container">
            <div class="col-md-4">
                <div class="card" style="width: 15rem;">
                    <img class="card-img-top" src="<?php echo base_url() ?>assets/img/card.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Penyakit</h5>
                        <p class="card-text">Kenali gejalanya sebelum terlambat</p>
                        <?php if ($this->session->userdata('role'=="admin")) { ?>
                            <a href="<?php echo base_url(); ?>index.php/penyakit_con/index" class="btn btn-success">Cari</a>
                        <?php } else if ($this->session->userdata('role'=="user")){ ?>
                            <a href="<?php echo base_url(); ?>index.php/penyakit_con/index2" class="btn btn-success">Cari</a>
                        <?php } else { ?>
                            <a href="<?php echo base_url(); ?>index.php/penyakit_con/index3" class="btn btn-success">Cari</a>
                        <?php }; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 15rem;">
                    <img class="card-img-top" src="<?php echo base_url() ?>assets/img/card.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Obat</h5>
                        <p class="card-text">Cari obat yang sesuai dengan penyakitmu </p>
                        <?php if ($this->session->userdata('role'=="admin")) { ?>
                            <a href="<?php echo base_url(); ?>index.php/obat_con/index" class="btn btn-success">Cari</a>
                        <?php } else if ($this->session->userdata('role'=="user")){ ?>
                            <a href="<?php echo base_url(); ?>index.php/obat_con/index2" class="btn btn-success">Cari</a>
                        <?php } else { ?>
                            <a href="<?php echo base_url(); ?>index.php/obat_con/index3" class="btn btn-success">Cari</a>
                        <?php }; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 15rem;">
                    <img class="card-img-top" src="<?php echo base_url() ?>assets/img/card.jpg" alt="Card image cap">
                    <div class="card-body text-center">
                        <h5 class="card-title">Rumah Sakit</h5>
                        <p class="card-text">Temukan rumah sakit terdekat</p>
                        <?php if ($this->session->userdata('role'=="admin")) { ?>
                            <a href="<?php echo base_url(); ?>index.php/rs_con/index" class="btn btn-success">Cari</a>
                        <?php } else if ($this->session->userdata('role'=="user")){ ?>
                            <a href="<?php echo base_url(); ?>index.php/rs_con/index2" class="btn btn-success">Cari</a>
                        <?php } else { ?>
                            <a href="<?php echo base_url(); ?>index.php/rs_con/index3" class="btn btn-success">Cari</a>
                        <?php }; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>