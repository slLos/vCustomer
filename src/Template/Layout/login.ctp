<?php
$cakeDescription = 'Agenda';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>
    <?= $cakeDescription ?>:
    <?= $this->fetch('title') ?>
  </title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <?= $this->Html->css('bootstrap.min.css') ?>

    <!--  Material Dashboard CSS    -->
    <?= $this->Html->css('material-dashboard.css') ?>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <?= $this->Html->css('demo.css') ?>

    <?= $this->Html->css('perfect-scrollbar.min.css') ?>
    <?= $this->Html->css('main-style.css') ?>
    
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
  	<div class="wrapper" style="background: url(http://demos.creative-tim.com/material-dashboard-pro/assets/img/login.jpeg);">
		<div class="content">
			<div class="container-fluid">
			  <?= $this->fetch('content') ?>
			</div>
		</div>


		<br>

  	</div>
</body>



  <!--   Core JS Files   -->
  <?= $this->Html->script('jquery-3.1.0.min.js') ?>
  <?= $this->Html->script('bootstrap.min.js') ?>
  <?= $this->Html->script('material.min.js') ?>
  <?= $this->Html->script('perfect-scrollbar.min.js') ?>

  <!--  Charts Plugin -->
  <?= $this->Html->script('chartist.min.js') ?>

  <!--  Notifications Plugin    -->
  <?= $this->Html->script('bootstrap-notify.js') ?>

  <!--  Google Maps Plugin    -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

  <!-- Material Dashboard javascript methods -->
  <?= $this->Html->script('material-dashboard.js') ?>

  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <?= $this->Html->script('demo.js') ?>

  <script type="text/javascript">
      $(document).ready(function(){

      // Javascript method's body can be found in assets/js/demos.js
          demo.initDashboardPageCharts();

      });
  </script>

  <script>
      window.onload = function () {
        [].forEach.call(document.querySelectorAll('.sidebar-wrapper'), function (el) {
          Ps.initialize(el);
        });
      };
    </script>
</html>
