<?php
include_once "bdd/connexion.php";

    if(isset($_GET['query'])) {
        // Mot tapé par l'utilisateur
        $q = htmlentities($_GET['query']);
 
        // Requête SQL
        $requete = "SELECT nom FROM anime WHERE nom LIKE '%". $q ."%'  GROUP BY nom LIMIT 0, 10";
 
        // Exécution de la requête SQL
        $resultat = $db->query($requete) or die(print_r($db->errorInfo()));
 
        // On parcourt les résultats de la requête SQL
        while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
            // On ajoute les données dans un tableau
            $suggestions['suggestions'][] = $donnees['nom'];
        }
 
        // On renvoie le données au format JSON pour le plugin
        echo json_encode($suggestions);
    }

