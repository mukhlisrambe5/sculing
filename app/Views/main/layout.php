<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>SCULINK | GEN 2.0</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/dist/css/mycss.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet"
    href="<?= base_url() ?>/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>/public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


  <!--Adjusted Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Shalimar&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js" defer></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script>
    $(document).ready(function () {
      console.log("ready!");
      function validateInput(input) {
        if (input.value === "") {
          input.setCustomValidity("This field is required.");
        } else {
          input.setCustomValidity(""); // Reset to the default (no error message)
        }
      }
    });

  </script>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto waktu_digital">
        <li class="nav-item">
          <a class="nav-link tgl_digital" style="color:blue" data-widget="pushmenu" id="tgl_digital" href="#"
            role="button"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link jam_digital" style="color:blue" data-widget="pushmenu" id="jam_digital" href="#"
            role="button"></i></a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="#" class="brand-link" style="text-decoration: none">
        <img src="<?= base_url() ?>/public/image/logo4.jpg" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">Sculing</span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url() ?>/public/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
              alt="User Image" />
          </div>
          <div class="info">
            <a href="#" class="d-block" style="text-decoration: none">
              <?= session('username') ?>
            </a>
          </div>
        </div>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Menu Utama</li>
          <li class="nav-item">
            <a href="<?= base_url('first') ?>" class="nav-link">
              <i class="fa fa-share text-success"></i>
              <p class="text ml-2">Penempatan Pertama</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('rolling') ?>" class="nav-link">
              <i class="fa fa-history text-success"></i>
              <p class="text ml-2">Rekam Rolling</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fa fa-address-card text-success"></i>
              <p class="text ml-2">
                Data Pegawai
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('data/penempatan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penempatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('data/skill') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Keahlian</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <!-- <a href="<?= base_url('data') ?>" class="nav-link"> -->
            <a href="#" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Dalam Pengembangan">
              <i class="fa fa-trophy text-success"></i>
              <p class="text ml-2">BOSCU</p>
            </a>
          </li>

          <br />
          <li class="nav-header">Setting</li>
          <li class="nav-item">
            <a href="<?= base_url('pegawai') ?>" class="nav-link">
              <i class="fa fa-user-tie text-primary"></i>
              <p class="text ml-1">Pegawai</p>
            </a>
            <a href="<?= base_url('unit') ?>" class="nav-link">
              <i class="fa fa-building text-primary"></i>
              <p class="text ml-1">Unit</p>
            </a>
            <a href="<?= base_url('skill') ?>" class="nav-link">
              <i class="fa fa-lightbulb text-primary"></i>
              <p class="text ml-1">Keahlian</p>
            </a>
            <a href="<?= base_url('admin/settingUsers') ?>" class="nav-link">
              <i class="fa fa-user text-primary"></i>
              <p class="text ml-1">Users</p>
            </a>
            <a href="<?= base_url('auth/signout') ?>" class="nav-link">
              <i class="fa fa-sign-out-alt text-secondary"></i>
              <p class="text ml-">Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </aside>

    <div class="content-wrapper">
      <?= $this->renderSection('content') ?>
    </div>

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block"><b>Version</b> 2.0</div>
      <strong>Copyright &copy;
        <?= date('Y') == '2023' ? '2023' : '2023 -' . date('Y') ?>
      </strong>
      : Mukhlis Rambe - KPPBC TMP C Sabang
    </footer>

    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url() ?>/public/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>/public/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->

  <!-- DataTables  & Plugins -->
  <script src="<?= base_url() ?>/public/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>/public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/public/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url() ?>/public/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url() ?>/public/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url() ?>/public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>/public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>/public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!--script untuk menampilkan sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- ChartJS -->
  <!-- <script src="<?= base_url() ?>/public/plugins/chart.js/Chart.min.js"></script> -->

  <!-- Chart Google -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <!-- merge column -->
  <script type="text/javascript"
    src="https://cdn.jsdelivr.net/gh/ashl1/datatables-rowsgroup@fbd569b8768155c7a9a62568e66a64115887d7d0/dataTables.rowsGroup.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#tbl1').DataTable({
        "order": [],
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "lengthMenu": [
          [10, 20, 50, 100],
          [10, 20, 50, 100]
        ],
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "ajax": {
          "url": "<?= site_url('Admin/dataUsers') ?>",
          "type": "POST"
        },
        "columnDefs": [{
          "targets": [0, 5],
          "orderable": false
        }],
      }).buttons().container().appendTo('#tbl1_wrapper .col-md-6:eq(0)');

      $('#tblData').DataTable({
        "order": [],
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "lengthMenu": [
          [10, 20, 50, 100],
          [10, 20, 50, 100]
        ],
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "dom": 'Blfrtip',
        "ajax": {
          "url": "<?= site_url('Data/dataBase') ?>",
          "type": "POST"
        },
        "columnDefs": [{
          "targets": [0, 9],
          "orderable": false
        }],
      }).buttons().container().appendTo('#tbl1_wrapper .col-md-6:eq(0)');

      $('#tblUnit').DataTable({
        "order": [],
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "lengthMenu": [
          [10, 20, 50, 100],
          [10, 20, 50, 100]
        ],
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "ajax": {
          "url": "<?= site_url('Unit/dataUnit') ?>",
          "type": "POST"
        },
        "columnDefs": [{
          "targets": [0, 2],
          "orderable": false
        }],
      }).buttons().container().appendTo('#tbl1_wrapper .col-md-6:eq(0)');

      $('#tblPegawai').DataTable({
        "order": [],
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "lengthMenu": [
          [10, 20, 50, 100],
          [10, 20, 50, 100]
        ],
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "dom": 'Blfrtip',
        "ajax": {
          "url": "<?= site_url('pegawai/dataPegawai') ?>",
          "type": "POST"
        },
        "columnDefs": [{
          "targets": [0, 5],
          "orderable": false
        }],
      }).buttons().container().appendTo('#tbl1_wrapper .col-md-6:eq(0)');

      $('#tblSkill').DataTable({
        "order": [],
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "lengthMenu": [
          [10, 20, 50, 100],
          [10, 20, 50, 100]
        ],
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "ajax": {
          "url": "<?= site_url('skill/dataSkill') ?>",
          "type": "POST"
        },
        "columnDefs": [{
          "targets": [0, 2],
          "orderable": false
        }],
      }).buttons().container().appendTo('#tbl1_wrapper .col-md-6:eq(0)');
    });

    $('#tblFirst').DataTable({
      "order": [],
      "processing": true,
      "serverSide": true,
      "responsive": true,
      "lengthMenu": [
        [10, 20, 50, 100],
        [10, 20, 50, 100]
      ],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "ajax": {
        "url": "<?= site_url('first/dataFirst') ?>",
        // "url": "<?= site_url('first/dataFirst') ?>",

        "type": "POST"
      },
      "columnDefs": [{
        "targets": [0, 3],
        "orderable": false
      }],
    }).buttons().container().appendTo('#tbl1_wrapper .col-md-6:eq(0)');

    $('#tblRolling').DataTable({
      "order": [],
      "processing": true,
      "serverSide": true,
      "responsive": true,
      "lengthMenu": [
        [10, 20, 50, 100],
        [10, 20, 50, 100]
      ],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "ajax": {
        "url": "<?= site_url('rolling/dataRolling') ?>",
        "type": "POST"
      },
      "columnDefs": [{
        "targets": [0, 3],
        "orderable": false
      }],
    }).buttons().container().appendTo('#tbl1_wrapper .col-md-6:eq(0)');

    $('#tblPenempatan').DataTable({
      "order": [],
      "processing": true,
      "serverSide": true,
      "responsive": true,
      "lengthMenu": [
        [10, 20, 50, 100],
        [10, 20, 50, 100]
      ],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "ajax": {
        "url": "<?= site_url('data/dataPenempatan') ?>",
        "type": "POST"
      },
      "columnDefs": [{
        "targets": [0, 6],
        "orderable": false
      }],
    }).buttons().container().appendTo('#tbl1_wrapper .col-md-6:eq(0)');

    // $('#tblSkillPegawai').DataTable({
    //   "order": [],
    //   'rowsGroup': [1, 2, 3],
    //   "processing": true,
    //   "serverSide": true,
    //   "responsive": true,
    //   "lengthMenu": [
    //     [10, 20, 50, 100],
    //     [10, 20, 50, 100]
    //   ],
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
    //   "ajax": {
    //     "url": "<?= site_url('data/dataSkill') ?>",
    //     "type": "POST"
    //   },
    //   "columnDefs": [{
    //     "targets": [0, 4, 5, 6],
    //     "orderable": false
    //   },
    //   {
    //     "targets": [0],
    //     "visible": false
    //   }],
    // }).buttons().container().appendTo('#tbl1_wrapper .col-md-6:eq(0)')
    var table = $('#tblSkillPegawai').DataTable({
      "order": [],
      'rowsGroup': [1, 2, 3],
      "processing": true,
      "serverSide": true,
      "responsive": true,
      "lengthMenu": [
        [10, 20, 50, 100],
        [10, 20, 50, 100]
      ],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "ajax": {
        "url": "<?= site_url('data/dataSkill') ?>",
        "type": "POST"
      },
      "columnDefs": [{
        "targets": [0, 4, 5, 6],
        "orderable": false
      },
      {
        "targets": [0],
        "visible": false
      }],
    }).buttons().container().appendTo('#tbl1_wrapper .col-md-6:eq(0)');
  </script>

  <!-- script untuk menghilngkan flashdata otomatis -->
  <script>
    window.setTimeout(function () {
      $('.alert').fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
      });
    }, 2000);
  </script>
  <script src="<?= base_url() ?>/public/dist/js/jam_digital.js"></script>


</body>

</html>