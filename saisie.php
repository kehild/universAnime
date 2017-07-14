<script type="text/javascript" src="./jquery.min.js"></script>
<script type="text/javascript" src="./jquery.autocomplete.min.js"></script>
<?php
include_once"header.php";
include_once "bdd/connexion.php";
include_once "bdd/MangaManager.php";

 if (isset($_POST['Valider'])) {
	
	$anime = new MangaManager($db);
	$anime->test1(); 
	$anime->SaisieAnime($db,$_POST['nom'], $_POST['episode'],$_POST['date'],$_POST['theme'],$_POST['saison'],$_POST['duree'],$_POST['format'],$_POST['oav'],$_POST['film'],$_POST['file']);	
}

?>

<div>
  <form method="post" action="">
        </br>
	<label for="nom">Nom</label>
        </br>
	<input type="text" id="nom" name="nom">
	</br>
	<label for="episode">Episode</label>
        </br>
	<input type="text" id="episode" name="episode">
	</br>
	<label for="date">Date de Sortie</label>
        </br>
	<input type="text" id="date" name="date">
	</br>
        <label for="theme">Thème</label>
        </br>
	<input type="text" id="theme" name="theme">
	</br>
	<label for="saison">Nb Saison</label>
        </br>
	<input type="text" id="saison" name="saison">
	</br>
	<label for="duree">Durée</label>
        </br>
	<input type="text" id="duree" name="duree">
	</br>
	<label for="format">Format</label>
        </br>
	 <select name="format" id="format">
           <option value="Internet">Internet</option>
           <option value="PC">PC</option>
           <option value="CD">CD</option>
           <option valur="DVD">DVD</option>
	</select>
	</br>
	<label for="oav">OAV ?</label>
	</br>
	<select name="oav" id="oav">
           <option value="non">non</option>
           <option value="oui">oui</option>        
	</select>
	</br>
	<label for="film">Film ?</label>
        </br>
	<select name="film" id="film">
           <option value="non">non</option>
           <option value="oui">oui</option>   
	</select>
	</br>
	<label for="image">Image</label>
	</br>
	<input type="file" id="file" name="file">
	</br>
    <input type="submit" name="Valider" value="Valider">
  </form>
</div>

<?php

		include_once"footer.php";
?>

<script>
    
    $(document).ready(function() {
        $('#theme').autocomplete({
            serviceUrl: 'auto_theme.php',
            dataType: 'json'
        });
    });     
    
</script>
