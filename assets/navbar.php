<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><span class=""></span> Polsek Wara Utara</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="analisa.php"><span class="glyphicon glyphicon-globe"></span> Analisa</a></li>
        <?php
          //session_start();
          if(!isset($_SESSION['username'])): ?>
          
          <li><a href="daftar.php"><span class="glyphicon glyphicon-phone"></span> Daftar</a></li>
          <li><a href="user.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
  
          <?php endif; ?>
  
        <li><a href="home.php"><span class="glyphicon glyphicon-th"></span> Himbauan</a></li>
        <li><a href="p_list.php"><span class="glyphicon glyphicon-th"></span> Informasi Kejahatan</a></li>
     <!--    <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informasi<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="list.php">Info Kejahatan Via Dekstop</a></li>
            <li><a href="p_list.php">Info Kejahatan Via Smarthphone</a></li>
          </ul>
        </li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lapor<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="aduan.php">Pengaduan Online</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="about.php"><span class="glyphicon glyphicon-grain"></span> About</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropmenu<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php">Index</a></li>
            <li><a href="home.php">Infomasi</a></li>
            <li><a href="list.php">Info</a></li>
            <?php
            //session_start();
            if(!isset($_SESSION['username'])): ?>
            
            <li role="separator" class="divider"></li>
            <li><a href="daftar.php">Daftar</a></li>
            <li><a href="user.php">Login</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="admin.php">Admin</a></li>
            <?php else: ?>
            <li role="separator" class="divider"></li>
            <li><a href="logoutuser.php">Logout</a></li>
            <?php endif; ?>

          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>