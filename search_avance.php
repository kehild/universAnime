<?php
include_once 'header.php';
include_once 'bdd/connexion.php';
include_once 'bdd/MangaManager.php';

?>
<body>
    <section>
	<div class="transbox" style="color:black;">
            <form id="FormRechercheAvance" action="avance.php" method="post">
                 <!-- <input type="text" id="search" name="search"/></br> -->
                    <label for="critere">Critere OAV</label></br></br>
                    <input type="checkbox" name="oav" value="oui">Oui
                    <input type="checkbox" name="oav" value="non" checked>Non</br></br>
                    <label for="critere">Critere Film</label></br></br>
                    <input type="checkbox" name="film" value="oui">Oui
                    <input type="checkbox" name="film" value="non" checked>Non</br></br>
                    <label for="theme">Thème</label></br></br>
                <?php
                
                    $anime = new MangaManager($db);
                    $anime->SearchTheme($db);

                ?>
                    </br></br>
                    <input type="submit" name="Valider" value="Valider"> 
            </form>

            
     	</div>		
    </section>		
</body>	
