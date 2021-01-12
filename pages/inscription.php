<?php
$titre = 'inscription';
require_once '../classes/user.php';
require_once '../classes/validator.php';
session_start();


if (isset($_POST['forminscription'])) {

    $validator = new validator();
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);

    if ($validator->userExists($login) == 1) {
        $errors[] = "Ce login est déjà pris.";
    }
    if ($validator->passwordConfirm($password, $password2) == 0) {
        $errors[] = "Les deux mots de passe ne sont pas identiques.";
    }
    if ($validator->passwordStrenght($password) == 0) {
        $errors[] = "Le mot de passe doit comporter au moins un chiffre.";
    }

    if (empty($errors)) {
        $user = new user();
        $user->register($login, $password);
        $success = "Votre compte a bien été créé. <a href='connexion.php'>Me connecter</a>";
    }

}
?>

<html lang="en">

<?php include '../includes/header.php'; ?>

<main class="valign-wrapper">

    <!--FORMULAIRE-->
    <div class="row">
        <h3 class="center">INSCRIPTION</h3>

        <?php if (!empty($errors)): ?>
            <div>
                <?php foreach ($errors as $error) {
                    echo '<p class="red-text">' . $error . '</p>';
                } ?>
            </div>
        <?php elseif (isset($success)): ?>
            <div>
                <?php {
                    echo '<p class="green-text">' . $success . '</p>';
                } ?>
            </div>
        <?php endif; ?>

        <form class="col s12" action="inscription.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="login" id="login" type="text" name="login" class="validate"
                           value="<?php if (isset($login)) {
                               echo $login;
                           } ?>" maxlength="20" required/>
                    <label for="login">Login</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="password" maxlength="20" required/>
                    <label for="password">Password</label>
                    <span class="helper-text">Le mot de passe doit comporter au moins un chiffre.</span>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="password2" type="password" class="validate" name="password2" maxlength="20" required/>
                    <label for="password2">Confirmation Password</label>
                </div>
            </div>

            <button class="btn waves-effect waves-light black" type="submit" name="forminscription">Submit
                <i class="material-icons right">send</i>
            </button>
        </form>

    </div>

</main>

<?php include '../includes/footer.php'; ?>

</html>