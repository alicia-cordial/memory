<?php
$titre = 'Niveau';
session_start();
/*if (!isset($_SESSION['user'])) {
    header("location: connexion.php");
}*/
$pairsmin = 3; // min niveau
$pairsmax = 12; // max niveau

if (isset($_POST['submit'])) {
    $_SESSION['level'] = $_POST['submit']; //sauvegarde le choix du niveau dans la session
    header('location:memory.php');
}
?>

<html>
<?php include '../includes/header.php'; ?>

<main class="valign-wrapper center-align">
    <div class="container">
        <h1 class="white-text"><em>Nombres de paires</em></h1>
        <form action="level.php" method="post" class="row">
            <?php
            for ($i = $pairsmin; $i <= $pairsmax; $i++) {
                echo
                    "<div class='col'>
                    <button class='black white-text btn-large buttonlevel' type='submit' name='submit' value='" . $i . "'>" . $i . "</button>
                </div>";
            } ?>
        </form>
    </div>
</main>

<?php include '../includes/footer.php'; ?>

</html>