<?php
  ob_start();

  //* start session
  session_start();

  //* define cosnst direct access
  define('access', TRUE);

  //* load & init class
  require_once "../class/Koneksi.php";
  require_once "../class/Pengguna.php";
  require_once "../class/Customer.php";
  require_once "../class/Sales.php";

  $koneksi    = new Koneksi();
  $pengguna   = new Pengguna();
  $customer = new Customer();
  $sales   = new Sales();
  

  //* session check
  if ($_SESSION['id_pengguna'] != '' && $_SESSION['nama'] != '' && $_SESSION['status'] != '')
  {
    //* define const access page by level
    define($_SESSION['status'], TRUE);
?>

<!-- Header -->
<?php include '../layouts/header.php' ?>

<!-- Body -->
<body style="background: #ffffff;">
  <div class="wrapper">
    <div class="main-header">
      <?php include '../layouts/navbar.php' ?>
    </div>

    <?php include '../layouts/sidebar.php' ?>

    <div class="main-panel">
      <div class="content">
        <?php
          $current_page = '';

          if (array_key_exists('p', $_GET)) {
            $current_page = $_GET['p'];
          }

          switch ($current_page) {
            // logout
            case 'logout':
              include_once "../auth/logout.php";
            break;
            // pengguna
            case 'pengguna':
              require_once("pengguna/index.php");
            break;
            case 'tambah-pengguna':
              require_once("pengguna/tambah_pengguna.php");
            break;
            case 'ubah-pengguna':
              require_once("pengguna/ubah_pengguna.php");
            break;
            case 'hapus-pengguna':
              require_once("pengguna/hapus_pengguna.php");
            break;
            // Data Customer
            case 'data-customer':
              require_once("data_customer/index.php");
            break;
            case 'tambah-data-customer':
              require_once("data_customer/tambah_data_customer.php");
            break;
            case 'ubah-data-customer':
              require_once("data_customer/ubah_data_customer.php");
            break;
            case 'hapus-data-customer':
              require_once("data_customer/hapus_data_customer.php");
            break;
            // Data Sales
            case 'data-sales':
              require_once("data_sales/index.php");
            break;
            case 'tambah-data-sales':
              require_once("data_sales/tambah_data_sales.php");
            break;
            case 'ubah-data-sales':
              require_once("data_sales/ubah_data_sales.php");
            break;
            case 'hapus-data-sales':
              require_once("data_sales/hapus_data_sales.php");
            break;
            // meja 1
            // case 'klien':
            //   require_once("klien/index.php");
            // break;
            // case 'tambah-klien':
            //   require_once("klien/tambah_klien.php");
            // break;
            // case 'ubah-klien':
            //   require_once("klien/ubah_klien.php");
            // break;
            // case 'hapus-klien':
            //   require_once("klien/hapus_klien.php");
            // break;
            // case 'posyandu':
            //   require_once("posyandu/index.php");
            // break;
            // case 'info-posyandu':
            //   require_once("posyandu/info_posyandu.php");
            // break;
            // case 'hapus-posyandu':
            //   require_once("posyandu/hapus_posyandu.php");
            // break;
            // // meja 2
            // case 'penimbangan':
            //   require_once("penimbangan/index.php");
            // break;
            // case 'timbang':
            //   require_once("penimbangan/timbang.php");
            // break;
            // // meja 3
            // case 'interprestasi':
            //   require_once("interprestasi/index.php");
            // break;
            // case 'kms':
            //   require_once("interprestasi/kms.php");
            // break;
            // // meja 4
            // case 'penyuluhan-posyandu':
            //   require_once("penyuluhan/index.php");
            // break;
            // case 'penyuluhan':
            //   require_once("penyuluhan/penyuluhan.php");
            // break;
            // // meja 5
            // case 'tindakan-posyandu':
            //   require_once("tindakan/index.php");
            // break;
            // case 'tindakan':
            //   require_once("tindakan/tindakan.php");
            // break;
            // // laporan
            // case 'laporan':
            //   require_once("laporan/index.php");
            // break;
            // default
            default:
              require_once("dashboard/index.php");
            break;
          }
        ?>
      </div>

      <?php include '../layouts/footer.php' ?>
    </div>
  </div>

  <!--   Core JS Files   -->
	<script type="text/javascript" src="../assets/js/core/jquery.3.2.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/core/popper.min.js"></script>

  <!-- Bootstrap -->
  <script type="text/javascript" src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

  <!-- jQuery UI -->
	<script type="text/javascript" src="../assets/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../assets/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
  
  <!-- jQuery Scrollbar -->
  <script type="text/javascript" src="../assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>

  <!-- Datatables -->
	<script type="text/javascript" src="../assets/plugins/datatables/datatables.min.js"></script>
  
  <!-- Sweet Alert -->
	<script type="text/javascript" src="../assets/plugins/sweetalert/sweetalert.min.js"></script>

  <!-- Atlantis JS -->
  <script type="text/javascript" src="../assets/js/atlantis.min.js"></script>

  <!-- SI-KADU JS -->
  <script type="text/javascript" src="../assets/js/sikadu.js"></script>

  <!-- Daterange Table -->
  <script type="text/javascript" src="../assets/plugins/daterangepicker/js/moment.min.js"></script>
  <script type="text/javascript" src="../assets/plugins/daterangepicker/js/daterangepicker.min.js"></script>

  <!-- Form Editor -->
  <script type="text/javascript" src="../assets/plugins/summernote-0.8.18/summernote-bs4.min.js"></script>

  <!-- Select2 -->
  <script type="text/javascript" src="../assets/plugins/select2/js/select2.min.js"></script>

  <script src="https://code.highcharts.com/highcharts.js"></script>

</body>

<?php
  }
  else
  {
    header("Location: ../auth/login.php");
  }
?>