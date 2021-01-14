<?php
ob_start();
?>
          
   <h3 class="admtitle">Ajouter un utilisateur</h3>
       <center>
        <form method="post" action="?page=admint2&action=userlist">
          <div class="formLine">
            <label>Nom de l'utilisateur:</label>
            <input type="text" name="username" placeholder="Insérer un nom d'utilisateur">
          </div>
          <div class="formLine">
            <label>Mot de passe:</label>
            <input type="password" name="password">
          </div>
          <div class="formLine">
            <label>Nombre d'utilisateur:</label>
            <input type="text" name="nbrUser">
          </div>
          <div class="formLine">
            <center><label>Questionnaire de rattachement:</label>
            <select name="questionnaire">
            <option value="none">---Merci de choisir un questionnaire---</option>
            <option value="2">Les aliments en Entreprise</option>
            <option value="3">Les conditions de travail</option>
            <option value="4">L'ambiance en entreprise</option>
            <option value="5">Le déroulement des projets de l'entreprise</option>
            </select>
            </center>
          </div>
          <div class="formLine">
            <center><input class="btn btn-info" type="submit" value="Ajout"></center>
          </div>

        </form>
      </center>

<?php $addUser = ob_get_clean(); ?>