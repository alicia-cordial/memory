<?php
$score = new score();

$pairsmin = 3; // min niveau
$pairsmax = 12; // max niveau

if (isset($_POST['submit'])) { //niveau sélectionné
    $level = $_POST['submit'];
    $moves = $score->scoreByMoves($level); //récup scores persos par coups
    $times = $score->scoreByTime($level);//récup scores persos par temps
    $twoTables = ['coups' => $moves, 'temps' => $times];
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
