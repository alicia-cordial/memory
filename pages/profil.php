<?php

$titre = 'profil';
require_once '../classes/score.php';
require_once '../classes/user.php';
session_start();
?>


<html lang="en">

<?php include '../includes/header.php'; ?>
<main class="center">
<h1>Profil</h1>
    <button><a href="update.php">Modifier votre profil</a></button>


    <?php
$score = new score();

$pairsmin = 3; // min niveau
$pairsmax = 12; // max niveau

if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];


if (isset($_POST['submit'])) { //niveau sélectionné
    $level = $_POST['submit'];
    $moves = $score->scoreUserMoves($level, $_SESSION['user']->getId()); //récup scores persos par coups
    $times = $score->scoreUserTime($level, $_SESSION['user']->getId());//récup scores persos par temps
    $twoTables = ['coups' => $moves, 'temps' => $times];
}

}
?>

<!--TABLEAUX TOP PERSO-->

    <article class="container">

<h1 class="white-text center">Progression Personelle</h1>

<?php if (isset($level)) : ?> <!--Affichage scores du niveau sélectionné-->
    <h3 class='white-text center'>Niveau : <?php echo $level; ?> </h3>

    <?php
    foreach ($twoTables as $name => $oneTable) { /*Génération tableaux*/

        echo "<table class='centered' id='tableFame'>";
        echo "<h5>Progression par " . $name . "</h5>";
        $i = 1;

        foreach ($oneTable as $row) {
            if ($i == 1) {
                echo "<thead>";
                foreach ($row as $key => $element) {
                    echo "<th>" . $key . "</th>";
                }
                echo "</thead>";
                $i = 0;
            }
            echo "<tbody>";
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td>" . $cell . "</td>";
            }
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    }
    ?>




<!--DIFFERENTS NIVEAUX-->

<?php else : ?> <!--Affichage boutons sélection niveau-->
    <h5 class="white-text"><em>Veuillez sélectionner un nombre de paires</em></h5>
    <form action="profil.php" method="post" class="row">
        <?php for ($i = $pairsmin; $i <= $pairsmax; $i++) : ?>
                <div class='col'>
                <button class='black white-text btn-large buttonlevel' type='submit' name='submit' value='<?php echo $i ?>'> <?php echo $i ?> </button>
                </div>
        <?php endfor; ?>
    </form>
<?php endif; ?>

</article>

</main>
<?php include '../includes/footer.php'; ?>

</html>

