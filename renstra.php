<?php
require 'config.php';

// Fetch data
$indikator_kinerja_unit = mysqli_query(
    $mysql, 
    "SELECT 
        ik.indikator_kinerja_id, 
        ik.tujuan, 
        ik.sasaran_kegiatan, 
        ik.kode, 
        ik.unit_id,
        u.nama_unit, 
        ik.indikator_kinerja_kegiatan, 
        ik.indikator_kinerja_sub_kegiatan, 
        ik.indikator_kinerja_unit_kerja,
        ik.target, 
        ik.satuan
    FROM 
        Indikator_Kinerja AS ik
    INNER JOIN UNIT AS u
    ON ik.unit_id=u.unit_id");
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
                                <h2 class="">Rencana Strategis</h2>
                                <!-- Button to Open the Modal -->
                                <div class="d-flex align-items-center ml-3">
                                    <a href="add_renstra.php" class="btn btn-primary" data-target="">
                                        Tambah Data
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tujuan</th>
                                            <th>Sasaran Kegiatan</th>
                                            <th>Kode</th>
                                            <th>PIC</th>
                                            <th>Indikator Kinerja Kegiatan</th>
                                            <th>Indikator Kinerja Sub Kegiatan</th>
                                            <th>Indikator Kinerja Unit Kerja</th>
                                            <th>Target</th>
                                            <th>Realisasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot> -->
                                    <tbody>
                                        <?php
                                        while($data = mysqli_fetch_array($indikator_kinerja_unit)){
                                            echo "<tr>";
                                            echo  "<td>" .$data['indikator_kinerja_id']. "</td>";
                                            echo "<td>".$data['tujuan']."</td>";
                                            echo "<td>".$data['sasaran_kegiatan']."</td>";
                                            echo "<td>".$data['kode']."</td>";
                                            echo "<td>".$data['nama_unit']."</td>";
                                            echo "<td>".$data['indikator_kinerja_kegiatan']."</td>";
                                            echo "<td>".$data['indikator_kinerja_sub_kegiatan']."</td>";
                                            echo "<td>".$data['indikator_kinerja_unit_kerja']."</td>";
                                            echo "<td>".$data['target']."</td>";
                                            echo "<td>".$data['satuan']."</td>";
                                            echo "<td><a href='edit_renstra.php?indikator_kinerja_id=$data[indikator_kinerja_id]'>Edit</a> | <a href='delete_renstra.php?indikator_kinerja_id=$data[indikator_kinerja_id]'>Delete</a></td></tr>";        
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
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