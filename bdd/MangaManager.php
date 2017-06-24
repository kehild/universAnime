<?php
class MangaManager{
  private $_db; // Instance de PDO

  public function __construct($db){
    $this->setDb($db);
  }
   

public function DernierLivreRentree($db){

	$stmt = $db->prepare("SELECT * FROM anime ORDER BY date_modif DESC LIMIT 5"); 
	$stmt->execute();
		
		echo "<table id='dernier' align='center'>";

			echo "<tr><th>"; echo "Image"; echo "</th>";
			echo "<th>"; echo "Nom"; echo "</th>";
			echo "<th>"; echo "Episode"; echo "</th>";
			echo "<th>"; echo "Date"; echo "</th>";
			echo "<th>"; echo "Theme"; echo "</th>";
			echo "<th>"; echo "Nb Saison"; echo "</th>";
			echo "<th>"; echo "Durée"; echo "</th>";
			echo "<th>"; echo "Format"; echo "</th>";
			echo "<th>"; echo "OAV ?"; echo "</th>";
			echo "<th>"; echo "Film ?"; echo "</th>";
			echo "<th>"; echo "Modifier"; echo "</th>";
			echo "<th>"; echo "Supprimer"; echo "</th></tr>";

		foreach(($stmt->fetchAll()) as $toto){
					
			echo "<tr><th>"; echo "<img src='image/liste/".$toto['image']."'>"; echo "</th>";
			echo "<th>"; echo $toto['nom']; echo "</th>";
			echo "<th>"; echo $toto['episode']; echo "</th>";
			echo "<th>"; echo $toto['date']; echo "</th>";
			echo "<th>"; echo $toto['theme']; echo "</th>";
			echo "<th>"; echo $toto['saison'];  echo "</th>";
			echo "<th>"; echo $toto['duree'];  echo "</th>";
			echo "<th>"; echo $toto['format']; echo "</th>";
			echo "<th>"; echo $toto['oav']; echo "</th>";
			echo "<th>"; echo $toto['film']; echo "</th>";
		echo "<th>"; echo '<a href="ModifAnime.php?id='.$toto['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
		echo "<th>"; echo '<a href="?id1='.$toto['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>"; 
		
		}
			echo "</table>";
}


function ListeAnime($db){
 echo '<div class="pagination">';	
$messagesParPage=10;

$retour_total=$db->prepare("SELECT COUNT(*) AS total FROM anime where oav='non' and film='non'");
$retour_total->execute();

$donnees_total=$retour_total->fetch(); //On range retour sous la forme d'un tableau.
$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
 
//Nous allons maintenant compter le nombre de pages.
$nombreDePages=ceil($total/$messagesParPage);
 
if(isset($_GET['page'])){ 
	
     $pageActuelle=intval($_GET['page']);
 
     if($pageActuelle>$nombreDePages){
	$pageActuelle=$nombreDePages;
     }
} else{
     $pageActuelle=1; // La page actuelle est la n°1    
}
 
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
 
// La requête sql pour récupérer les messages de la page actuelle.
$retour_messages=$db->prepare("SELECT * FROM anime where oav='non' and film='non 'ORDER BY nom ASC LIMIT ".$premiereEntree.", ".$messagesParPage."");
$retour_messages->execute();

		echo "<table id='dernier' align='center'>";
		
		echo "<tr><th>"; echo "Image"; echo "</th>";
		echo "<th>"; echo "Nom"; echo "</th>";
		echo "<th>"; echo "Episode"; echo "</th>";
		echo "<th>"; echo "Date"; echo "</th>";
		echo "<th>"; echo "Theme"; echo "</th>";
		echo "<th>"; echo "Nb Saison"; echo "</th>";
		echo "<th>"; echo "Durée"; echo "</th>";
		echo "<th>"; echo "Format"; echo "</th>";
		echo "<th>"; echo "Modifier"; echo "</th>";
		echo "<th>"; echo "Supprimer"; echo "</th></tr>";

while($donnees_messages=$retour_messages->fetch()){ // On lit les entrées une à une grâce à une boucle
			
		echo "<tr><th>"; echo stripslashes("<img src='image/liste/".$donnees_messages['image']."'>"); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['nom']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['episode']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['date']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['theme']);  echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['saison']);  echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['duree']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['format']); echo "</th>";
	echo "<th>"; echo '<a href="ModifAnime.php?id='.$donnees_messages['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
	echo "<th>"; echo '<a href="?id1='.$donnees_messages['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";
	
}
		echo "</table>";

echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$nombreDePages; $i++){ //On fait notre boucle

     //On va faire notre condition
     if($i==$pageActuelle){ //Si il s'agit de la page actuelle...
     
         echo ' [ '.$i.' ] '; 
     }	
     else{
		 echo ' <a href="anime.php?page='.$i.'">'.$i.'</a> ';
     }
}

echo '</p>';
echo '</div>';
}

function ListeAnimeFilm($db){
echo '<div class="pagination">';
$messagesParPage=10;

$retour_total=$db->prepare("SELECT COUNT(*) AS total FROM anime where oav='non' and film='oui'"); 
$retour_total->execute();
$donnees_total=$retour_total->fetch(); //On range retour sous la forme d'un tableau.
$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
$nombreDePages=ceil($total/$messagesParPage);
 
if(isset($_GET['page'])){ 
     $pageActuelle=intval($_GET['page']);
 
     if($pageActuelle>$nombreDePages){
		// Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
         $pageActuelle=$nombreDePages;
     }
} else{
     $pageActuelle=1; // La page actuelle est la n°1    
}
 
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
 
// La requête sql pour récupérer les messages de la page actuelle.
$retour_messages=$db->prepare("SELECT * FROM anime where oav='non' and film='oui' ORDER BY nom ASC LIMIT ".$premiereEntree.", ".$messagesParPage."");
$retour_messages->execute();

		echo "<table id='dernier' align='center'>";
		
		echo "<tr><th>"; echo "Image"; echo "</th>";
		echo "<th>"; echo "Nom"; echo "</th>";
		echo "<th>"; echo "Episode"; echo "</th>";
		echo "<th>"; echo "Date"; echo "</th>";
		echo "<th>"; echo "Theme"; echo "</th>";
		echo "<th>"; echo "Nb Saison"; echo "</th>";
		echo "<th>"; echo "Durée"; echo "</th>";
		echo "<th>"; echo "Format"; echo "</th>";
		echo "<th>"; echo "Modifier"; echo "</th>";
		echo "<th>"; echo "Supprimer"; echo "</th></tr>";

while($donnees_messages=$retour_messages->fetch()){ // On lit les entrées une à une grâce à une boucle
			
		echo "<tr><th>"; echo stripslashes("<img src='image/liste/".$donnees_messages['image']."'>"); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['nom']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['episode']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['date']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['theme']);  echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['saison']);  echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['duree']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['format']); echo "</th>";
	echo "<th>"; echo '<a href="ModifAnime.php?id='.$donnees_messages['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
	echo "<th>"; echo '<a href="?id1='.$donnees_messages['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";	
 
}
		echo "</table>";
 
echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages

for($i=1; $i<=$nombreDePages; $i++){ //On fait notre boucle

     //On va faire notre condition
     if($i==$pageActuelle){ //Si il s'agit de la page actuelle...
     
         echo ' [ '.$i.' ] '; 
     }	
     else{
		 echo ' <a href="film.php?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';
echo '</div>';
}

function ListeAnimeOAV($db){
echo '<div class="pagination">';	
$messagesParPage=10; //Nous allons afficher 10 messages par page.
$retour_total=$db->prepare("SELECT COUNT(*) AS total FROM anime where oav='oui' and film='non'");
$retour_total->execute();
$donnees_total=$retour_total->fetch(); //On range retour sous la forme d'un tableau.
$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
$nombreDePages=ceil($total/$messagesParPage);
 
if(isset($_GET['page'])){ 
	// Si la variable $_GET['page'] existe...
     $pageActuelle=intval($_GET['page']);
 
     if($pageActuelle>$nombreDePages){
		// Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
         $pageActuelle=$nombreDePages;
     }
} else{
     $pageActuelle=1; // La page actuelle est la n°1    
}
 
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
$retour_messages=$db->prepare("SELECT * FROM anime where oav='oui' and film='non' ORDER BY nom ASC LIMIT ".$premiereEntree.", ".$messagesParPage."");
$retour_messages->execute();

		echo "<table id='dernier' align='center'>";
		
		echo "<tr><th>"; echo "Image"; echo "</th>";
		echo "<th>"; echo "Nom"; echo "</th>";
		echo "<th>"; echo "Episode"; echo "</th>";
		echo "<th>"; echo "Date"; echo "</th>";
		echo "<th>"; echo "Theme"; echo "</th>";
		echo "<th>"; echo "Nb Saison"; echo "</th>";
		echo "<th>"; echo "Durée"; echo "</th>";
		echo "<th>"; echo "Format"; echo "</th>";
		echo "<th>"; echo "Modifier"; echo "</th>";
		echo "<th>"; echo "Supprimer"; echo "</th></tr>";

		
while($donnees_messages=$retour_messages->fetch()){ // On lit les entrées une à une grâce à une boucle
	
		echo "<tr><th>"; echo stripslashes("<img src='image/liste/".$donnees_messages['image']."'>"); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['nom']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['episode']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['date']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['theme']);  echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['saison']);  echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['duree']); echo "</th>";
		echo "<th>"; echo stripslashes($donnees_messages['format']); echo "</th>"; 
	echo "<th>"; echo '<a href="ModifAnime.php?id='.$donnees_messages['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
		echo "<th>"; echo '<a href="?id1='.$donnees_messages['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";
}
		echo "</table>";
 
echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages

for($i=1; $i<=$nombreDePages; $i++){ //On fait notre boucle

     if($i==$pageActuelle){ //Si il s'agit de la page actuelle...
     
         echo ' [ '.$i.' ] '; 
     }	
     else{
		 echo ' <a href="oav.php?page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';
echo '</div>';	
}

public function search($db){

		if(isset($_POST['search'])) {

		$chainesearch = addslashes($_POST['search']);  
		
		$requete = "SELECT * from anime WHERE nom LIKE '%". $chainesearch ."%'"; 
								
		// Exécution de la requête SQL
		$resultat = $db->query($requete) or die(print_r($db->errorInfo()));
		//echo 'Les résultats de recherche sont : <br />';     
		$nb = 0;
		echo "<table id='dernier' align='center'>";
					
			echo "<tr><th>"; echo "Nom"; echo "</th>";
			echo "<th>"; echo "Nom"; echo "</th>";
			echo "<th>"; echo "Episode"; echo "</th>";
			echo "<th>"; echo "date"; echo "</th>";
			echo "<th>"; echo "Thème"; echo "</th>";
			echo "<th>"; echo "Nb Saison"; echo "</th>";
			echo "<th>"; echo "duree"; echo "</th>";
			echo "<th>"; echo "Format"; echo "</th>";
			echo "<th>"; echo "Modifier"; echo "</th>";
			echo "<th>"; echo "Supprimer"; echo "</th></tr>";
								
			while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {       
			$nb = $nb +1;
								
			echo "<tr><th>"; echo "<img src='image/liste/".$donnees['image']."'>"; echo "</th>";
			echo "<th>"; echo $donnees['nom']; echo "</th>";
			echo "<th>"; echo $donnees['episode']; echo "</th>";
			echo "<th>"; echo $donnees['date']; echo "</th>";
			echo "<th>"; echo $donnees['theme']; echo "</th>";
			echo "<th>"; echo $donnees['saison'];  echo "</th>";
			echo "<th>"; echo $donnees['duree']; echo "</th>";
			echo "<th>"; echo $donnees['format']; echo "</th>";
			echo "<th>"; echo '<a href="ModifAnime.php?id='.$donnees['id'].'"><img src="image/modifier.png"></a>'; echo "</th>";
		echo "<th>"; echo '<a href="?id1='.$donnees['id'].'"><img src="image/delete.png"></a>'; echo "</th></tr>";  
		}
		echo "</table>";
		echo "</br>";
		echo "Il y a ".$nb." résultats"; 
						

}

}

function TotalAnime($db){
		
	$stmt = $db->prepare("select COUNT(nom) from anime where oav='non' and film='non'");
	$stmt->execute();
		
		foreach(($stmt->fetchAll()) as $toto){
			echo "<table>";
			echo "<tr><th>"; echo "Total Anime"; echo "</th></tr>";				
			echo "<tr><th>"; echo $toto['COUNT(nom)']; echo "</th></tr>";
			echo "</table>";
	}
}

function TotalOAV($db){
		
	$stmt = $db->prepare("select COUNT(nom) from anime where oav='oui' and film='non'");
	$stmt->execute();
		
		foreach(($stmt->fetchAll()) as $toto){
			echo "<table>";
			echo "<tr><th>"; echo "Total OAV"; echo "</th></tr>";				
			echo "<tr><th>"; echo $toto['COUNT(nom)']; echo "</th></tr>";
			echo "</table>";
	}
}


function TotalFormat($db){
		
	$stmt = $db->prepare("select COUNT(nom),format from anime where oav='non' and film='non' GROUP BY format ORDER BY count('nom') DESC");
		$stmt->execute();
			
			echo "<table>";
			echo "<tr><th>"; echo "Liste Format"; echo "</th>";	
			echo "<th>"; echo "Nombre Format"; echo "</th></tr>";
			
			foreach(($stmt->fetchAll()) as $toto){
		
				echo "<tr><th>"; echo $toto['format']; echo "</th>";
				echo "<th>"; echo $toto['COUNT(nom)']; echo "</th></tr>";
		}
		echo "</table>";
}

function TotalFormatOAV($db){
		
	$stmt = $db->prepare("select COUNT(nom),format from anime where oav='oui' and film='non' GROUP BY format ORDER BY count('nom') DESC");
		$stmt->execute();
			
		echo "<table>";
		echo "<tr><th>"; echo "Liste Format"; echo "</th>";	
		echo "<th>"; echo "Nombre Format"; echo "</th></tr>";
			
		foreach(($stmt->fetchAll()) as $toto){
		
			echo "<tr><th>"; echo $toto['format']; echo "</th>";
			echo "<th>"; echo $toto['COUNT(nom)']; echo "</th></tr>";
		}
		echo "</table>";
}


function TotalFilm($db){
		
	$stmt = $db->prepare("select COUNT(nom) from anime where oav='non' and film='oui'");
	$stmt->execute();
		
		foreach(($stmt->fetchAll()) as $toto){
			echo "<table>";
			echo "<tr><th>"; echo "Total Film"; echo "</th></tr>";				
			echo "<tr><th>"; echo $toto['COUNT(nom)']; echo "</th></tr>";
			echo "</table>";
	}
}

function TotalEpisode($db){
		
	$stmt = $db->prepare("select SUM(episode) from anime where oav='non' and film='non'");
	$stmt->execute();
		
		foreach(($stmt->fetchAll()) as $toto){
			echo "<table>";
			echo "<tr><th>"; echo "Nombre Episode"; echo "</th></tr>";				
			echo "<tr><th>"; echo $toto['SUM(episode)']; echo "</th></tr>";
			echo "</table>";
	}
}

function TotalEpisodeOAV($db){
		
		$stmt = $db->prepare("select SUM(episode) from anime where oav='oui' and film='non'");
		$stmt->execute();
		
			foreach(($stmt->fetchAll()) as $toto){
				echo "<table>";
				echo "<tr><th>"; echo "Nombre Episode"; echo "</th></tr>";				
				echo "<tr><th>"; echo $toto['SUM(episode)']; echo "</th></tr>";
				echo "</table>";
		}
}

function TotalTemps($db){
		
	$stmt = $db->prepare("select SUM(episode), duree from anime where oav='non' and film='non' GROUP BY duree");
	$stmt->execute();
		
	foreach(($stmt->fetchAll()) as $toto){
		echo "<table>";
			echo "<tr><th>"; echo "Total de la duree : ".$toto['duree']." min"; echo "</th></tr>";				
			echo "<tr><th>"; 
			echo floor($toto['SUM(episode)'] * $toto['duree'] / 1440); echo "&nbsp"; echo "jours"; echo "&nbsp"; // JOUR
			echo floor($toto['SUM(episode)'] * $toto['duree'] % 1440 / 60); echo "&nbsp"; echo "heures"; echo "&nbsp"; // HEURES
			echo floor($toto['SUM(episode)'] * $toto['duree'] % 60); echo "&nbsp"; echo "minutes"; // MINUTES 
			echo "</th></tr>"; 
		echo "</table>"; echo "</br>";
	}
}


function TotalTempsOAV($db){
		
	$stmt = $db->prepare("select SUM(episode), duree from anime where oav='oui' and film='non' GROUP BY duree");
	$stmt->execute();
		
		foreach(($stmt->fetchAll()) as $toto){
			echo "<table>";
			echo "<tr><th>"; echo "Total de la duree : ".$toto['duree']." min"; echo "</th></tr>";				
			echo "<tr><th>"; 
			echo floor($toto['SUM(episode)'] * $toto['duree'] / 1440); echo "&nbsp"; echo "jours"; echo "&nbsp"; // JOUR
			echo floor($toto['SUM(episode)'] * $toto['duree'] % 1440 / 60); echo "&nbsp"; echo "heures"; echo "&nbsp"; // HEURES
			echo floor($toto['SUM(episode)'] * $toto['duree'] % 60); echo "&nbsp"; echo "minutes"; // MINUTES 
			echo "</th></tr>"; 
			echo "</table>"; echo "</br>";
		}
}

function SaisieAnime($db,$nom, $episode,$date,$theme,$saison,$duree,$format,$oav,$film,$file){
	$date_modif = date("Y-m-d H:i:s");	
	try {

	$sql = "Insert INTO anime (nom, episode, date, theme, saison, duree, format, oav, film, image,date_modif) VALUES ('".$nom."', '".$episode."','".$date."','" .$theme. "','" .$saison. "','" .$duree. "','" .$format. "','" .$oav. "','" .$film. "','" .$file. "','".$date_modif."')";
			
	$db->exec($sql);
		
	echo "Insertion réussi";
	}
	catch(Exception $e){
				
	echo("<h1>Erreur : Base de données </h1>");
	die('Erreur : ' .$e->getMessage());
		
	}

}	

public function modification($db){
	 				
		$stmt = $db->prepare("SELECT * FROM anime where id=' " .$_GET['id']. " '"); 
		$stmt->execute();
					
		foreach(($stmt->fetchAll()) as $toto){
		?>
		<div>
			<form method="post" action="">
			</br>
			<label for="nom">Nom</label>
			</br>
			<input type="text" id="nom" name="nom" value="<?php echo $toto['nom']; ?>">
			</br>
			<label for="episode">Episode</label>
			</br>
			<input type="text" id="episode" name="episode" value="<?php echo $toto['episode']; ?>">
			</br>
			<label for="date">Date de Sortie</label>
			</br>
			<input type="text" id="date" name="date" value="<?php echo $toto['date']; ?>">
			</br>
			<label for="theme">Thème</label>
			</br>
			<input type="text" id="theme" name="theme" value="<?php echo $toto['theme']; ?>">
			</br>
			<label for="saison">Nb Saison</label>
			</br>
			<input type="text" id="saison" name="saison" value="<?php echo $toto['saison']; ?>">
			</br>
			<label for="duree">Durée</label>
			</br>
			<input type="text" id="duree" name="duree" value="<?php echo $toto['duree']; ?>">
			</br>
			<label for="format">Format</label>
			</br>
			<input type="text" id="format" name="format" value="<?php echo $toto['format']; ?>">
			</br>
			<label for="image">Image</label>
			</br>
			<input type="text" id="image" name="image" value="<?php echo $toto['image']; ?>">
			</br>
			<input type="submit" id="Modifier" name="Modifier" value="Modifier">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="submit" id="Annuler" name="Annuler" value="Annuler">
			</br>
			</form>
		</div> <?php
	}					
}

function UpdateAnime($db){
	$date_modif = date("Y-m-d H:i:s");
		try {
				
		$sql = "UPDATE anime SET nom='" .$_POST['nom']. "',episode='" .$_POST['episode']. "',date='" .$_POST['date']. "',theme='" .$_POST['theme']. "', saison='" .$_POST['saison']. "',duree='" .$_POST['duree']. "',format='" .$_POST['format']. "',image='" .$_POST['image']. "', date_modif='".$date_modif."' WHERE id='" .$_GET['id']. "'";
			
		$db->exec($sql);
				
		echo "Modification réussi";
		echo '<meta http-equiv="refresh" content="0;URL=ModifAnime.php?id='.$_GET['id'].'">';
		}
		catch(Exception $e){
				
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
			
		}
}

  public function DeleteAnime($db, $id){
	  
	  try{
		$sql = "delete from anime where id=$id";
		$db->exec($sql);
	  
	  }catch(Exception $e){
		  echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
		  
	  }
  }

  
  public function setDb(PDO $db){
    $this->_db = $db;
  }
}

?>
