<?php
ob_start();
?>
<?php      
      $userManager = new userManager();
      $user = $userManager->getSingleUser($_GET['user']);
?>
   <h3 class="admtitle">Affichage utilisateur: <?php echo $user["username"]; ?></h3>
        <center>
        <table>
          <thead>
            <th>Nom</th>
            <th>Mot de passe</th>
            <th>Nombre d'utilisateur</th>
            <th>Téléphone</th>
            <th>Email</th>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $user['username']; ?></td>
              <td><?php echo $user['password']; ?></td>
              <td><?php echo $user['nbrUsers']; ?></td>
              <td><?php echo $user['tel']; ?></td>
              <td><?php echo $user['email']; ?></td>
            </tr>
          </tbody>
        </table>
        <a href="#"><button class="btn btn-info">Modifier l'utilisateur</button></a>
      </center>

<?php $userView = ob_get_clean(); ?>