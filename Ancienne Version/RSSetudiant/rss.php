<?php

/**
 * RSS des etudiants

 */
  include("../config.php");
     // Si on a un num�ro d etudiant, on affiche que pour lui
// �dition du d�but du fichier XML
$xml = '<?xml version="1.0" encoding="iso-8859-1"?><rss version="2.0">';
$xml .= '<channel>';
$xml .= '<title>Derni�res mises � jour de mon emploi du temps</title>';
$xml .= '<description>Derni�res modifications de l\'emploi du temps</description>';


$date_modif_prof="";
// Cr�ation requ�te
unset($test);
if ($_GET['codeEtudiant'] > 0)
	{
    // Si on a un num�ro d etudiant, on affiche que pour lui

	//on recherche les groupes auxquels appartient l etudiant
		$test.=" seances_groupes.codeRessource='".$etudiant['codeGroupe']."' or ";
		}
	//supprime le dernier or de la chaine
	$test=substr("$test", 0, -3);
	}
$sql= "SELECT *, seances.deleted AS seance_deleted, seances.dureeSeance as duree, enseignements.nom AS nomens, seances.dateModif as date_modif_seance, seances.dateCreation as date_creation_seance, modifications.dateModif AS dateModifs, seances_profs.deleted AS seance_prof_deleted, seances_salles.deleted AS seance_salle_deleted, seances_groupes.deleted AS seance_groupe_deleted   FROM seances LEFT JOIN enseignements USING (codeEnseignement) right outer JOIN modifications on (seances.codeSeance=modifications.code) RIGHT JOIN seances_profs on (seances_profs.codeSeance=seances.codeSeance) RIGHT JOIN seances_salles on (seances_salles.codeSeance=seances.codeSeance) RIGHT JOIN seances_groupes on (seances_groupes.codeSeance=seances.codeSeance)  WHERE     (" . $test . ") and modifications.typeObjet=9   ORDER BY modifications.dateModif DESC ";