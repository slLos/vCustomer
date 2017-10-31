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

      <!--   Core JS Files   -->
      <?= $this->Html->script('jquery-3.1.0.min.js') ?>
      <?= $this->Html->script('bootstrap.min.js') ?>
      <?= $this->Html->script('material.min.js') ?>
      <?= $this->Html->script('perfect-scrollbar.min.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
  <div class="wrapper">
    <div class="sidebar" data-color="custom" data-image="/agenda/img/sidebar-3.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
      -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
          Oficina de serviços
        </a>
      </div>

      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
              <img src="https://scontent.fgru3-1.fna.fbcdn.net/v/t1.0-9/17884251_1754776054537398_3392479789345023046_n.jpg?oh=3440f2f8bdd6124aa749beb6c9362ea9&oe=59BF1A1E" class="img-responsive">
          </div>
          <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed" aria-expanded="false">
              Leonardo Leitão
              <b class="caret"></b>
            </a>
            <div class="collapse" id="collapseExample" aria-expanded="false" style="height: auto;">
              <ul class="nav">
                <li>
                  <a href="#">Perfil</a>
                </li>
                <li>
                  <a href="#">Editar Perfil</a>
                </li>
                <li>
                  <a href="#">Configurações</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          

          <?php foreach($menu as $option): ?>
            <?php if(isset($option['options']) && count($option['options']) > 0): ?>
              <li>
                <a data-toggle="collapse" href="#<?= $option['id'] ?>-dropdown" class="collapsed" aria-expanded="false">
                  <i class="material-icons"><?= $option['icon'] ?></i>
                  <p><?= $option['label'] ?>
                    <b class="caret"></b>
                  </p>
                </a>

                <div class="collapse" id="<?= $option['id'] ?>-dropdown" aria-expanded="false" style="height: 0px;">
                  <ul class="nav dropdown-nav">
                    <?php foreach($option['options'] as $sub): ?>
                      <?php $url = $this->Url->build(["controller" => $sub['controller'], "action" => $sub['action']]); ?>
                      <li>
                        <a href="<?= $url; ?>"><?= $sub['label'] ?></a>
                      </li>
                    <?php endforeach; ?>
                  </ul>

                </div>
              </li>
            <?php else: ?>
              <li class="<?= $option['class']; ?>">
              <?php $url = $this->Url->build(["controller" => $option['controller'], "action" => $option['action']]); ?>
                <a href="<?= $url; ?>">
                  <i class="material-icons"><?= $option['icon'] ?></i>
                  <p><?= $option['label'] ?></p>
                </a>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
          

        </ul>
      </div>
    </div>

    <div class="main-panel">
      <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?= $sectionName; ?></a>
          </div>

          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="material-icons">dashboard</i>
                  <p class="hidden-lg hidden-md">Dashboard</p>
                </a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="hidden-lg hidden-md">Notifications</p>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Mike John responded to your email</a></li>
                  <li><a href="#">You have 5 new tasks</a></li>
                  <li><a href="#">You're now friend with Andrew</a></li>
                  <li><a href="#">Another Notification</a></li>
                  <li><a href="#">Another One</a></li>
                </ul>
              </li>
              <li>
                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                   <i class="material-icons">person</i>
                   <p class="hidden-lg hidden-md">Profile</p>
                </a>
              </li>
            </ul>


            <form class="navbar-form navbar-right" role="search">
              <div class="form-group  is-empty">
                <input type="text" class="form-control" placeholder="Pesquisa">
                <span class="material-input"></span>
              </div>
              <button type="submit" class="btn btn-white btn-round btn-just-icon">
                <i class="material-icons">search</i><div class="ripple-container"></div>
              </button>
            </form>

          </div>
        </div>
      </nav>

      <div class="content">
        <div class="container-fluid">
          <?= $this->fetch('content') ?>
        </div>
      </div>


      <footer class="footer">
        <div class="container-fluid">
          <nav class="pull-left">
            <ul>
              <li>
                <a href="#">
                  Home
                </a>
              </li>
              <li>
                <a href="#">
                  Company
                </a>
              </li>
              <li>
                <a href="#">
                  Portfolio
                </a>
              </li>
              <li>
                <a href="#">
                   Blog
                </a>
              </li>
            </ul>
          </nav>
          <p class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
          </p>
        </div>
      </footer>


    </div>


  </div>
</body>




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

<!--   <script type="text/javascript">
      $(document).ready(function(){

      // Javascript method's body can be found in assets/js/demos.js
          demo.initDashboardPageCharts();

      });
  </script> -->

  <script>
    window.onload = function () {
      [].forEach.call(document.querySelectorAll('.sidebar-wrapper'), function (el) {
        Ps.initialize(el);
      });
    };
  </script>
</html>
