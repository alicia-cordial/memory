<?php
$titre = 'wall of fame';
require_once '../classes/score.php';
session_start();
$score = new score();

$pairsmin = 3; // min niveau
$pairsmax = 12; // max niveau

if (isset($_POST['submit'])) { //niveau sélectionné
    $level = $_POST['submit'];
    $moves = $score->scoreByMoves($level); //récup scores par coups
    $times = $score->scoreByTime($level);//récup scores par temps
    $twoTables = ['coups' => $moves, 'temps' => $times];
}
?>

<html>
<?php include '../includes/header.php'; ?>

<main id="main_fame">
    <article class="container">

        <h1 class="white-text center">Wall of fame</h1>

        <?php if (isset($level)) : ?> <!--Affichage scores du niveau sélectionné-->
            <h3 class='white-text center'>Niveau : <?php echo $level; ?> </h3>

            <section class="section3">
            <?php
            foreach ($twoTables as $name => $oneTable) { /*Génération tableaux*/

                echo "<table class='centered tableFame'>";
                echo "<h5 class='white-text center'>TOP 10 par " . $name . "</h5>";
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

            </section>
        <?php else : ?> <!--Affichage boutons sélection niveau-->
            <h5 class="white-text"><em>Veuillez sélectionner un nombre de paires</em></h5>
            <form action="walloffame.php" method="post" class="row">
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