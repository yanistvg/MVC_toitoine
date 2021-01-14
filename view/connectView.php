<?php $title="Connexion" ?>

<?php
ob_start();
?>

	
          
      <div class="container">
          
        <div class="row justify-content-center align-items-center" style="height:100vh">
            
           <div class="card" style="margin-top: -90px">
           <div class="card-body" >  
               <form action="#" method="post" name="login">
                   <h1 class="alert alert-dismissible alert-info">Page de Connexion</h1>
                        <form action = "" method = "post"> 
                            
  
                        <div class="container-login">
                           <div class="form-group">
                            <label for="login">Login :</label> 
                            <input
                                class="form-control" 
                                type="text"
                                name="login"
                                placeholder="Saisir login"/>
                             </div> 
                            
                            <div class="form-group">
                            <label for="password">Mot De Passe :</label>
                            <input
                                class="form-control"    
                                type="password"
                                name="password" 
                                placeholder="Saisir mot de passe"/>
                             </div> 
                             <a href="page2.php">
                            <button class="btn btn-block btn-outline-info">   Valider    </button></a>
                            </div> 
              </form>
           </form>
          </div> 
          </div> 
          </div> 
          </div>
            
       

<?php $content = ob_get_clean(); ?>
<?php require('template.php');