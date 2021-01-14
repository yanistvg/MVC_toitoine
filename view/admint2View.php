<?php $title="Connexion" ?>

<?php
ob_start();
?>

	          
    <div class="admin-menu">
      <img id="adminMenuLogo" src="public/images/logo-1.png">
      <img id="adminPic" src="public/images/ppseb.jpg">
      <span id="adminUsername">Sébastien Auberger</span>
      <nav>
        <ul>
          <a href="?page=admint2&action=userlist" title="Affichage de la liste des utilisateurs"><li>Utilisateurs</li></a>
          <a href="?page=admint2&action=questionnaires" title="Affichage des statistiques du/des questionnaires"><li>Questionnaires</li></a>
        </ul>
      </nav>
      <a href="?page=admint2&disconnect=1"><button title="Se déconnecter" class="btn btn-danger disconnect">Déconnexion</button></a>    </div>
    <div class="content">
      <?php echo $action; ?>
    </div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php');