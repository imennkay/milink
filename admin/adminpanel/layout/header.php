<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <span class="logo-lg"><b>Milink</b></span>
    </a>
    <nav class="navbar navbar-static-top">     
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../images/<?php echo $success_login_image_admin; ?>" class="user-image" alt="User Image">
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../images/<?php echo $success_login_image_admin; ?>" class="zoom3" alt="User Image">

                <p>
                  <?php echo $success_login_username_admin; ?> - Web Developer
                  
                </p>
              </li>
             
                <div class="pull-right">
                  <a href="../layout/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
    </nav>
  </header>
