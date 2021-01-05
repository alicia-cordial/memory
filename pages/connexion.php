<?php?>


<main class="valign-wrapper">
   <div class="row">
    <form class="col s12" action="connexion.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="login" id="login" type="text" name="login" class="validate" required/>
          <label for="login">Login</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password" required/>
          <label for="password">Password</label>
        </div>
      </div>
 
     
  <button class="btn waves-effect waves-light black " type="submit" name="formconnexion">Submit
    <i class="material-icons right">send</i>
  </button>
        <?php
if (isset($erreur))
{
  echo $erreur;
}
?>
    </form>
  </div>

</main>