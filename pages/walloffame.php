<?php


require_once '../classes/user.php';


require_once '../classes/score.php';


$titre = 'wall of fame';

session_start();

//$score = new score ;

     //RECUPERER LE TOP 10 PAR NB DE COUPS ->top-gen OK!!!!!!
     //RECUPERER LE TOP 10 PAR TEMPS???????
     //nb score pour généralisation tableau
     // $top_10 TOUT CONFONDU
     //^nb_paire NB DE PAIRE
     //top_paire INFOS TOP 10
     //nb_score = count($top_gen); IMPORTANT A METTRE DANS CLASS SCORE
     // $nb_top_10 = count($top_10); IMPORTANT A METTRE DANS CLASS SCORE



?>

<?php include '../includes/header.php'; ?>


<main id="main_fame">  

<h2 class="mt-3">Wall of Fame</h2>


        <!--TOP GENERAL -->

<section id="top_gen">

    <table class="table table-dark top">

        <thead class="thead-dark">
            <tr>
                <th colspan="3">TOP 10 Joueurs</th>
            </tr>
        </thead>

        <tbody>
            <tr class="titre_top">
                <td>Place</td>
                <td>Nom</td>
                <td>Score</td>
            </tr>
            <?php for($i=0; $i<$scoreGenerator; $i++) { ?>
            <tr>
                <td class="place"># <?= ($i+1)?></td>
                <td><?=$topMoves[$i]['username']?></td>
                <td class="score"><?=$topMoves[$i]['score_total']?></td>                                                    
                        
                <?php } ?>
        </tbody>

    </table>

    <!--PLUS D'INFOS TOP 10-->

    <table class="table table-dark top">

        <thead class="thead-dark">
            <tr>
                <th colspan="6">TOP 10 : C'est super</th>
            </tr>
        </thead>

        <tbody>
            <tr class="titre_top">
                <td>Place</td>
                <td>Nom</td>
                <td>Score</td>
                <td>Nombre de paires</td>
                <td>Temps</td>
                <td>Nombre de coups</td>
            </tr>
            <?php for($i=0; $i<$nb_top_10; $i++) { ?>

            <tr>
                <td class="place"># <?= ($i+1)?></td>                     
                <td><?= $top_10[$i]["username"] ?></td>
                <td class="score"><?= $top_10[$i]["score"] ?></td>   
                <td><?= $top_10[$i]["nb_paires"] ?></td>                                                 
                <td><?= number_format($top_10[$i]["temps"], 3) ?></td>
                <td><?= $top_10[$i]["nb_coups"] ?></td>
                     
                <?php } ?>

        </tbody>

    </table>

</section>


<!--TOP CHAQUE NIVEAU-->
<section id="top_paires">
    
    <section>
            
        <form action="fame.php#top_paires" method="POST" id="form_top_paire">
            
            <select name="top_paire" id="select_top_paire">
            
                <?php for($i=3; $i<=$nb_paire["nb_paire"] AND $i<=12 ; $i++) { ?>
                            
                    <option value="<?= $i ?>"
                    
                    <?php if(isset($_POST["top_paire"]) && $i == $_POST["top_paire"]) { ?>
                    
                     selected
                    
                    <?php } ?> ><?= $i ?> paires</option>
                
                    <?php } ?>

            </select>

            <input type="submit" name="choix_top" class="button" value="Choisir">
        
        </form>
    
    </section>


    <section class="w-100">

        <?php if(isset($_POST["top_paire"], $_POST["choix_top"]) && !empty($top_paire)){ ?>

        <table class="table table-dark mx-auto">

            <thead class="thead-dark">
                <tr>
                    <th colspan="5">TOP 10 : <?= $top_paire[0]["nb_paires"]?> paires</th>
                </tr>
            </thead>

            <tbody>
                <tr class="titre_top">
                    <td>Place</td>
                    <td>Nom</td>
                    <td>Score</td>
                    <td>Temps</td>
                    <td>Nombre de coups</td>
                </tr>

                <?php for($i=0; $i<($nb_top_paire); $i++) { ?>
                
                <tr>
                    <td class="place"># <?= ($i+1)?></td>
                    <td><?=$top_paire[$i]['username']?></td>
                    <td class="score"><?=$top_paire[$i]['score']?></td>
                    <td><?= number_format($top_paire[$i]['temps'], 3)?></td>
                    <td><?=$top_paire[$i]['nb_coups']?></td>
                </tr>                            
                            <?php } ?>
            </tbody>
        </table>

    <?php } else if(isset($_POST["top_paire"], $_POST["choix_top"]) && empty($top_paire)) { ?>
    
     <p class="alert alert-info">Il n'y a pas encore de score disponible</p>
    
     <?php } ?>
    </section>

</section>

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