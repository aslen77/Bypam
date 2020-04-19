    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php"><img src="images/logo.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="template/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">


        <ul class="navbar-nav navbar-nav-right">
		<?php if(isset($_GET['p']))
		{
		?>
			<li  class="nav-item"><button onclick="javascript:document.location.replace('index.php?p=creer_application')" type="button" class="btn btn-sm btn-outline-info">Créer Application</button></li>
			<li  class="nav-item"><button onclick="javascript:document.location.replace('index.php?p=mes_application')" type="button" class="btn btn-sm btn-outline-warning">Mes Applications</button></li>
		<?php
		}
		if(isset($_GET['personnalier']))
		{
			?>
			<li  class="nav-item"><button onclick="javascript:document.location.replace('personnaliser.php?id_app=<?php echo $_SESSION['id_app']; ?>')" type="button" class="btn btn-sm btn-outline-success">Personnaliser</button></li>
			<?php
		}
		?>
		 <li class="nav-item nav-profile dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/users/<?php echo $u->photo; ?>" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="index.php?p=profil" class="dropdown-item">
                <i class="fa fa-cog text-primary"></i>
                Profil
              </a>
              <div class="dropdown-divider"></div>
              <a href="index.php?logout" class="dropdown-item">
                <i class="fa fa-sign-out-alt text-primary"></i>
                Deconnecter
              </a>
            </div>
          </li>

        </ul>

      </div>
    </nav>
    <!-- partial -->
