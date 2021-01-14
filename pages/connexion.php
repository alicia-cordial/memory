<?php
$titre = "connexion";
require_once '../classes/user.php';
require_once '../classes/validator.php';

session_start();


if (isset($_POST['formconnexion'])) {

    $validator = new validator;

    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    if ($validator->passwordConnect($login, $password) == 0) {
        $errors[] = "Vérifiez votre login ou votre mot de passe.";
    } else {
        $user = new user();
        $user->connect($login);
        $_SESSION['user'] = $user;
        header("Location: profil.php");

    }

}

?>

<html>

<?php include '../includes/header.php'; ?>


<main class="valign-wrapper">
    <div class="row">
        <h3 class="center">CONNEXION</h3>

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


        <form class="col s12" action="connexion.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="login" id="login" type="text" name="login" class="validate white-text"
                           required/>
                    <label for="login">Login</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate white-text" name="password" required/>
                    <label for="password">Password</label>
                </div>
            </div>


            <button class="btn waves-effect waves-light black " type="submit" name="formconnexion">Submit
                <i class="material-icons right">send</i>
            </button>

        </form>
    </div>

</main>

<?php include '../includes/footer.php'; ?>

</html>