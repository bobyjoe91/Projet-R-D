<?php

//Parametres de connexion a la bdd
$user='bmillion';
$pass='YK+25myz';
$serveur='localhost';




//mise dans un tableau de toutes les bases a utiliser dans ordre chronologique

$base=array();
$annee_scolaire=array();

$base[0]='vt';
$annee_scolaire[0]='2010-2011';


//nombre de bases de donn�es

$nbdebdd='1';


//fuseau horaire � changer en cas de besoin
 date_default_timezone_set('Europe/Paris');
 
//login generique pour voir les emplois du temps de profs smartphone

$login_smart='profs';

$mdp_smart='avray';

//deuxi�me login generique pour voir les emplois du temps de profs smartphone

$login_smart2='gea';

$mdp_smart2='20102011';

//troisi�me login generique pour voir les emplois du temps de profs smartphone

$login_smart3='profs';

$mdp_smart3='avray';

//login generique pour voir les emplois du temps prof

$login_prof='profs';

$mdp_prof='avray';

//deuxi�me login generique pour voir les emplois du temps prof

$login_prof2='gea';

$mdp_prof2='20102011';

//troisi�me login generique pour voir les emplois du temps prof

$login_prof3='profs';

$mdp_prof3='avray';


//url du site (utile pour la g�n�ration des pdf)

$url_site="http://localhost/edt";

//url de l'endroit o� se situe les ics des profs (ne pas oublier le / � la fin)

$url_ics_prof="webcal://ufrsitec.u-paris10.fr/icsprof/";



//url de l'endroit o� se situe les ics des etudiants  (ne pas oublier le / � la fin)

$url_ics_etudiant="webcal://ufrsitec.u-paris10.fr/icsetudiant/";



//url de l'endroit o� se situe les ics des salles  (ne pas oublier le / � la fin)

$url_ics_salle="webcal://ufrsitec.u-paris10.fr/icssalle/";

//url de l'endroit o� se situe les ics des materiels  (ne pas oublier le / � la fin)

$url_ics_materiel="webcal://ufrsitec.u-paris10.fr/icsmateriel/";

//Nom de la fen�tre du navigateur

$nom_fenetre="Emploi du temps du P�le Scientifique et Technologique de Ville D'Avray";

//affichage du samedi pour les profs et les �tudiants : 1 si oui et 0 si non

$samedi='1';

//affichage du dimanche pour les profs uniquement : 1 si oui et 0 si non. (si on affiche le diamnche, le samedi estautomatiquement affich�)

$dimanche='0';

//heure du d�but et de fin de  journ�e (pour 8h30 par exemple, il faut mettre 08.50)
$heure_debut_journee=08.00;
$heure_fin_journee=19.50;

//heure du d�but et de fin de la pause du matin (pour 11h30 par exemple, il faut mettre 11.50)
$heure_debut_pause_matin=10.25;
$heure_fin_pause_matin=10.50;

//heure du d�but et de fin de la pause de midi (pour 11h30 par exemple, il faut mettre 11.50)
$heure_debut_pause_midi=12.50;
$heure_fin_pause_midi=13.75;

//heure du d�but et de fin de la pause de l'apr�s-midi (pour 15h30 par exemple, il faut mettre 15.50)
$heure_debut_pause_apresmidi=15.75;
$heure_fin_pause_apresmidi=16.00;

//afichage du mot "Salle :" devant les salles affect�es � une s�ance pour l'interface des profs. Mettre 1 si oui et 0 si non.
$affichage_mot_salle_pour_prof='0';

//afichage du mot "Materiel :" devant les mat�riels affect�s � une s�ance pour l'interface des profs. Mettre 1 si oui et 0 si non.
$affichage_mot_materiel_pour_prof='0';

//nombre de caracteres � afficher pour le nom des materiels dans l'interface des profs.
$nb_caractere_materiel_pour_vue_prof='20';

//nombre de caracteres � afficher pour le nom des salles dans l'interface des profs.
$nb_caractere_salle_pour_vue_prof='20';

//nombre de caracteres � afficher pour le nom des salles dans l'interface t�l�phone des profs.
$nb_caractere_salle_pour_vue_prof_smartphone='20';

//afichage du mot "Salle :" devant les salles affect�es � une s�ance pour l'interface des �tudiants. Mettre 1 si oui et 0 si non.
$affichage_mot_salle_pour_etudiant='0';

//nombre de caracteres � afficher pour le nom des salles dans l'interface des �tudiants.
$nb_caractere_salle_pour_vue_etudiant='20';

//nombre de caracteres � afficher pour le nom des salles dans l'interface t�l�phone des �tudiants.
$nb_caractere_salle_pour_vue_etudiant_smartphone='5';

//Permet d'activer ou de d�sactiver le message "pas de salle" quand aucune salle n'est affect�e � une s�ance. 1 si actif et 0 si inactif.
$affichage_message_pas_salle='1';

//Permet de prendre en compte la diffusabilit� des s�ances dans l'interface des �tudiants. 1 si on affiche toutes les s�ances m�me celles qui sont "non diffusables" dans VT. 0 si on ne souhaite pas diffuser les s�ances qui sont "non diffusables" dans VT.
$diffusable='0';

//autorisation de faire des exports pdf avec le login prof g�n�rique (1 si oui et 0 si non)
$autorisation_pdf=1;

//Affichage du nom des salles : mettre 0 pour afficher le nom et 1 pour afficher l'alias
$nom_salle_afficher_alias=0;

//Affichage du nom des materiels : mettre 0 pour afficher le nom et 1 pour afficher l'alias
$nom_materiel_afficher_alias=0;

//Affichage du nom des enseignement : mettre 0 pour afficher le nom et 1 pour afficher l'alias
$nom_enseignement_afficher_alias=0;



//Couleur des s�ances de l'interface etudiant. Mettre 0 pour que la couleur des s�ances soit celle des groupes dans VT. Mettre 1 pour que la couleur soit celle des mati�res. Mettre 2 pour que la couleur soit celle des profs. 
$couleur_des_seances_etudiant=2;

//Couleur des s�ances des groupes dans l'interface prof. Mettre 0 pour que la couleur des s�ances soit celle des groupes dans VT. Mettre 1 pour que la couleur soit celle des mati�res. Mettre 2 pour que la couleur soit celle des profs. 
$couleur_des_seances_groupe_prof=0;

//Couleur des s�ances des profs dans l'interface prof. Mettre 0 pour que la couleur des s�ances soit celle des groupes dans VT. Mettre 1 pour que la couleur soit celle des mati�res. Mettre 2 pour que la couleur soit celle des profs. 
$couleur_des_seances_prof_prof=0;

//Couleur des s�ances des salles dans l'interface prof. Mettre 0 pour que la couleur des s�ances soit celle des groupes dans VT. Mettre 1 pour que la couleur soit celle des mati�res. Mettre 2 pour que la couleur soit celle des profs. 
$couleur_des_seances_salle_prof=0;

//Couleur des s�ances des materiels dans l'interface prof. Mettre 0 pour que la couleur des s�ances soit celle des groupes dans VT. Mettre 1 pour que la couleur soit celle des mati�res. Mettre 2 pour que la couleur soit celle des profs. 
$couleur_des_seances_materiel_prof=0;

//Choix du filtre pour les groupes. Mettre 0 pour trier par niveau, 1 pour trier par composante ou 2 pour trier par diplome.
$filtrage_groupe=0;


//Choix du filtre pour les salles. Mettre 0 pour trier par zone ou 1 pour trier par composante.
$filtrage_salle=1;


//Tableau pour �tablir la conversion en CM TD TP des diff�rents types d�finis dans VT (15 types) afin que les bilans correspondent � ce que vous souhaitez.
// L'index du tableau correspond au type d'enseignement d�fini dans VT (1 = CM, 2= TD, 3= TD, 4 =projet, 5=s�minaire...). Les sous-tableaux correspondent � la conversion de chaque type en Cours, TD et  TP.
// Exemple : pour d�finir le le type CM comme du cours dans les bilans : 1 => array(1,0,0)
// Exemple : pour d�finir le type "DS" comme du TD dans les bilans : 9 => array(0,1,0)
// Exemple : pour d�finir le type "App CM/TD" comme 50% CM et 50%TD : 10 => array(0.5,0.5,0)


$TauxTypeEns=array(   1 => array(1,0,0),
                      2 => array(0,1,0),
                      3 => array(0,0,1),
                      4 => array(0,1,0),
                      5 => array(0,1,0),
                      6 => array(0,1,0),
                      7 => array(0,1,0),
                      8 => array(0,1,0),
                      9 => array(0,1,0),
                      10 => array(0,1,0),
                      11 => array(0,1,0),
                      12 => array(0,1,0),
                      13 => array(0,1,0),
                      14 => array(0,1,0),
                      15 => array(0,1,0)
					  );
                  
                  
// Option qui permet d'afficher ou non les lignes de bilans non r�mun�r�es. Mettre � 1 pour afficher toutes les lignes. Mettre � 0 pour masquer les lignes correspondant � 0h.
$AfficheLignesNonPayees=1;









//NE RIEN CHANGER A PARTIR D ICI

//selection de la derni�re base pour faire une requette sur tous les derniers profs, groupes...





// [SQL] Selection BD


$k=$nbdebdd-1;

$dernierebase=$base[$k];


try
{


$dbh=new PDO("mysql:host=$serveur;dbname=$dernierebase;",$user,$pass);
}

catch(PDOException $e)
{
die("erreur ! : " .$e->getMessage());
}

if(isset($_SESSION['logged_prof_smart_perso']) || isset($_SESSION['logged_prof_perso']))
{
	if (isset($_SESSION['logged_prof_smart_perso']))
		{
		$codeProf=$_SESSION['logged_prof_smart_perso'];
		}
	else
		{
		$codeProf=$_SESSION['logged_prof_perso'];
		}

//recuperation de la config perso des profs		
$sql="SELECT * FROM login_prof WHERE codeProf=:codeProf  ";
$req_config_prof_perso=$dbh->prepare($sql);
$req_config_prof_perso->execute(array(':codeProf'=>$codeProf));
$res_config_prof_perso=$req_config_prof_perso->fetchAll();
foreach($res_config_prof_perso as $config_prof)
{
	if ($config_prof['weekend']=='0')
		{
		$dimanche='0';
		$samedi='0';
		}
	elseif($config_prof['weekend']=='1')
		{
		$dimanche='0';
		$samedi='1';
		}
	else
		{
		$dimanche='1';
		$samedi='1';
		}

	if ($config_prof['couleur_groupe']=='2')
		{
		$couleur_des_seances_groupe_prof=2;
		}
	elseif($config_prof['couleur_groupe']=='1')
		{
		$couleur_des_seances_groupe_prof=1;
		}
	elseif($config_prof['couleur_groupe']=='0')
		{
		$couleur_des_seances_groupe_prof=0;
		}	

	if ($config_prof['couleur_prof']=='2')
		{
		$couleur_des_seances_prof_prof=2;
		}
	elseif($config_prof['couleur_prof']=='1')
		{
		$couleur_des_seances_prof_prof=1;
		}
	elseif($config_prof['couleur_prof']=='0')
		{
		$couleur_des_seances_prof_prof=0;
		}	

	if ($config_prof['couleur_salle']=='2')
		{
		$couleur_des_seances_salle_prof=2;
		}
	elseif($config_prof['couleur_salle']=='1')
		{
		$couleur_des_seances_salle_prof=1;
		}
	elseif($config_prof['couleur_salle']=='0')
		{
		$couleur_des_seances_salle_prof=0;
		}	

	if ($config_prof['couleur_materiel']=='2')
		{
		$couleur_des_seances_materiel_prof=2;
		}
	elseif($config_prof['couleur_materiel']=='1')
		{
		$couleur_des_seances_materiel_prof=1;
		}
	elseif($config_prof['couleur_materiel']=='0')
		{
		$couleur_des_seances_materiel_prof=0;
		}			

		
		
//sert � l'interface "ma config"		
$heure_debut_journee_bis=$heure_debut_journee;
$heure_fin_journee_bis=$heure_fin_journee;
//heure � utiliser dans le planning	
if ($config_prof['heureDebut']!=0)
{
$heure_debut_journee=$config_prof['heureDebut'];
}

if($config_prof['heureFin']!=0)
{
$heure_fin_journee=$config_prof['heureFin'];
}
	




}


}



?>