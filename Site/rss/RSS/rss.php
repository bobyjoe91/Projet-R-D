<?php

/**
 *
rss prof
 */
 include("../config.php");
 
 
// �dition du d�but du fichier XML
$xml = '<?xml version="1.0" encoding="iso-8859-1"?><rss version="2.0">';
$xml .= '<channel>';
$xml .= '<title>Derni�res mises � jour de mon emploi du temps</title>';
$xml .= '<link>http://ufrsitec.u-paris10.fr/edtpst/RSS/rss.php?codeProf='.$code.'</link>';
$xml .= '<description>Derni�res modifications de l\'EDT</description>';

// Cr�ation requ�te
unset($requete);

if ($_GET['codeProf'] > 0) 
 
{ 
    $titre = explode("_", $titre);
    
    $titre = $titre[1];

    $dateseance = $tab['dateSeance'];
    $date3 = date("d-m-Y", strtotime($dateseance));
   
    // Listing des profs

    unset($prof);
    unset($i);
	foreach($res1 as $tab1)	
        if ($i > 0) {
            $prof = $prof . " - ";
        }
        $prof = $prof . $tab1['nom'];
        $i++;
    }
    // Listing des groupes
    unset($groupes);

        if ($i > 0) {
            $groupes = $groupes . " - ";
        }
        $groupes .= $tab2['nom'];
        $i++;
    }
    // Listing des salles
    unset($salles);

        if ($i > 0) {
            $salles = $salles . " - ";
        }
        $salles .= $tab3['nom'];
        $i++;
    }
// Calcul des horaires
    // On affiche pour un prof en particulier
    if ($_GET['codeProf'] > 0) {
        $title = $titre;
    }
    // Ou pour tout le d�partement
    else {
        $title = $prof;
    }
    // On g�n�re le contenu XML
    $xml .= '<item>';
    $xml .= '<title>' . $title . '</title>';
    $xml .= '<pubDate>' . $date2 . ' +0100</pubDate>';
    $xml .= '<description>' . $description . '</description>';
    $xml .= '</item>';
}
// �dition de la fin du fichier XML
$xml .= '</channel>';
$xml .= '</rss>';
// �criture dans le fichier
echo $xml;

@mysql_close();

?>