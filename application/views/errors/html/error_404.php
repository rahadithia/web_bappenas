<!doctype html>
<html lang="en" class="light-theme">

<head>
  <?php 
  $url = $_SERVER['SCRIPT_NAME'];
  $url = substr($url,0,strpos($url,".php"));
  $url = substr($url,0,(strlen($url) - strpos(strrev($url),"/")));
  $url = ((empty($_SERVER['HTTPS']) OR $_SERVER['HTTPS'] === 'off') ? 'http' : 'https')."://".$_SERVER['HTTP_HOST'].$url;
  ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo $url; ?>assets/images/favicon.ico"/>
  <!-- Bootstrap CSS -->
  <link href="<?php echo $url; ?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo $url; ?>assets/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="<?php echo $url; ?>assets/css/style.css" rel="stylesheet" />
  <link href="<?php echo $url; ?>assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="<?php echo $url; ?>assets/css/pace.min.css" rel="stylesheet" />

  <title>404</title>
</head>

<body>

  <div class="error-404 d-flex align-items-center justify-content-center mt-5">
      <div class="container">
        <div class="card py-5">
          <div class="row g-0">
            <div class="col col-xl-5">
              <div class="card-body p-4">
                <h1 class="display-1"><span class="text-danger">4</span><span class="text-primary">0</span><span class="text-success">4</span></h1>
                <h2 class="font-weight-bold display-4">Lost in Space</h2>
                <p>You have reached the edge of the universe.
                  <br>The page you requested could not be found.
                  <br>Dont'worry and return to the previous page.</p>
                <div class="mt-5"> <a href="<?php echo $url; ?>dashboard" class="btn btn-primary btn-lg px-md-5 radius-30">Go Home</a>
                </div>
              </div>
            </div>
            <div class="col-xl-7">
              <img src="<?php echo $url; ?>assets/images/error/404-error.png" class="img-fluid" alt="">
            </div>
          </div>
          <!--end row-->
        </div>
      </div>
    </div>


  <!--plugins-->
  <script src="<?php echo $url; ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo $url; ?>assets/js/pace.min.js"></script>
</body>

</html>