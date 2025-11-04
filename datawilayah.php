<?php
// connect database
include 'db_config.php'; // Ini menyediakan $koneksi

// --- Query 1: Ambil data Batas Wilayah SAJA ---
// Kita filter menggunakan WHERE tipe_info = 'BATAS'
$sql_batas = "SELECT * FROM data_wilayah WHERE tipe_info = 'BATAS' ORDER BY urutan ASC";
$result_batas = mysqli_query($koneksi, $sql_batas);
if (!$result_batas) {
    die("Query Batas Wilayah Gagal: " . mysqli_error($koneksi));
}

// --- Query 2: Ambil data Luas Wilayah SAJA ---
// Kita filter menggunakan WHERE tipe_info = 'LUAS'
$sql_luas = "SELECT * FROM data_wilayah WHERE tipe_info = 'LUAS' ORDER BY urutan ASC";
$result_luas = mysqli_query($koneksi, $sql_luas);
if (!$result_luas) {
    die("Query Luas Wilayah Gagal: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>WEBSITE - Desa Teluk Nangka</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
   <div class="container-fluid p-0 nav-bar">
    <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
        <a href="index.php" class="navbar-brand px-lg-4 m-0"> </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto p-4">
                <a href="index.php" class="nav-item nav-link nav-zoom">HOME</a> <a href="profilkepdes.php" class="nav-item nav-link nav-zoom">PROFIL KEPALA DESA</a>
                <a href="struktur.php" class="nav-item nav-link nav-zoom">STRUKTUR</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle nav-zoom active" id="informasiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        INFORMASI DESA
                    </a>
                    <div class="dropdown-menu" aria-labelledby="informasiDropdown">
                        <a class="dropdown-item" href="datapenduduk.php">Data Penduduk</a> <a class="dropdown-item" href="datawilayah.php">Data Wilayah</a> <a class="dropdown-item" href="apbdesa.php">APB Desa</a>
                    </div>
                </div>

                <a href="galeri.php" class="nav-item nav-link nav-zoom">GALERI DESA</a>
                <a href="denah.php" class="nav-item nav-link nav-zoom">DENAH</a>
            </div>
        </div>
    </nav>
</div>
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">DATA WILAYAH</h1>
            <div class="d-inline-flex mb-lg-5">
            </div>
        </div>
    </div>
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">PROFIL WILAYAH</h4>
                <h1 class="display-4">BATAS, LUAS, DAN PEMBAGIAN WILAYAH DESA TELUK NANGKA</h1>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-4">Batas Wilayah</h2>
                    <table class="table table-bordered">
                        <tbody>
                            <?php while ($row_batas = mysqli_fetch_assoc($result_batas)) { ?>
                            <tr>
                                <th scope="row" style="width: 20%;"><?php echo htmlspecialchars($row_batas['uraian_wilayah']); ?></th>
                                <td><?php echo htmlspecialchars($row_batas['nilai']); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <h2 class="mt-5 mb-4">Luas Wilayah</h2>
                    <table class="table table-bordered">
                        <tbody>
                            <?php while ($row_luas = mysqli_fetch_assoc($result_luas)) { ?>
                            <tr>
                                <th scope="row" style="width: 20%;"><?php echo htmlspecialchars($row_luas['uraian_wilayah']); ?></th>
                                <td><?php echo htmlspecialchars($row_luas['nilai']); ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
                    
        </div>
    </div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <script src="js/main.js"></script>
</body>

</html>
<?php include 'footer.php';?>