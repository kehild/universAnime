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
                    echo "<table>";
                       echo "<tr><th>"; echo "Theme Anime";echo "</th>";
                       echo "<th>"; echo "Theme Anime OAV";echo "</th>";
                       echo "<th>"; echo "Theme Anime Film";echo "</th></tr>";
                       echo "<tr><th>"; 
                            $anime = new MangaManager($db);
                            $anime->SearchTheme($db); 
                        echo "</th>";
                        echo "<th>";
                            $anime = new MangaManager($db);
                            $anime->SearchThemeOAV($db);   
                        echo "</th>";
                         echo "<th>";
                            $anime = new MangaManager($db);
                            $anime->SearchThemeFilm($db);   
                    echo "</th></tr>";
                   echo "</table>";
                    ?>
                    </br></br>
                    <input type="submit" name="Valider" value="Valider"> 
            </form>

            
     	</div>		
    </section>		
</body>	
