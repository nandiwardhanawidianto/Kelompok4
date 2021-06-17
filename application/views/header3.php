<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Style.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <!-- bowo -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/leaflet/leaflet.css">
    <script src="<?=base_url()?>assets/leaflet/leaflet.js"></script>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

    <style type="text/css">
        #mapid { height: 280px; }
    </style>
    
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top navbar-semua">
        <a class="navbar-brand"><img src="<?php echo base_url(); ?>assets/img/LOGO-01.png" height="60" width="140"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/main_con/index3">Home</a>
                <!-- tambah edit controller -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/penyakit_con/index3">Penyakit</a>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/obat_con/index3">Obat</a>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/rs_con/index3">Rumah Sakit</a>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/main_con/about">About</a>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url(); ?>index.php/main_con/login">Login</a>
            </ul>
        </div>
    </nav>
</body>