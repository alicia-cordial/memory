<?php
require_once('../classes/database.php');
$_GET['nbcards'] = 4;
$nbcards = $_GET['nbcards'];
$pdo = new database();

    $pairs1 = $pdo->Select("SELECT * FROM cards  LIMIT $nbcards");
    $pairs2 = $pairs1;
    $deck = array_merge($pairs1, $pairs2);
    // shuffle($deck);

if (isset($_POST['carte'])) {

$deck[$_POST['carte']]['status'] = 'opened';

}
?>

<?php include '../includes/header.php'; ?>

<body>
<main>
    <div class="container">
        <?php
        echo "<table>";
        $i = 1; //compteur cellules pour ligne

        echo "<tr>";
        for($j= 0; $j < count($deck); $j++) {
            echo "<td>";
            if(!isset($deck[$j]['status'])) {
                $deck[$j]['status'] = 'closed';
                }
            if ($deck[$j]['status'] == 'closed') {
                echo "<form method='post'><button type='input' name='carte' value=".$j."><img class='imgcard responsive-image' src='../src/back.png'></button></form>";
            } elseif ($deck[$j]['status'] == 'opened') {
                echo "<img class='imgcard' src=" . $deck[$j]['img_url'] . ">";
            } elseif ($deck[$j]['status'] == 'found') {
                echo "<img class='imgcard' class='imgtrouvee' src=" . $deck[$j]['img_url'] . ">";
            }
            echo "</td>";
            $i++;

            if ($i > 5) {
                echo "</tr><tr>";
                $i = 1;
            }
        }


        echo "</tr></table>";
        ?>
    </div>
</main>



<?php include '../includes/footer.php'; ?>

</body>

</html>


