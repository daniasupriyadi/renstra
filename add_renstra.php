<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Rencana Strategis</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Renstra PENS</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Rencana Strategis
                        </a>
                        <!-- <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a> -->
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <a href="renstra.php" class="d-flex align-items-center"><i class="fa fa-arrow-left"
                                        style="color:black; font-size:20px"></i></a>
                                <h3 class="ml-3">Tambah Rencana Strategis</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="add_renstra.php" method="post" name="add_renstra">
                                <input type="text" name="tujuan" placeholder="Tujuan" class="form-control">
                                <br>
                                <input type="text" name="sasaran_kegiatan" placeholder="Sasaran Kegiatan"
                                    class="form-control">
                                <br>
                                <input type="text" name="kode" placeholder="Kode" class="form-control">
                                <br>
                                <input type="text" name="unit_id" placeholder="PIC" class="form-control">
                                <br>
                                <input type="text" name="indikator_kinerja_kegiatan"
                                    placeholder="Indikator Kinerja Kegiatan" class="form-control">
                                <br>
                                <input type="text" name="indikator_kinerja_sub_kegiatan"
                                    placeholder="Indikator Kinerja Sub Kegiatan" class="form-control">
                                <br>
                                <input type="text" name="indikator_kinerja_unit_kerja"
                                    placeholder="Indikator Kinerja Unit Kerja" class="form-control">
                                <br>
                                <input type="text" name="target" placeholder="Target" class="form-control">
                                <br>
                                <input type="text" name="satuan" placeholder="Realisasi" class="form-control">
                                <br>
                                <div class="">
                                    <input type="submit" name="submit" class="btn btn-primary" value="submit">
                                </div>
                                <!--Fungsi Add -->
                                <?php
                            if(isset($_POST['submit'])){
                                $tujuan = $_POST['tujuan'];
                                $sasaran_kegiatan = $_POST['sasaran_kegiatan'];
                                $kode = $_POST['kode'];
                                $unit_id = $_POST['unit_id'];
                                $indikator_kinerja_kegiatan = $_POST['indikator_kinerja_kegiatan'];
                                $indikator_kinerja_sub_kegiatan = $_POST['indikator_kinerja_sub_kegiatan'];
                                $indikator_kinerja_unit_kerja = $_POST['indikator_kinerja_unit_kerja'];
                                $target = $_POST['target'];
                                $satuan = $_POST['satuan'];

                                include_once("config.php");

                                $insert_data = mysqli_query($mysql, 
                                "INSERT INTO Indikator_Kinerja(
                                    tujuan, 
                                    sasaran_kegiatan, 
                                    kode, 
                                    unit_id, 
                                    indikator_kinerja_kegiatan, 
                                    indikator_kinerja_sub_kegiatan, 
                                    indikator_kinerja_unit_kerja, 
                                    target, 
                                    satuan
                                ) 
                                VALUES 
                                (
                                    '$tujuan', 
                                    '$sasaran_kegiatan', 
                                    '$kode', 
                                    '$unit_id', 
                                    '$indikator_kinerja_kegiatan', 
                                    '$indikator_kinerja_sub_kegiatan', 
                                    '$indikator_kinerja_unit_kerja', 
                                    '$target', 
                                    '$satuan'
                                )");
                                echo "Tambah data berhasil. <a href='renstra.php'>Kembali</a>";
                            }
                            ?>
                            </form>


                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>