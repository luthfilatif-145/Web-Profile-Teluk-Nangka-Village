<?php
// 1. SAMBUNGKAN KE DATABASE
include 'db_config.php'; // Ini menyediakan $koneksi

// ======================================================
// 2. LOGIKA PAGINATION (DIAMBIL DARI KODE BARU ANDA)
// ======================================================

// Atur mau berapa foto per halaman (6 foto = 3 baris x 2 kolom)
$per_halaman = 6; 

// Ambil nomor halaman dari URL (contoh: galeri.php?page=2)
// Jika tidak ada, atur sebagai halaman 1
$halaman_aktif = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Hitung total data (ada berapa foto di database)
$sql_total = "SELECT count(id) AS total FROM galeri_desa";
$q_total = mysqli_query($koneksi, $sql_total);
$r_total = mysqli_fetch_assoc($q_total);
$total_data = $r_total['total'];

// Hitung total halaman (total data / data per halaman)
$total_halaman = ceil($total_data / $per_halaman);

// Hitung data 'mulai' untuk kueri SQL (LIMIT)
// (Halaman 1 mulai dari 0, Halaman 2 mulai dari 6, dst.)
$mulai = ($halaman_aktif - 1) * $per_halaman;


// ======================================================
// 3. Query UTAMA (DIMODIFIKASI DENGAN LIMIT)
// ======================================================
// Kueri Anda yang lama, tapi ditambahi LIMIT $mulai, $per_halaman
$sql_galeri = "SELECT * FROM galeri_desa ORDER BY id DESC LIMIT $mulai, $per_halaman";
$result_galeri = mysqli_query($koneksi, $sql_galeri);
if (!$result_galeri) {
 die("Query Galeri Gagal: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
     <meta charset="utf-8">
 <title>Galeri Desa - Desa Teluk Nangka</title>
 <link href="img/favicon.ico" rel="icon">
 <link rel="preconnect" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
 <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
 <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
 <link href="css/style.min.css" rel="stylesheet">

 <style>
        /* CSS Anda (TIDAK BERUBAH) */
  .gallery-item {
   margin-bottom: 30px; 
  }
  .gallery-item img {
   width: 100%;
   height: 300px; 
   object-fit: cover; 
   border-radius: 8px;
   box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  }
  .gallery-item-full img {
   height: auto;
   max-height: 500px;
  }
  .gallery-item .card-body {
   padding: 20px;
   background: #fdfdfd;
   border-bottom-left-radius: 8px;
   border-bottom-right-radius: 8px;
  }
 </style>
</head>

<body>
     <div class="container-fluid p-0 nav-bar">
  <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
   <a href="index.php" class="navbar-brand px-lg-4 m-0">
   </a>
   <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
    <div class="navbar-nav ml-auto p-4">
     <a href="index.php" class="nav-item nav-link nav-zoom">HOME</a>
     <a href="profilkepdes.php" class="nav-item nav-link nav-zoom">PROFIL KEPALA DESA</a>
     <a href="struktur.php" class="nav-item nav-link nav-zoom">STRUKTUR</a>
     <div class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle nav-zoom" data-toggle="dropdown">INFORMASI DESA</a>
      <div class="dropdown-menu text-capitalize">
       <a href="datapenduduk.php" class="dropdown-item">Data Penduduk</a>
       <a href="datawilayah.php" class="dropdown-item">Data Wilayah</a>
       <a href="apbdesa.php" class="dropdown-item">APB Desa</a>
      </div>
     </div>
     <a href="galeri.php" class="nav-item nav-link active nav-zoom">GALERI DESA</a> <a href="denah.php" class="nav-item nav-link nav-zoom">DENAH</a>
    </div>
   </div>
  </nav>
 </div>
    
     <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
  <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
   <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">GALERI DESA</h1>
  </div>
 </div>
 
    <div class="container-fluid pt-5">
  <div class="container">
   <div class="section-title">
    <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Jejak Visual Desa</h4>
    <h1 class="display-4">Dokumentasi Kegiatan Masyarakat</h1>
   </div>
  
               <div class="row text-center justify-content-center">

    <?php
    // MULAI LOOPING
    // Logika 'if layout_style' sudah dihapus, semua akan tampil 2 kolom
    while ($row = mysqli_fetch_assoc($result_galeri)) :
    ?>
     <div class="col-lg-6 gallery-item">
      <img src="img/<?php echo htmlspecialchars($row['gambar']); ?>" alt="<?php echo htmlspecialchars($row['judul']); ?>">
      <div class="card-body">
       <h5 class="text-dark fw-bold"><?php echo htmlspecialchars($row['judul']); ?></h5>
       <p class="text-muted small"><?php echo htmlspecialchars($row['tanggal']); ?></p>
      
       <?php if (!empty($row['deskripsi'])) : ?>
        <p class="text-muted"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
       <?php endif; ?>
      </div>
     </div>

    <?php
    // AKHIR LOOPING
    endwhile;
    ?>

   </div> <div class="row mt-5">
                <div class="col-12 d-flex justify-content-center">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">

                            <li class="page-item <?php if($halaman_aktif <= 1) echo 'disabled'; ?>">
                                <a class="page-link" href="galeri.php?page=<?php echo $halaman_aktif - 1; ?>">Previous</a>
                            </li>

                            <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                                <li class="page-item <?php if ($i == $halaman_aktif) echo 'active'; ?>">
                                    <a class="page-link" href="galeri.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            
                            <li class="page-item <?php if($halaman_aktif >= $total_halaman) echo 'disabled'; ?>">
                                <a class="page-link" href="galeri.php?page=<?php echo $halaman_aktif + 1; ?>">Next</a>
                            </li>
                            
                        </ul>
                    </nav>
                </div>
            </div>

        </div>  </div>  
<?php 
// PANGGIL FOOTER (TIDAK BERUBAH)
include 'footer.php';
?>