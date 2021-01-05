<?php?>


<main class="valign-wrapper">

    
        <!--FORMULAIRE--> 
      

<div class="row">
  <form class="col s12" action="inscription.php" method="post">
    <div class="row">
        <div class="input-field col s12">
          <input placeholder="login" id="login" type="text" name="login" class="validate" value="<?php if(isset($login)) { echo $login; } ?>"  maxlength="20" required/>
          <label for="login">Login</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password"  maxlength="20" required/>
          <label for="password">Password</label>
        </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
          <input id="password2" type="password" class="validate" name="password2"  maxlength="20" required/>
          <label for="password2">Confirmation Password</label>
      </div>
    </div>

     
  <button class="btn waves-effect waves-light black" type="submit" name="forminscription">Submit
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