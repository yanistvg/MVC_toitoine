<?php
ob_start();
?>
  <?php 
    if(isset($_GET['page']))
    {
      if($_GET['page'] == "admint1")
      {
        ?>
        <h3 class="admtitle">Liste des utilisateurs</h3>
      <center>
          <table>
            <thead class="thead-dark">
              <tr>
                <th scope="col">Utilisateur</th>
                <th scope="col">Mot de passe</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $secondUserManager = new secondUser();
                $userList = $secondUserManager->getUsersFromUsername($_SESSION['specia_username']);
                foreach($userList as $user)
                {
                  ?>
                    <tr>
                      <td><?php echo $user['username']; ?></td>
                      <td><?php echo $user['password']; ?></td>
                    </tr>
                  <?php
                }
              ?>
            </tbody>
          </table>
        </center>
        <?php
      }
      elseif($_GET['page'] == "admint2")
      {
        ?>
        <h3 class="admtitle">Liste des utilisateurs</h3>
        <center>
          <table>
            <thead class="thead-dark">
              <tr>
                <th scope="col">Utilisateur</th>
                <th scope="col">Mot de passe</th>
                <th scope="col">Nombres de comptes</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Email</th>
                <th scope="col">Afficher les infos</th>
              </tr>
            </thead>
            <tbody>
              <?php      
              $userManager = new userManager();
              $userlist = $userManager->getUsers();
              foreach($userlist as $user)
              {
              ?>
                <tr>
                  <td><?php echo $user['username'] ?></td>
                  <td><?php echo $user['password'] ?></td>
                  <td><?php echo $user['nbrUsers'] ?></td>
                  <td><?php if($user['tel'] != ""){echo $user['tel'];} else{echo "Pas de numéro";} ?></td>
                  <td><?php if($user['email'] != ""){echo $user['email'];} else{echo "Aucun email";} ?></td>
                  <td><a href="?page=admint2&action=userView&user=<?php echo $user['username'] ?>"><button class="btn btn-info">Afficher</button></a></td>
                </tr>

              <?php
              }
              ?>
            </tbody>
          </table>
          <a href="?page=admint2&action=addUser"><button class="btn btn-info">Ajouter un utilisateur</button></a>
        </center>
        <?php
      }
      else
      {
        echo "Erreur lors du choix affichage pages";
      }
    }
    else
    {
      echo "Erreur à l'affichage de la page";
    }

    ?>

<?php $userList = ob_get_clean(); ?>