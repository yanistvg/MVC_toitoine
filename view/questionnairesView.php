<?php
ob_start();
?>
   <h3 class="admtitle">Liste des questionnaires</h3>
        <center>
        <table>
          <thead>
            <th>Numéro Questionnaire</th>
            <th>Nom Questionnaire</th>
            <th>Rattachement(s)</th>
            <th>Nombres de question</th>
            <th>Supprimer/Afficher</th>
          </thead>
          <tbody>
            <?php
              $questionnaire = new questionnaireManager();
              $data = $questionnaire->getQuestionnaires();
              foreach($data as $key)
              {
            ?>

            <tr>
              <td><?php echo $key['id']; ?></td>
              <td><?php echo $key['nom']; ?></td>
              <td><?php echo $key['rattachements']; ?></td>
              <td><?php echo $key['nombreQuestion']; ?></td>
              <td><button class="btn btn-danger">Supprimer</button><button class="btn btn-warning">Modifier</button></td>
            </tr>
            <?php 
              }
            ?>
          </tbody>
        </table>
        <a href="?page=admint2&action=addQuestionnaire"><button class="btn btn-info">Ajouter un questionnaire</button></a>
      </center>

<?php $questionnaires = ob_get_clean(); ?>