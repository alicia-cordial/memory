<?php
$titre = 'Niveau';
session_start();
$pairsmin = 3; // min niveau
$pairsmax = 12; // max niveau

if (isset($_POST['submit'])) {
    $_SESSION['level'] = $_POST['submit']; //envoie du choix du niveau dans la session
    header('location:memory.php');
}
?>

<html>
<?php include '../includes/header.php'; ?>

<main class="valign-wrapper">
    <div class="container center-align">
        <h1>Nombres de paires</h1>
        <form action="level.php" method="post" class="row">
            <?php
            for($i = $pairsmin; $i <= $pairsmax; $i++) {
                echo
                "<div class='col'>
                    <button class='black white-text btn-large btn-flat buttonlevel' type='submit' name='submit' value='" .$i. "'>" . $i."</button>
                </div>";
            }?>
        </form>
    </div>
</main>

<?php include '../includes/footer.php'; ?>

</html>