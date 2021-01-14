<?php
$titre = 'update';
require_once '../classes/user.php';
require_once '../classes/validator.php';
session_start();
if (!(isset($_SESSION['user']))) {
    header('location:connexion.php');
}

if (isset($_POST['formprofil'])) {

    $validator = new validator();
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);

    if ($validator->userExists($login) == 1) {
        if ($validator->sameLogin($login, $_SESSION['user']->getLogin()) == 1) {
            $errors[] = "Ce login est déjà pris.";
        }
    }
    if ($validator->passwordConfirm($password, $password2) == 0) {
        $errors[] = "Les deux mots de passe ne sont pas identiques.";
    }
    if ($validator->passwordStrenght($password) == 0) {
        $errors[] = "Le mot de passe doit comporter au moins un chiffre.";
    }

    if (empty($errors)) {
        $_SESSION['user']->update($login, $password);
        $success = "Votre compte a bien été modifié. <a href='level.php'>Tirer les cartes</a>";
    }

}

?>

<html lang="en">
<?php include '../includes/header.php'; ?>

<main class="valign-wrapper container">
    <article class="row">
        <h3 class="center">Modifiez vos identifiants</h3>
        <p class="grey-text center"><em>si cela peut vous aider.</em></p>

        <!--Alerte (erreur ou succès)-->
        <?php if (!empty($errors)): ?>
            <div>
                <?php foreach ($errors as $error) {
                    echo '<p class="red-text">' . $error . '</p>';
                } ?>
            </div>
        <?php elseif (isset($success)): ?>
            <div>
                <p class="white-text"><?php echo $success; ?></p>
            </div>
        <?php endif; ?>

        <!--Formulaire-->
        <form class="col s12" action="update.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="login" id="login" type="text" name="login" maxlength="20"
                           class="validate white-text"/>
                    <label for="login">New Login</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate white-text" name="password" maxlength="20"/>
                    <label for="password">Nouveau Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password2" type="password" class="validate white-text" name="password2" maxlength="20"/>
                    <label for="password2">Confirmation Password</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light black" type="submit" name="formprofil">Submit
                <i class="material-icons right">send</i>
            </button>
        </form>

    </article>
</main>

<?php include '../includes/footer.php'; ?>
</html>
