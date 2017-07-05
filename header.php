<script type="text/javascript" src="./jquery.min.js"></script>
<script type="text/javascript" src="./jquery.autocomplete.min.js"></script>
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
	<ul class="fancyNav">
		<li><a href="index.php">Home</a>
		<li><a href="saisie.php">Saisir</a>
		<li><a href="#">Liste Anime</a>
			<ul>
				<li><a href="anime.php">Anime</a>
				<li><a href="film.php">Film</a>
				<li><a href="oav.php">OAV</a>
			</ul>
		<li><a href="actualite.php">Actualité</a>
		<li><a href="#">Statistique</a>
			<ul>
				<li><a href="statistique.php">Nombre Vu</a>
				<li><a href="temps.php">Temps</a>
			</ul>
		<li><a href="#">Statistique OAV</a>
			<ul>
				<li><a href="stat_oav.php">Nombre Vu OAV</a>
				<li><a href="temps_oav.php">Temps OAV</a>
			</ul>	
                <li><a href="#">Recherche par Titre</a>
			<ul>
                            <form id="FormRecherche" action="search.php" method="post">
                                    <input type="text" id="search" name="search"/>
                            </form>
			</ul>
                <li>
                    <a href="search_avance.php">Recherche avancé</a>    
                </li>
</nav>

<script>
    
    $(document).ready(function() {
        $('#search').autocomplete({
            serviceUrl: 'auto.php',
            dataType: 'json'
        });
    });     
    
</script>


