<header>
	<title>Univers Anime</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
        <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster" /> -->
	<link rel="icon" type="image/png" href="image/anime.jpg"/>
	<table id="test">	
		<tr>
			<td><img src="image/anime.jpg"></td>
			<td><h1 id="titre">Bienvenue Sur L'Univers Anime</h1></td>
		</tr>
	</table>	
</header>
<nav>
	<ul class="fancyNav" id="tests">
		<li style="float: left"><a href="index.php">Home</a></li>
		<li style="float: left"><a href="saisie.php">Saisir</a></li>
		<li style="float: left"><a href="#">Liste Anime</a>
			<ul>
				<li><a href="anime.php">Anime</a></li>
				<li><a href="film.php">Film</a></li>
				<li><a href="oav.php">OAV</a></li>
			</ul>
		</li>
		<li style="float: left"><a href="actualite.php">Actualité</a></li>	
		<li style="float: left"><a href="#">Statistique</a>
			<ul>
				<li><a href="statistique.php">Nombre Vu</a></li>
				<li><a href="temps.php">Temps</a></li>
			</ul>
		</li>
		<li style="float: left"><a href="#">Statistique OAV</a>
			<ul>
				<li><a href="stat_oav.php">Nombre Vu OAV</a></li>
				<li><a href="temps_oav.php">Temps OAV</a></li>
			</ul>
		</li>
		
                <li style="float: left"><a href="#">Recherche par Titre</a>
			<ul>
                            <form id="FormRecherche" action="search.php" method="post">
                                    <input type="text" id="search" name="search"/>
                            </form>
			</ul>
		</li>
                
                

                
		<li style="float:right"><a href="information.php">Information</a></li>
	</ul>
</nav>


