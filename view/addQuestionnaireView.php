<?php
ob_start();
?>
          
   <h3 class="admtitle">Ajouter un questionnaire</h3>
   <center>
        <form method="post" action="?page=admint2&action=questionnaires">
          <div class="formLine">
            <label>Nom du questionnaire:</label>
            <input type="text" name="name" placeholder="Nom du questionnaire">
          </div>
          <div class="formLine">
            <center><input class="btn btn-info" type="submit" value="Ajout"></center>
          </div>
    </center>
        </form>

<?php $addQuestionnaire = ob_get_clean(); ?>