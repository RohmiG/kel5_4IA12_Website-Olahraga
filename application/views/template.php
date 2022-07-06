<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 3 meta tag di atas *harus* didahulukan di kepala; konten kepala lainnya harus datang *setelah* tag ini -->
    <meta name="description" content="Web ">
    <!-- code ini akan menampilkan logo-->
    <link rel="icon" href="<?= getLogo('dashboard'); ?>">

    <title>Sport Information</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/COSTUME.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/plugin/foundation-icons/foundation-icons.css'); ?>">

    <script src="<?= base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/yall.min.js'); ?>"></script>
  </head>

  <body>

    <!-- Disini adalah fixed navbar yang tidak berubah -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?= anchor('dashboard', '<img alt="Sport Information" width="40" class="lazy" data-src="'.getLogo().'" src="">', ['class'=>'navbar-brand']); ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <!-- code link untuk pergi ke page lain --> 
            <li><a href="<?= base_url('auth/login/'); ?>">Admin</a></li>
            <li><a href="<?= base_url('cabangOlahraga'); ?>">Cabang Olahraga</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= base_url('profilweb'); ?>">Profil Web</a></li>
                <li><a href="<?= base_url('kontak'); ?>">Contact</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <?= $contents; ?>
    
    <!-- tempat footer-->
    <footer class="footer">
      <div class="container">
	        <div class="col-md-2 col-md-offset-1">
            <p class="text-muted right">&copy; Copyright 2022 Gunadarma University</p>
	        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript">document.addEventListener("DOMContentLoaded",yall());</script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/COSTUME.js'); ?>"></script>
  </body>
</html>
