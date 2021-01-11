<?php

require_once '../classes/database.php';
require_once '../classes/score.php';


$titre = 'wall of fame';

session_start();


$pdo = new database("localhost","memory2", "root","");
$db_connect = $pdo->__construct();

$score = new score($db_connect);
$data = $score->scorebyLevel('3 paires');

if(isset($_POST['valider'])){

    if(isset($_POST['filtre']) && $_POST['filtre'] == 'nb_coup'){

        $level= strval($_POST['level']); 
        $data = $score->scoreByMoves($level);

    }

    if(isset($_POST['filtre']) && $_POST['filtre'] == 'time'){

        $level= strval($_POST['level']); 
        $data = $score->scoreByTime($level);
        

    }
}
?>

<?php include '../includes/header.php'; ?>


<main id="main_fame">  


<form action="" method="post" class="filter" >

<div class="filterby" >
    <p>Choisir le niveau</p>

    <select name="level">

        <?php for($i=3; $i<=12; ++$i):?>
            <option value="<?= $i?> paires" ><?= $i ?> paires </option>
        <?php endfor ?>

    </select>


</div>

<div class="filterby">
    <p>Trier par :</p>
    <div>
    <input type="radio" name='filtre' value='time' id='time'>
    <label for='time'>Meilleur temps</label>
    </div>
    
    <div>
        <input type="radio" name='filtre' value='nb_coup' id="Nb_coups" checked>
        <label for='Nb_coups'>Nombre de coups</label>
    </div>


</div>

<div class="button">
    <button type="submit" name="valider" class="btn btn-light">Valider</button>
</div>

</form>

<table class="table time">
        <thead>
        <tr>
            <th>Joueur</th>
            <th>Niveau</th>
            <th>Meilleur Temps</th>
        
        </tr>

        </thead>
       
        <tbody>
        <?php for($i=0; $i<count($data); $i++): ?>
    
            <tr>
                <td><?= $data[$i]['login'] ?></td>
                <td><?= $data[$i]['niveau'] ?></td>
                <td><?= $data[$i]['time'] ?></td>
                
            </tr>
        <?php endfor?>

        </tbody>
        
</table>

<table class="table score">
        <thead>
        <tr>
            <th>Joueur</th>
            <th>Niveau</th>
            <th>Nombre de coup</th>
        
        </tr>

        </thead>
       
        <tbody>
        <?php for($i=0; $i<count($data); $i++): ?>
    
            <tr>
                <td><?= $data[$i]['login'] ?></td>
                <td><?= $data[$i]['niveau'] ?></td>
                <td><?= $data[$i]['nb_coup'] ?></td>
                
            </tr>
        <?php endfor?>

        </tbody>
        
</table>





</main>


<?php include '../includes/footer.php'; ?>

<!-- Compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        $('.sidenav').sidenav();
    });
</script>
</body>
</html>