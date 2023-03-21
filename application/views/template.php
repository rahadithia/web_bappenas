<!doctype html>
<html lang="en" class="light-theme color-header headercolor1">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" />
  <!--plugins-->
  <link href="<?php echo base_url(); ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

  <!-- <link href="<?php echo base_url(); ?>assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css"> -->
  <link href="<?php echo base_url(); ?>assets/plugins/datatablev2/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/plugins/datatablev2/fixedColumns.bootstrap5.min.css" rel="stylesheet" />

  <link href="<?php echo base_url(); ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- Bootstrap CSS -->
  <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
  <link href="<?php echo base_url(); ?>assets/css/pace.min.css" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="<?php echo base_url(); ?>assets/css/dark-theme.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/css/light-theme.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/css/semi-dark.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/css/header-colors.css" rel="stylesheet" />

  <title><?php echo $title; ?> - Bappenas Tes</title>

  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
</head>

<body>
  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
    <!-- <header class="top-header">
      <nav class="navbar navbar-expand gap-3">
        <div class="mobile-toggle-icon fs-3">
          <i class="bi bi-list"></i>
        </div>
        <div class="top-navbar-right ms-auto">
          <ul class="navbar-nav align-items-center">
            <li class="nav-item dropdown dropdown-user-setting">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                <div class="user-setting d-flex align-items-center">
                  <?php if ($this->session->userdata('foto_pegawai')) {
                    $foto_profil = $this->session->userdata('foto_pegawai');
                  } else {
                    $foto_profil = base_url() . "assets/images/avatars/avatar-1.png";
                  } ?>

                  <img src="<?php echo $foto_profil; ?>" class="user-img" alt="">
                  &nbsp;&nbsp;<h6 class="mb-0 dropdown-user-name"><?php echo $this->session->userdata('nama_pegawai'); ?></h6>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="<?php echo base_url('infopengguna'); ?>">
                    <div class="d-flex align-items-center">
                      <img src="<?php echo $foto_profil; ?>" alt="foto" class="rounded-circle" width="54" height="54">
                      <div class="ms-3">
                        <h6 class="mb-0 dropdown-user-name" title="<?php echo $this->session->userdata('nama_pegawai'); ?>"><?php echo readMore($this->session->userdata('nama_pegawai'), 20); ?></h6>
                        <small class="mb-0 dropdown-user-designation text-secondary"><?php echo strtoupper($this->session->userdata('nama_level')); ?></small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item" href="<?php echo base_url('infopengguna'); ?>">
                    <div class="d-flex align-items-center">
                      <div class=""><i class="bi bi-person-fill"></i></div>
                      <div class="ms-3"><span>Profile</span></div>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <?php if ($this->session->userdata('is_pegawai') == '0') { ?>
                  <li>
                    <a class="dropdown-item" href="<?php echo base_url('ganti_pass'); ?>">
                      <div class="d-flex align-items-center">
                        <div class=""><i class="bi bi-key-fill"></i></div>
                        <div class="ms-3"><span>Ubah Password</span></div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                <?php } ?>
                <li>
                  <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">
                    <div class="d-flex align-items-center">
                      <div class=""><i class="bi bi-lock-fill"></i></div>
                      <div class="ms-3"><span>Logout</span></div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header> -->
    <!--end top header-->

    <!--start content-->
    <main style="padding: 1.5rem;">
      <?php echo $contents; ?>
    </main>
    <!--end page main-->


    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="<?php echo base_url(); ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/pace.min.js"></script>

  <!-- <script src="<?php echo base_url(); ?>assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatable/extensions/FixedColumns/js/dataTables.fixedColumns.min.js"></script> -->

  <script src="<?php echo base_url(); ?>assets/plugins/datatablev2/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatablev2/dataTables.bootstrap5.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/datatablev2/dataTables.fixedColumns.min.js"></script>

  <!-- gmaps -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBfQ8rmClSZaFgj98k0ErQK4i_6kjUHTE&callback=initialize"></script>
  <!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true" async="async"></script> -->
  <script type="text/javascript" src="<?= base_url('assets/vendors/gmaps-master/gmaps.min.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/vendors/jquery.redirect/jquery.redirect.js') ?>"></script>

  <script src="<?php echo base_url(); ?>assets/plugins/select2/js/select2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.redirect.js"></script>
  <!--app-->
  <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/loadingoverlay.min.js"></script>
  <!-- arcgis -->
  <!-- <link rel="stylesheet" href="https://js.arcgis.com/4.22/esri/themes/light/main.css" /> -->
  <!-- <link rel="stylesheet" href="https://js.arcgis.com/4.8/esri/css/main.css"> -->
  <!-- <script src="https://js.arcgis.com/4.22/"></script> -->
  <link rel="stylesheet" href="https://js.arcgis.com/4.8/esri/css/main.css">
  <script src="https://js.arcgis.com/4.8/"></script>
</body>

</html>