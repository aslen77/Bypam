<?php
$app=new Application();
$app->affiche(0,"where id='".$_GET['id_app']."'");
?>
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="profile">
            <div class="profile-wrapper">
				<a title="Visualiser" target='_new' href="template/<?php echo $app->id_template; ?>/index.php?id_t=<?php echo $app->id_template?>&id_app=<?php echo $app->id; ?>">
				  <img src="images/logos/<?php echo $app->logo; ?>" alt="profile">
				</a>  
				<div class="profile-details">
					<p class="name"><?php echo $app->nom; ?></p>
				  </div>
				
            
            </div>
          </li>
 <li><a></a></li>
          <li class="nav-item">
            <a class="nav-link" href="personnaliser.php?&id_app=<?php echo $_GET['id_app']; ?>" >
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Accueil</span>
            </a>

          </li>          
		  <li class="nav-item">
            <a class="nav-link" href="personnaliser.php?p=templates&id_app=<?php echo $_GET['id_app']; ?>" >
              <i class="fa fa-palette menu-icon"></i>
              <span class="menu-title">Gérer Templates</span>
            </a>

          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-menu" aria-expanded="false" aria-controls="form-menu">
              <i class="fa fa-list-ul menu-icon"></i>
              <span class="menu-title">Gérer Menus</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-menu">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="personnaliser.php?p=ajouter_menu&id_app=<?php echo $_GET['id_app']; ?>">Ajouter Menu</a></li>                
                <li class="nav-item"><a class="nav-link" href="personnaliser.php?p=consulter_menu&id_app=<?php echo $_GET['id_app']; ?>">Consulter Menu</a></li>
              </ul>
            </div>          
		</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="fa fa-edit menu-icon"></i>
              <span class="menu-title">Gérer Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="personnaliser.php?p=ajouter_page&id_app=<?php echo $_GET['id_app']; ?>">Ajouter page</a></li>                
                <li class="nav-item"><a class="nav-link" href="personnaliser.php?p=consulter_page&id_app=<?php echo $_GET['id_app']; ?>">Consulter pages</a></li>
              </ul>
            </div>
		  </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
              <i class="fa fa-database menu-icon"></i>
              <span class="menu-title">Gérer Base de données</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-advanced">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dragula.html">Dragula</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/clipboard.html">Clipboard</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/context-menu.html">Context menu</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/slider.html">Sliders</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/carousel.html">Carousel</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/colcade.html">Colcade</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/loaders.html">Loaders</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="fab fa-wpforms menu-icon"></i>
              <span class="menu-title">Gérer extensions</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>                
                <li class="nav-item"><a class="nav-link" href="pages/forms/advanced_elements.html">Advanced Elements</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/forms/validation.html">Validation</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/forms/wizard.html">Wizard</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
              <i class="fa fa-pen-square menu-icon"></i>
              <span class="menu-title">Gérer composants</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="editors">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/text_editor.html">Text editors</a></li>
                <li class="nav-item"><a class="nav-link" href="pages/forms/code_editor.html">Code editors</a></li>
              </ul>
            </div>
          </li>
	   </ul>
      </nav>
      <!-- partial -->
