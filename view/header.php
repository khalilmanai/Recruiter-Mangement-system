<?php 

error_reporting(E_ALL ^ E_NOTICE);  
?>

<header>
		<nav id="main-navbar" class="navbar navbar-default navbar-fixed-top">
			<div class="container navbar-container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">JobFinder.tn</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="http://127.0.0.1/LAMESN/PFA_final/">Accueil</a></li>
						<li><a href="index.php?controller=offreEmploi&action=All">offre d'emploi</a></li>
					</ul>
				</div>
				<div class="top-social">
					<ul id="top-social-menu">
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<?php
						if (session_status() === PHP_SESSION_NONE) {
						    session_start();
						}
							if(isset($_SESSION['id'])){ 
								$user = $_SESSION["user"];

								if($_SESSION['is_recruteur'] == 1){ ?>
									<li><a href="index.php?controller=recruteur&action=profil"> Bienvenue <?php  echo $user->raison_social ?></a></li>
								<?php	}else if($_SESSION['is_recruteur'] == 0){ ?>
									<li><a href="index.php?controller=candidat&action=profil"> Bienvenue <?php echo $user->nom_prenom ?></a></li>
									<?php	}
								?>
								<li><a href="index.php?controller=user&action=logout"> Déconnexion</a></li>
						<?php	}else { ?>
						<li><a class="login-trigger" href="#" data-target="#login" data-toggle="modal">Connexion</a></li>
						<li><a class="login-trigger"  data-toggle="modal" href="index.php?controller=recruteur&action=create">Recruteur</a></li>
						<li><a class="login-trigger"  data-toggle="modal" href="index.php?controller=candidat&action=create">Candidat</a></li>
						<?php	} ?>
						</ul>
				</div>
			</div>
		</nav>
	</header>

<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">
    
    <div class="modal-content">
      <div class="modal-body">
        <button data-dismiss="modal" class="close">&times;</button>
        <h4>Login</h4>
        <form class="formLogin" method="POST" action="index.php?controller=user&action=login">
          <input type="text" name="login" class="username form-control" placeholder="login"/>
          <input type="password" name="pwd" class="password form-control" placeholder="mot d passe"/>
          <input class="btn login" type="submit" value="Connexion" />
        </form>
      </div>
    </div>
  </div>  
</div>
	
		