<?php
$titre = 'Niveau';
session_start();
if (!isset($_SESSION['user'])) {
    header("location: connexion.php");
}
if (isset($_SESSION['level'])) {
    header("location:restart.php");
}
$pairsmin = 3; //pour générer les boutons
$pairsmax = 12;

if (isset($_POST['submit'])) {
    $_SESSION['level'] = $_POST['submit']; //sauvegarde le choix du niveau dans la session
    header('location:memory.php');
}
?>

<html lang="en">
<?php include '../includes/header.php'; ?>

<main class="valign-wrapper center-align">
    <article class="container">
        <h3 class="white-text">Concentrez-vous...</h3>
        <p class="grey-text"><em>et sélectionnez un nombre de paires</em></p>
        <form action="level.php" method="post" class="row">
            <?php for ($i = $pairsmin; $i <= $pairsmax; $i++) {
                echo
                    "<div class='col'>
                    <button class='black white-text btn-large buttonlevel' type='submit' name='submit' value='" . $i . "'>" . $i . "</button>
                </div>";
            } ?>
        </form>
    </article>
</main>

<?php include '../includes/footer.php'; ?>
</html>