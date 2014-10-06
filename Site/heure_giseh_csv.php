<?php
session_start();

include("config.php");
error_reporting(E_ALL);

	
//lignes budgetaires
$ligne_sitec_FI="A90083SITC";
$ligne_sitec_titulaire_FA_FC="F9091HEUR";

$ligne_iut_FI="A90083IUT";
$ligne_iut_titulaire_FA_FC="F9609HEUR";
	
	
//r�cup�ration de variables
if (isset ($_GET['horiz']))
	{
	$horizon=$_GET['horiz'];
	}

if (isset ($_GET['lar']))
	{
	$lar=$_GET['lar'];
	}

if (isset ($_GET['hau']))
	{
	$hau=$_GET['hau'];
	}

if (isset ($_GET['selec_prof']))
	{
	$selec_prof=$_GET['selec_prof'];
	}

if (isset ($_GET['selec_groupe']))
	{
	$selec_groupe=$_GET['selec_groupe'];
	}

if (isset ($_GET['selec_salle']))
	{
	$selec_salle=$_GET['selec_salle'];
	}
if (isset ($_GET['selec_materiel']))
	{
	$selec_materiel=$_GET['selec_materiel'];
	}
	
if (isset ($_GET['current_year']))
	{
	$current_year=$_GET['current_year'];
	}

if (isset ($_GET['current_week']))
	{
	$current_week=$_GET['current_week'];
	}

if (isset ($_GET['jour']))
	{
	$jour_jour_j=$_GET['jour'];
	}
else 
	{
	$jour_jour_j=0;
	}	

$salles_multi=array();
if (isset ($_GET['salles_multi']))
	{
	$salles_multi=$_GET['salles_multi'];
	}
$groupes_multi=array(); 	
if(isset($_GET['groupes_multi']))
	{
	 $groupes_multi=$_GET['groupes_multi'];
	}
$profs_multi=array(); 	
if(isset($_GET['profs_multi']))
	{
	 $profs_multi=$_GET['profs_multi'];
	}	
$materiels_multi=array(); 	
if(isset($_GET['materiels_multi']))
	{
	 $materiels_multi=$_GET['materiels_multi'];
	}	
$jour=date('d');
$mois=date('m');
$annee=date('y');


if (isset ($_GET['formation']))
	{
	$formation=$_GET['formation'];
	}

if (isset ($_GET['annee_debut']))
	{
	$annee_debut=$_GET['annee_debut'];
	}

if (isset ($_GET['annee_fin']))
	{
	$annee_fin=$_GET['annee_fin'];
	}

if (isset ($_GET['mois_fin']))
	{
	$mois_fin=$_GET['mois_fin'];
	}

if (isset ($_GET['mois_debut']))
	{
	$mois_debut=$_GET['mois_debut'];
	}

if (isset ($_GET['jour_debut']))
	{
	$jour_debut=$_GET['jour_debut'];
	}

if (isset ($_GET['jour_fin']))
	{
	$jour_fin=$_GET['jour_fin'];
	}
	
   
if (isset ($_GET['jour_fin']))
	{
	if (strlen($jour_fin)==1)
		{
		$jour_fin="0".$jour_fin;
		}
	}
		
if (isset ($_GET['jour_debut']))
	{		
	if (strlen($jour_debut)==1)
		{
		$jour_debut="0".$jour_debut;
		}
	}
	
if (isset ($_GET['mois_fin']))
	{	
	if (strlen($mois_fin)==1)
		{
			$mois_fin="0".$mois_fin;
		}
	}
	
if (isset ($_GET['mois_debut']))
	{		
	if (strlen($mois_debut)==1)
		{
		$mois_debut="0".$mois_debut;
		}
	}
	
	
if (isset ($_GET['vacataire']))
	{		
	$vacataire=$_GET['vacataire'];
	}
else
{
$vacataire="oui";
}	
	
	if (isset ($_GET['export_forfait']))
	{		
	$export_forfait=$_GET['export_forfait'];
	}
else
{
$export_forfait="oui";
}	

$fichier="";	
	
//date permettant de ne selectionner que les seances qui nous interessent. J'ai mis un isset($_GET['mois_debut']) pour �tre s�r que la date a bien �t� d�finie dans l'url
if (isset ($_GET['mois_debut']))
	{	
	$date_debut_pour_requete=$annee_debut."-".$mois_debut."-".$jour_debut;
	$date_fin_pour_requete=$annee_fin."-".$mois_fin."-".$jour_fin;	
	}

	
if (isset($_SESSION['giseh']))
{
if ($_SESSION['giseh']!=0)
{




//pour chaque bdd

$dbh=null;
	for ($k=0;$k<=$nbdebdd-1;$k++)
	{
	$base_a_utiliser=$base[$k];
		try
			{
			$dbh=new PDO("mysql:host=$serveur;dbname=$base_a_utiliser;",$user,$pass);
			}

		catch(PDOException $e)
		{
		die("erreur ! : " .$e->getMessage());
		}
	$anneescolaire=$annee_scolaire[$k];

$sql="SELECT * FROM filieres where deleted= '0' ";
$req_filiere=$dbh->prepare($sql);	
$req_filiere->execute(array());
$res_filiere=$req_filiere->fetchAll();
foreach($res_filiere as $filiere)
	{
	$dateDebutBase=$filiere['dateDebut'];
	$dateFinBase=$filiere['dateFin'];
	$dateDebutBase=substr($dateDebutBase,0,10);
	$dateFinBase=substr($dateFinBase,0,10);
	}	

if (isset($annee_debut) && isset($mois_debut) && isset($jour_debut) && isset($annee_fin) && isset($mois_fin) && isset($jour_fin))
	{
	$date_debut=$annee_debut."-".$mois_debut."-".$jour_debut;
	$date_fin=$annee_fin."-".$mois_fin."-".$jour_fin;
	}



if (isset($annee_debut) && isset($mois_debut) && isset($jour_debut) && isset($annee_fin) && isset($mois_fin) && isset($jour_fin))
{
if (($date_debut>=$dateDebutBase && $date_debut<=$dateFinBase) ||($date_debut<=$dateDebutBase && $date_fin>=$dateFinBase) ||($date_debut<=$dateDebutBase && $date_fin<=$dateFinBase && $date_fin>=$dateDebutBase)   )
{	
	
//preparation des requetes
//$sql="SELECT * FROM ressources_groupes where departement=:departement and deleted= '0' ";
$sql="SELECT * FROM ressources_groupes where codeNiveau=:departement and deleted= '0' ";
$req_groupes=$dbh->prepare($sql);

//liste des groupes
$ressource_formation="(";
$req_groupes->execute(array(':departement'=>$formation));
$res_groupes=$req_groupes->fetchAll();
foreach($res_groupes as $code_grp)
	{
	$ressource_formation.="seances_groupes.codeRessource='".$code_grp['codeGroupe']."' or ";
	}
$ressource_formation.="0)";

//il faut faire 2 tableaux par ann�e. Un pour les permanents et un pour les vacataires
$categorie_profs = array('PERMANENT','VACATAIRE' );

foreach($categorie_profs as $categorie_prof)
{	

//preparation des requetes
//si vacataires
if ($categorie_prof=="VACATAIRE")
	{
	$sql="SELECT distinct (codeProf) FROM ressources_profs left join (seances_profs) on (seances_profs.codeRessource=ressources_profs.codeProf) left join (seances) on (seances.codeSeance=seances_profs.codeSeance ) left join (seances_groupes) on (seances.codeSeance=seances_groupes.codeSeance ) where seances.dateSeance<=:dateFin AND seances.dateSeance>=:dateDebut   and seances_profs.deleted='0' and ressources_profs.deleted= '0' AND seances.deleted='0' and seances_groupes.deleted='0' and ($ressource_formation) and  ressources_profs.titulaire!='1'   order by nom asc";
	$req_compteur_profs=$dbh->prepare($sql);
	
	$sql="SELECT * FROM ressources_profs  where  titulaire!='1' and deleted= '0' order by nom asc";
	$req_profs=$dbh->prepare($sql);
	
	$titre_tableau="vacataires";
	}
//si permanents
else
	{
	$sql="SELECT distinct (codeProf) FROM ressources_profs left join (seances_profs) on (seances_profs.codeRessource=ressources_profs.codeProf) left join (seances) on (seances.codeSeance=seances_profs.codeSeance ) left join (seances_groupes) on (seances.codeSeance=seances_groupes.codeSeance ) where seances.dateSeance<=:dateFin AND seances.dateSeance>=:dateDebut   and seances_profs.deleted='0' and ressources_profs.deleted= '0' AND seances.deleted='0' and seances_groupes.deleted='0' and ($ressource_formation) and  ressources_profs.titulaire='1'   order by nom asc";
	$req_compteur_profs=$dbh->prepare($sql);
	
	$sql="SELECT * FROM ressources_profs  where titulaire='1' and deleted= '0' order by nom asc";
	$req_profs=$dbh->prepare($sql);
	
	$titre_tableau="permanents";
	}


$sql="SELECT *, niveaux.identifiant as niveau, composantes.identifiant as identifiant_composante, ressources_groupes.identifiant as identifiant_groupe, ressources_groupes.nom as nom_groupe, ressources_groupes.typePublic as groupe_type_public, ressources_groupes.codeGroupe as codeGroupe FROM seances_profs left join (seances) on (seances.codeSeance=seances_profs.codeSeance ) left join (seances_groupes) on (seances.codeSeance=seances_groupes.codeSeance ) left join (ressources_groupes) on (seances_groupes.codeRessource=ressources_groupes.codeGroupe)  left join (composantes) on (ressources_groupes.codeComposante=composantes.codeComposante) left join (enseignements) on (seances.codeEnseignement=enseignements.codeEnseignement) left join (niveaux) on (niveaux.codeNiveau=ressources_groupes.codeNiveau) where niveaux.deleted='0' and seances.dateSeance<=:dateFin AND seances.dateSeance>=:dateDebut AND seances_profs.codeRessource=:codeRessource AND enseignements.deleted='0' and seances_profs.deleted='0' and composantes.deleted='0'and ressources_groupes.deleted= '0' AND seances.deleted='0' and seances_groupes.deleted='0' and ($ressource_formation)  order by ressources_groupes.identifiant,enseignements.identifiant,enseignements.codeTypeActivite,ressources_groupes.typePublic,seances.dateSeance,seances.heureSeance";
$req_seance_profs=$dbh->prepare($sql);

$sql="SELECT * FROM lignes_budgetaires_groupes  left join (lignes_budgetaires) on  lignes_budgetaires_groupes.codeLigneBudgetaire=lignes_budgetaires.codeLigneBudgetaire   where  lignes_budgetaires_groupes.codeRessource=:codeGroupe AND lignes_budgetaires_groupes.deleted= '0' AND lignes_budgetaires.deleted= '0'"	;
$req_ligne_budgetaire=$dbh->prepare($sql);	
	
$sql="SELECT * FROM seances where codeSeance=:codeSeance AND deleted= '0'";
$req_seance=$dbh->prepare($sql);	


$sql="SELECT * FROM enseignements   where  enseignements.codeEnseignement=:codeEnseignement AND enseignements.deleted= '0'"	;
$req_enseignement=$dbh->prepare($sql);	


$sql="SELECT * FROM niveaux  where niveaux.deleted='0'  and niveaux.codeNiveau=:codeNiveau"	;
$req_semestre=$dbh->prepare($sql);	

$sql="SELECT * FROM seances_profs where seances_profs.deleted='0' and seances_profs.codeSeance=:codeSeance "	;
$req_prof=$dbh->prepare($sql);	

$sql="SELECT * FROM seances_groupes where seances_groupes.deleted='0' and seances_groupes.codeSeance=:codeSeance "	;
$req_groupe=$dbh->prepare($sql);	

$sql="SELECT * FROM seances left join seances_profs on seances.codeSeance=seances_profs.codeSeance where seances.deleted='0' and seances_profs.deleted='0' and seances_profs.codeRessource=:codeProf and seances.codeEnseignement=:codeEnseignement  ";
$req_seance_enseignement=$dbh->prepare($sql);	


$sql="SELECT * FROM enseignements left join (enseignements_profs) on (enseignements.codeEnseignement=enseignements_profs.codeEnseignement )  where enseignements_profs.codeRessource=:codeRessource AND enseignements_profs.deleted='0' AND enseignements.forfaitaire='1' AND enseignements.deleted='0' order by enseignements.nom"	;
$req_enseignement_forfait=$dbh->prepare($sql);	


$sql="SELECT *,  niveaux.identifiant as niveau, composantes.identifiant as identifiant_composante, ressources_groupes.identifiant as identifiant_groupe, ressources_groupes.nom as nom_groupe  FROM ressources_groupes left join (composantes) on (ressources_groupes.codeComposante=composantes.codeComposante) left join (niveaux) on (niveaux.codeNiveau=ressources_groupes.codeNiveau)  where niveaux.deleted='0' and codeGroupe=:codeGroupe AND composantes.deleted='0' and ressources_groupes.deleted= '0'"	;
$req_groupe_forfait=$dbh->prepare($sql);	


$sql="SELECT * FROM enseignements_profs where enseignements_profs.deleted='0' and enseignements_profs.codeEnseignement=:codeEnseignement  "		;
$req_enseignement_prof_forfait=$dbh->prepare($sql);	
	
		
	
//verification qu'il y a au moins une s�ance � afficher	
$sql="SELECT * FROM ressources_groupes join (seances_groupes) on (seances_groupes.codeRessource=ressources_groupes.codeGroupe) join (seances) on (seances.codeSeance=seances_groupes.codeSeance ) where  ($ressource_formation) and seances.dateSeance>='$date_debut' and  seances.dateSeance<='$date_fin' and seances_groupes.deleted= '0' and  seances.deleted='0'  and ressources_groupes.deleted= '0'";
$req_seance_groupes_verif=$dbh->prepare($sql);
$req_seance_groupes_verif->execute(array());
$res_seance_groupes_verif=$req_seance_groupes_verif->fetchAll();	
$compteur_seance=count($res_seance_groupes_verif);

//verification s'il y a des enseignements forfaitaires	
	//liste des groupes
$ressource_formation_forfait="(";
$req_groupes->execute(array(':departement'=>$formation));
$res_groupes=$req_groupes->fetchAll();
foreach($res_groupes as $code_grp)
	{
	$ressource_formation_forfait.="enseignements_groupes.codeRessource='".$code_grp['codeGroupe']."' or ";
	}
$ressource_formation_forfait.="0)";
$sql="SELECT * FROM enseignements left join (enseignements_groupes) on (enseignements.codeEnseignement=enseignements_groupes.codeEnseignement )  where ($ressource_formation_forfait) AND enseignements_groupes.deleted='0' AND enseignements.forfaitaire='1' AND enseignements.deleted='0'"	;
$req_enseignement_forfait_verif=$dbh->prepare($sql);	
$req_enseignement_forfait_verif->execute(array());
$res_enseignement_forfait_verif=$req_enseignement_forfait_verif->fetchAll();	
$compteur_enseignement_forfait=count($res_enseignement_forfait_verif);


if ($compteur_seance!=0 or $compteur_enseignement_forfait!=0)
	{
	
	//r�cuperation du nom de la formation
	$sql="SELECT * FROM niveaux where codeNiveau=:departement and deleted= '0' ";
$req_nom_niveau=$dbh->prepare($sql);
$req_nom_niveau->execute(array(':departement'=>$formation));
$res_nom_niveaux=$req_nom_niveau->fetchAll();
foreach($res_nom_niveaux as $res_nom_niveau)
	{
	$formation_nom=$res_nom_niveau['nom'];
	}
	
	
	
	$fichier.="Export Giseh en ".$formation_nom." (".$titre_tableau.")"."\n";

	$fichier.="P�riode du ".$jour_debut."/".$mois_debut."/".$annee_debut." au  ".$jour_fin."/".$mois_fin."/".$annee_fin."\n";

	$fichier.="G�n�r� le ".date('d')."/".date('m')."/".date('y')."\n";
	
$fichier.="\n";
	$fichier.="Ann�e scolaire ".$anneescolaire."\n";

	$fichier.="Nom;Pr�nom;Harp�ge;Statut prof;Version d'�tape;Fili�re;Code composante;Apog�e;Niveau;Cycle;P�riodicit�;Public;Ligne budg�taire;Type;Dur�e hebdo;Nombre de semaines". "\n";
	

	}	
	
	
//initialisation des variables
$total_heure_eqtd="";
$total_min_eqtd="";
$total_heure_cr="";
$total_min_cr="";
$total_heure_td="";
$total_min_td="";
$total_heure_tp="";
$total_min_tp="";
$total_heure_forfait="";
$total_min_forfait="";
$bgcolor="silver";
$variable_prof="";	
$changement_a_la_ligne_suivante=0;
$variable_couleur=0;
$affichage_eqtd=0;
$code_apogee='';
$code_etape="";
$premiere_seance='1';
$nom_prof="";	
$prenom_prof="";	
$harpege_prof="";

//Trouve le codeProf du dernier prof � traiter afin de pouvoir forcer plus loin l'affichage de la derni�re ligne du dernier profs. 
$req_compteur_profs->execute(array(':dateDebut'=>$date_debut_pour_requete,':dateFin'=>$date_fin_pour_requete));
$res_compteur_profs=$req_compteur_profs->fetchAll();	
foreach($res_compteur_profs as $res_compteur_prof)
	{	
	$code_du_dernier_prof=$res_compteur_prof['codeProf'];
	}



//boucle pour passer en revu tous les profs.
$req_profs->execute(array());
$res_profs=$req_profs->fetchAll();	
foreach($res_profs as $prof)
{	

$codeRessource=$prof['codeProf'];


//boucle pour passer en revu toutes les seance d'un profs. On en profite pour compter combien il y a de s�ances afin de pouvoir forcer plus loin l'affichage de la derni�re ligne du dernier profs.
$compteur_seance=0;
$req_seance_profs->execute(array(':codeRessource'=>$codeRessource,':dateDebut'=>$date_debut_pour_requete,':dateFin'=>$date_fin_pour_requete));
$res_seance_profs=$req_seance_profs->fetchAll();
$nombre_seance_a_traiter=count($res_seance_profs);
foreach($res_seance_profs as $seance_prof)
{
		
$compteur_seance+=1;	
//nom groupes, version d'�tape, fili�re, niveau et public	
$nom_seance_groupe=$seance_prof['nom_groupe'].", ";
$identifiant_composante=$seance_prof['identifiant_composante'];
$identifiant_groupe=$seance_prof['identifiant_groupe'];
$nouveau_code_etape=$identifiant_groupe;
$niveau=$seance_prof['niveau'];
$public=$seance_prof['groupe_type_public'];
if ($public=="0")
	{
	$public="AUTRE";
	}
elseif ($public=="1")
	{
	$public="FI";
	}
elseif ($public=="2")
	{
	$public="FA";
	}
elseif ($public=="3")
	{
	$public="FC";
	}	
	
	


		
$seance_groupe_codeSeance=$seance_prof['codeSeance'];
$req_seance->execute(array(':codeSeance'=>$seance_groupe_codeSeance));
$res_seance=$req_seance->fetchAll();
foreach($res_seance as $seance)
	{	
	$annee=substr($seance['dateSeance'],0,4);
	$mois=substr($seance['dateSeance'],5,2);
	$jour=substr($seance['dateSeance'],8,2);
	$date_seance=$annee.$mois.$jour;
	}	



$codeEnseignement=$seance['codeEnseignement'];
$req_enseignement->execute(array(':codeEnseignement'=>$codeEnseignement));
$res_enseignement=$req_enseignement->fetchAll();
foreach($res_enseignement as $enseignement)
	{	
	$forfait=$enseignement['forfaitaire'];
	}
$nouveau_code_apogee=$enseignement['identifiant'];

if ($date_seance<=$annee_fin.$mois_fin.$jour_fin and $date_seance>=$annee_debut.$mois_debut.$jour_debut  and $forfait!=1)
{
			
$affichage_eqtd=1; //initialisation variable pour l affichage du cumul des heures
	

//comptage du nb de profs associ�s � la s�ance
$nb_profs=0;

$req_prof->execute(array(':codeSeance'=>$seance_groupe_codeSeance));
$res_prof=$req_prof->fetchAll();
foreach($res_prof as $profs_seance)
	{	
	$nb_profs=$nb_profs+1;
	}	
	
//comptage du nb de groupess associ�s � la s�ance
$nb_groupes=0;

$req_groupe->execute(array(':codeSeance'=>$seance_groupe_codeSeance));
$res_groupe=$req_groupe->fetchAll();
foreach($res_groupe as $groupes_seance)
	{	
	$nb_groupes=$nb_groupes+1;
	}	

		

//duree cr td tp
if (strlen($seance['dureeSeance'])==5)
	{
	$heureduree=substr($seance['dureeSeance'],0,3);
	$minduree=substr($seance['dureeSeance'],3,2);
	}		
if (strlen($seance['dureeSeance'])==4)
	{
	$heureduree=substr($seance['dureeSeance'],0,2);
	$minduree=substr($seance['dureeSeance'],2,2);
	}
if (strlen($seance['dureeSeance'])==3)
	{
	$heureduree=substr($seance['dureeSeance'],0,1);
	$minduree=substr($seance['dureeSeance'],1,2);
	}
if (strlen($seance['dureeSeance'])==2)
	{
	$heureduree=0;
	$minduree=$seance['dureeSeance'];
	}
if (strlen($heureduree)==1)
	{
	$heureduree="0".$heureduree;
	}	

//heure debut seance
if (strlen($seance['heureSeance'])==4)
	{
	$heuredebut=substr($seance['heureSeance'],0,2);
	$mindebut=substr($seance['heureSeance'],2,2);
	}
if (strlen($seance['heureSeance'])==3)
	{
	$heuredebut=substr($seance['heureSeance'],0,1);
	$mindebut=substr($seance['heureSeance'],1,2);
	}
if (strlen($seance['heureSeance'])==2)
	{
	$heuredebut=0;
	$mindebut=$seance['heureSeance'];
	}
if (strlen($heuredebut)==1)
	{
	$heuredebut="0".$heuredebut;
	}	
//heure fin
$heurefinenmin=$heuredebut*60+$mindebut+$heureduree*60+$minduree;
$heurefin=intval($heurefinenmin/60);
if (strlen($heurefin)==1)
	{
	$heurefin="0".$heurefin;
	}
$minfin=$heurefinenmin%60;
if (strlen($minfin)==1)
	{
	$minfin="0".$minfin;
	}

//annee mois jour
$annee=substr($seance['dateSeance'],0,4);
$mois=substr($seance['dateSeance'],5,2);
$jour=substr($seance['dateSeance'],8,2);		

//mise en forme matiere
$pos_dudebut = strpos($enseignement['nom'], "_")+1;	
$pos_defin = strripos($enseignement['nom'], "_");	
$longueur=$pos_defin-$pos_dudebut;
$nomenseignement=substr($enseignement['nom'],$pos_dudebut,$longueur);

//type d'enseignement

if ($enseignement['codeTypeActivite']==1)
	{
	$type="CM";
	}
elseif ($enseignement['codeTypeActivite']==2)
	{
	$type="TD";
	}
elseif ($enseignement['codeTypeActivite']==3)
	{
	$type="TP";
	}
else
	{
	$type="TD";
	}			

//periodicit� (semestre 1 ou 2) correspond au trois�me chiffre avant la fin du code apog�e
$periode="Erreur";
$req_semestre->execute(array(':codeNiveau'=>$enseignement['codeNiveau']));
$res_semestres=$req_semestre->fetchAll();
foreach($res_semestres as $res_semestre)
	{	
	$periode=$res_semestre['identifiant'];
	}	


if ($periode==1 || $periode==3 || $periode==5 || $periode==7)
	{
	$periode=1;
	}
elseif ($periode==2 || $periode==4 || $periode==6 || $periode==8)
	{
	$periode=2;
	}
elseif ($periode==0)
	{
	//pour les vacataires, la p�riodicit� annuelle n'existe pas donc on force � la valeur 1 (semestre 1)
	if ($categorie_prof=="VACATAIRE")
	{
	$periode=1;
	}
	else
	{
	$periode=0;
	}
	}
else
	{
	$periode="Erreur";
	}



//calcul de la duree

if ($enseignement['volumeReparti']==1)
	{
	$dureeenmin=($heureduree*60+$minduree)/($nb_profs*$nb_groupes);
	}
else
	{
	$dureeenmin=($heureduree*60+$minduree)/$nb_groupes;
	}
$heureduree=intval($dureeenmin/60);
			
if (strlen($heureduree)==1)
	{
	$heureduree="0".$heureduree;
	}
$minduree=$dureeenmin%60;
if (strlen($minduree)==1)
	{
	$minduree="0".$minduree;
	}
if (strlen($minduree)==0)
	{
	$minduree="00";
	}	
$dureeeqtd=$heureduree."h".$minduree;
$total_heure_td+=$heureduree;
$total_min_td+=$minduree;
}
		
		
	








	
//forfait avec s�ances
if ($date_seance<=$annee_fin.$mois_fin.$jour_fin and $date_seance>=$annee_debut.$mois_debut.$jour_debut and $forfait==1)
{

$affichage_eqtd=1; //initialisation variable pour l affichage du cumul des heures


			
//comptage du nb de profs associ�s � la s�ance
$nb_profs=0;

	
$req_prof->execute(array(':codeSeance'=>$seance_groupe_codeSeance));
$res_prof=$req_prof->fetchAll();
foreach($res_prof as $profs_seance)
	{	
	$nb_profs=$nb_profs+1;
	}		
	
//comptage du nb de groupess associ�s � la s�ance
$nb_groupes=0;

$req_groupe->execute(array(':codeSeance'=>$seance_groupe_codeSeance));
$res_groupe=$req_groupe->fetchAll();
foreach($res_groupe as $groupes_seance)
	{	
	$nb_groupes=$nb_groupes+1;
	}	



//duree cr td tp
if (strlen($seance['dureeSeance'])==5)
	{
	$heureduree=substr($seance['dureeSeance'],0,3);
	$minduree=substr($seance['dureeSeance'],3,2);
	}	
if (strlen($seance['dureeSeance'])==4)
	{
	$heureduree=substr($seance['dureeSeance'],0,2);
	$minduree=substr($seance['dureeSeance'],2,2);
	}
if (strlen($seance['dureeSeance'])==3)
	{
	$heureduree=substr($seance['dureeSeance'],0,1);
	$minduree=substr($seance['dureeSeance'],1,2);
	}
if (strlen($seance['dureeSeance'])==2)
	{
	$heureduree=0;
	$minduree=$seance['dureeSeance'];
	}
if (strlen($seance['dureeSeance'])==1)
	{
	$heureduree=0;
	$minduree="0".$seance['dureeSeance'];
	}
if (strlen($heureduree)==1)
	{
	$heureduree="0".$heureduree;
	}	

//heure debut seance
if (strlen($seance['heureSeance'])==4)
	{
	$heuredebut=substr($seance['heureSeance'],0,2);
	$mindebut=substr($seance['heureSeance'],2,2);
	}
if (strlen($seance['heureSeance'])==3)
	{
	$heuredebut=substr($seance['heureSeance'],0,1);
	$mindebut=substr($seance['heureSeance'],1,2);
	}
if (strlen($seance['heureSeance'])==2)
	{
	$heuredebut=0;
	$mindebut=$seance['heureSeance'];
	}
if (strlen($heuredebut)==1)
	{
	$heuredebut="0".$heuredebut;
	}	
//heure fin
$heurefinenmin=$heuredebut*60+$mindebut+$heureduree*60+$minduree;
$heurefin=intval($heurefinenmin/60);
if (strlen($heurefin)==1)
	{
	$heurefin="0".$heurefin;
	}
$minfin=$heurefinenmin%60;
if (strlen($minfin)==1)
	{
	$minfin="0".$minfin;
	}

//annee mois jour
$annee=substr($seance['dateSeance'],0,4);
$mois=substr($seance['dateSeance'],5,2);
$jour=substr($seance['dateSeance'],8,2);		

//mise en forme matiere
$pos_dudebut = strpos($enseignement['nom'], "_")+1;	
$pos_defin = strripos($enseignement['nom'], "_");	
$longueur=$pos_defin-$pos_dudebut;
$nomenseignement=substr($enseignement['nom'],$pos_dudebut,$longueur);

//	volume horaire total du forfait
if (strlen($enseignement['dureeForfaitaire'])==5)
	{
	$heureduree_forfait=substr($enseignement['dureeForfaitaire'],0,3);
	$minduree_forfait=substr($enseignement['dureeForfaitaire'],3,2);
	}
if (strlen($enseignement['dureeForfaitaire'])==4)
	{
	$heureduree_forfait=substr($enseignement['dureeForfaitaire'],0,2);
	$minduree_forfait=substr($enseignement['dureeForfaitaire'],2,2);
	}
if (strlen($enseignement['dureeForfaitaire'])==3)
	{
	$heureduree_forfait=substr($enseignement['dureeForfaitaire'],0,1);
	$minduree_forfait=substr($enseignement['dureeForfaitaire'],1,2);
	}
if (strlen($enseignement['dureeForfaitaire'])==2)
	{
	$heureduree_forfait=0;
	$minduree_forfait=$enseignement['dureeForfaitaire'];
	}
if (strlen($enseignement['dureeForfaitaire'])==1)
	{
	$heureduree_forfait=0;
	$minduree_forfait="0".$enseignement['dureeForfaitaire'];
	}
if (strlen($heureduree_forfait)==1)
	{
	$heureduree_forfait="0".$heureduree_forfait;
	}			
//type d'enseignement			
if ($enseignement['codeTypeActivite']==1)
	{
	$type="CM";
	}
elseif ($enseignement['codeTypeActivite']==2)
	{
	$type="TD";
	}
elseif ($enseignement['codeTypeActivite']==3)
	{
	$type="TP";
	}
else
	{
	$type="TD";
	}
//periodicit� (semestre 1 ou 2) correspond au trois�me chiffre avant la fin du code apog�e
$periode="Erreur";
$req_semestre->execute(array(':codeNiveau'=>$enseignement['codeNiveau']));
$res_semestres=$req_semestre->fetchAll();
foreach($res_semestres as $res_semestre)
	{	
	$periode=$res_semestre['identifiant'];
	}	
if ($periode==1 || $periode==3 || $periode==5 || $periode==7)
	{
	$periode=1;
	}
elseif ($periode==2 || $periode==4 || $periode==6 || $periode==8)
	{
	$periode=2;
	}
elseif ($periode==0)
	{
	//pour les vacataires, la p�riodicit� annuelle n'existe pas donc on force � la valeur 1 (semestre 1)
	if ($categorie_prof=="VACATAIRE")
	{
	$periode=1;
	}
	else
	{
	$periode=0;
	}
	}
else
	{
	$periode="Erreur";
	}



//comptage du nb de s�naces associ� � l'enseignement
$nb_seances=0;


$enseignement_codeenseignement=$enseignement['codeEnseignement'];
$req_seance_enseignement->execute(array(':codeEnseignement'=>$enseignement_codeenseignement, ':codeProf'=>$codeRessource));
$res_seance_enseignement=$req_seance_enseignement->fetchAll();
foreach($res_seance_enseignement as $nb_seances_forfait)
	{	
	$nb_seances=$nb_seances+1;
	}			
		
		



if ($enseignement['volumeReparti']==1)
	{
	$dureeenmin=(($heureduree_forfait*60+$minduree_forfait)/$nb_profs)/$nb_seances/$nb_groupes;
	}
else
	{
	$dureeenmin=($heureduree_forfait*60+$minduree_forfait)/$nb_seances/$nb_groupes;
	}
$heureduree=intval($dureeenmin/60);
										
if (strlen($heureduree)==1)
	{
	$heureduree="0".$heureduree;
	}
$minduree=$dureeenmin%60;
if (strlen($minduree)==1)
	{
	$minduree="0".$minduree;
	}
if (strlen($minduree)==0)
	{
	$minduree="00";
	}	
$dureeeqtd=$heureduree."h".$minduree;

			
			

$total_heure_forfait+=$heureduree;
$total_min_forfait+=$minduree;


?>		
</tr>
<?php
}	
	/*
//pour la derni�re ligne du tableau (dernier enseignement du dernier prof), on comptabilise le nombre d'heure	
if	($compteur_seance==$nombre_seance_a_traiter && $code_du_dernier_prof==$prof['codeProf'])
	{
	$total_heure_eqtd+=$heureduree;
	$total_min_eqtd+=$minduree;
	}	
	*/
	
	
	
	
if ($premiere_seance=='0' && (($nouveau_code_apogee!=$code_apogee or $ancien_public!=$public or $nouveau_code_etape!=$code_etape or $prenom_prof!=$prof['prenom'] or $nom_prof!=$prof['nom'] or $ancien_type!=$type)))		
//if ($premiere_seance=='0' && (($nouveau_code_apogee!=$code_apogee or $ancien_public!=$public or $nouveau_code_etape!=$code_etape or $prenom_prof!=$prof['prenom'] or $nom_prof!=$prof['nom'] or $ancien_type!=$type) or ($compteur_seance==$nombre_seance_a_traiter && $code_du_dernier_prof==$prof['codeProf'])))
{






//changement des couleurs
if ($changement_a_la_ligne_suivante==1)
	{
	$changement_a_la_ligne_suivante=0;
	if ($variable_couleur==1)
		{
		$variable_couleur=0;
		}
	else
		{
		$variable_couleur=1;
		}
	}
if ($prenom_prof!=$prof['prenom'] || $nom_prof!=$prof['nom'] ) //test si on a change de prof pour la gestion des couleurs
	{
	$changement_a_la_ligne_suivante=1;
	}	

if ($variable_couleur==1)
	{
	if ($bgcolor=="#FFDCAA")
		{
		$bgcolor="#D2FFD2";
		}
	else
		{
		$bgcolor="#FFDCAA";
		}
	}
else
	{
	if ($bgcolor=="white")
		{
		$bgcolor="#FAFA50";
		}
	else
		{
		$bgcolor="white";
		}	
	}





//correction du code apog�e pour master. Si cours avec m�ca et elec et ener, il faut 3 codes apog�e diff�rents et pas toujours le m�me. La troisieme lettre du code apog�e correspond � la filiere.

//si grp des m�ca (M1 ou M2)
 if ($code_etape=="Z4MSCI91" || $code_etape=="Z5MSCI91" )
	 {
	 $lettre_code_apogee=substr($code_apogee, 2, 1);
	 if ($lettre_code_apogee!="M")
		 {
		 $longueur_code_apogee=strlen($code_apogee);
		 $code_apogee_a_afficher=substr($code_apogee, 0, 2)."M".substr($code_apogee, 3, $longueur_code_apogee-3);
		 }
	 else
		 {
		 $code_apogee_a_afficher=$code_apogee;
		 }
	 }
 //si grp des �lec (M1 ou M2)
 elseif ($code_etape=="Z4EESC91" || $code_etape=="Z5EESC91")
	 {
	$lettre_code_apogee=substr($code_apogee, 2, 1);
	if ($lettre_code_apogee!="S")
		 {
		 $longueur_code_apogee=strlen($code_apogee);
		 $code_apogee_a_afficher=substr($code_apogee, 0, 2)."S".substr($code_apogee, 3, $longueur_code_apogee-3);
		 }
	else
		 {
		 $code_apogee_a_afficher=$code_apogee;
		 }
	 }
//si grp des ener (M1 ou M2)
elseif ($code_etape=="Z4ENMA91" || $code_etape=="Z5ENMA91")
	{
	$lettre_code_apogee=substr($code_apogee, 2, 1);
	if (($lettre_code_apogee!="E" && $lettre_code_apogee!="C") && $code_apogee!='ZMMCO101' && $code_apogee!='ZMMMC101' && $code_apogee!='ZMMMS301') //pour le cours de composite de Manu qui est commun au M1 m�ca et au M2 �ner, les 2 codes apogee ont plus de diff�rences que seulement 1 lettre (ZMMMC101 et ZMEMA301)
		{
		$longueur_code_apogee=strlen($code_apogee);
		$code_apogee_a_afficher=substr($code_apogee, 0, 2)."E".substr($code_apogee, 3, $longueur_code_apogee-3);
		}
	else
		{
		$code_apogee_a_afficher=$code_apogee;
		}
		
	 //exception pour le cours de composite de Manu qui est commun au M1 m�ca et au M2 �ner, les 2 codes apogee  ont plus de diff�rences que seulement 1 lettre (ZMMMC101 et ZMEMA301)
		 if ($code_apogee_a_afficher=="ZMMMC101")
		{
		$code_apogee_a_afficher="ZMEMA301";
		}
 
	}
 

//correction pour la licence L3. Les codes apog�e sont au format suivant : "MECA:ZMLRD501 ELEC:ZMLRD501"

elseif ($code_etape=="Z3ELEC91" )
	{
	if(stristr($code_apogee, 'elec:') === FALSE) 
		{
		$code_apogee_a_afficher=$code_apogee;
		}
	else
		{
		$code_apogee_a_afficher=substr(stristr($code_apogee, 'elec:'),5,8);
		}
	}
elseif ($code_etape=="Z3ENRG91" )
	{
	if(stristr($code_apogee, 'ener:') === FALSE) 
		{
		$code_apogee_a_afficher=$code_apogee;
		}
	else
		{
		$code_apogee_a_afficher=substr(stristr($code_apogee, 'ener:'),5,8);
		}
	}
elseif ($code_etape=="Z3MECA91" )
	{
	if(stristr($code_apogee, 'meca:') === FALSE) 
		{
		$code_apogee_a_afficher=$code_apogee;
		}
	else
		{
		$code_apogee_a_afficher=substr(stristr($code_apogee, 'meca:'),5,8);
		}
	}
else
	{
	$code_apogee_a_afficher=$code_apogee;
	}





//si le public est de type "autre", on paye 50% FI et 50%FA pour les TP donc on fait 2 lignes. 
if ($ancien_public=="AUTRE"  && $ancien_type=="TP")
{
$n=2;
//la premi�re ligne sera de l'apprentissage
$public_a_afficher="FA";
}
elseif ($ancien_public=="AUTRE" && $ancien_type!="TP")
{
$n=1;
//la premi�re ligne sera de l'apprentissage
$public_a_afficher="FI";
}
else
{
$n=1;
$public_a_afficher=$ancien_public;

}



//mise en forme de la dur�e
$total_heure_eqtd_en_min=($total_heure_eqtd*60+$total_min_eqtd)/$n;



//pour les vacataire, on regarde si on doit transformer les TP en TD
if ($categorie_prof=="VACATAIRE") 
{
if ($ancien_type=="TP")
	{
	if ($vacataire=="oui")
		{
		$type_a_afficher="TD";
		}
	else
		{
		$type_a_afficher=$ancien_type;
		}
	}
	else
	{
	$type_a_afficher=$ancien_type;
	}
}
else
{
$type_a_afficher=$ancien_type;
}


//recherche de la ligne budgetaire pour payer les vacataires en FA et FC	
$req_ligne_budgetaire->execute(array(':codeGroupe'=>$ancien_code_groupe));
$lignes_budgetaires=$req_ligne_budgetaire->fetchAll();
$compteur_ligne_budgetaire=0;
foreach($lignes_budgetaires as $ligne_budgetaire)
	{	
	
	$compteur_ligne_budgetaire+=1;
	}		
	if ($compteur_ligne_budgetaire!="0")
	{
	$ligne_budgetaire_FA_FC_vac=$ligne_budgetaire['identifiant'];
	}
	else
	{
	$ligne_budgetaire_FA_FC_vac="Erreur";
	}




//verifie sur dur�e est inf�rieure � 12h soit 720 min Si oui on affiche une ligne . 
if ($total_heure_eqtd_en_min<=720)
	{

	
	$total_heure_eqtd=intval($total_heure_eqtd_en_min/60);
	$total_min_eqtd=$total_heure_eqtd_en_min%60;
	if (strlen($total_heure_eqtd)==1)
		{
		$total_heure_eqtd="0".$total_heure_eqtd;
		}

	if (strlen($total_min_eqtd)==1)
		{
		$total_min_eqtd="0".$total_min_eqtd;
		}
	if (strlen($total_min_eqtd)==0)
		{
		$total_min_eqtd="00";
		}	
for ($i=0; $i<$n; $i++)
{	
if ($niveau==1 || $niveau==2 || $niveau ==3) 
 {
 $cycle="L";
 }
 else
 {
 $cycle="M";
 } 
 
 //ligne budg�taire
 if ($identifiant_composante=="SIT" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_sitec_FI;
 }
 elseif ($identifiant_composante=="SIT" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
$ligne=$ligne_sitec_titulaire_FA_FC;
 } 
 elseif ($identifiant_composante=="TI1" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_iut_FI;
 } 
 elseif ($identifiant_composante=="TI1" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
 $ligne=$ligne_iut_titulaire_FA_FC;
 }
 elseif (($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="VACATAIRE")
 {
$ligne=$ligne_budgetaire_FA_FC_vac;
 } 
 else
 {
$ligne="Erreur";
 }
 
 //code composante
if($identifiant_composante=="SIT")
{
$code_composante="909";
}
 else 
 {
$code_composante="960";
 } 
 
 //statut prof
 if ($categorie_prof=="VACATAIRE")
 {
 $statut_prof= "V";
 }
 elseif ($categorie_prof=="PERMANENT") 
 {
   $statut_prof= "P";
 }
 else
 {
 $statut_prof= "erreur";
 }
 
$fichier.=$nom_prof.";".$prenom_prof.";".$harpege_prof.";".$statut_prof.";".$code_etape.";".$identifiant_composante.";".$code_composante.";".$code_apogee_a_afficher.";".$niveau.";".$cycle.";".$ancienne_periode.";".$public_a_afficher.";".$ligne.";".$type_a_afficher.";".$total_heure_eqtd.",".$total_min_eqtd.";"."1"."\n";		





	$public_a_afficher="FI";
	}
	$total_heure_eqtd=$heureduree;
	$total_min_eqtd=$minduree;
	}


//si sup�rieur � 12h et le resultat de la division par 12, 10, 11, 10... est �gale � 00min afin de favoriser l'affichage des heures avec des chiffres ronds
elseif ($total_heure_eqtd_en_min>720 and (($total_heure_eqtd_en_min%720==0 and $total_heure_eqtd_en_min/720<=12) or ($total_heure_eqtd_en_min%660==0 and $total_heure_eqtd_en_min/660<=12) or ($total_heure_eqtd_en_min%600==0 and $total_heure_eqtd_en_min/600<=12) or ($total_heure_eqtd_en_min%540==0 and $total_heure_eqtd_en_min/540<=12) or ($total_heure_eqtd_en_min%480==0 and $total_heure_eqtd_en_min/480<=12) or ($total_heure_eqtd_en_min%420==0 and $total_heure_eqtd_en_min/420<=12) ))
	{

	//nb de semaines
	if ($total_heure_eqtd_en_min%720==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min/720;
		}	
	elseif ($total_heure_eqtd_en_min%660==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min/660;
		}
	elseif ($total_heure_eqtd_en_min%600==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min/600;
		}
	elseif ($total_heure_eqtd_en_min%540==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min/540;
		}
	elseif ($total_heure_eqtd_en_min%480==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min/480;
		}
	elseif ($total_heure_eqtd_en_min%420==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min/420;
		}
	$total_heure_eqtd_en_min=$total_heure_eqtd_en_min/$nb_semaine;
	$total_heure_eqtd=intval($total_heure_eqtd_en_min/60);
	$total_min_eqtd=$total_heure_eqtd_en_min%60;
	if (strlen($total_heure_eqtd)==1)
		{
		$total_heure_eqtd="0".$total_heure_eqtd;
		}
	if (strlen($total_min_eqtd)==1)
		{
		$total_min_eqtd="0".$total_min_eqtd;
		}
	if (strlen($total_min_eqtd)==0)
		{
		$total_min_eqtd="00";
		}	
	for ($i=0; $i<$n; $i++)
{	
if ($niveau==1 || $niveau==2 || $niveau ==3) 
 {
 $cycle="L";
 }
 else
 {
 $cycle="M";
 } 
  //ligne budg�taire
 if ($identifiant_composante=="SIT" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_sitec_FI;
 }
 elseif ($identifiant_composante=="SIT" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
$ligne=$ligne_sitec_titulaire_FA_FC;
 } 
 elseif ($identifiant_composante=="TI1" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_iut_FI;
 } 
 elseif ($identifiant_composante=="TI1" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
 $ligne=$ligne_iut_titulaire_FA_FC;
 }
 elseif (($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="VACATAIRE")
 {
$ligne=$ligne_budgetaire_FA_FC_vac;
 } 
 else
 {
$ligne="Erreur";
 }
 
  //code composante
if($identifiant_composante=="SIT")
{
$code_composante="909";
}
 else 
 {
$code_composante="960";
 } 
 
  //statut prof
 if ($categorie_prof=="VACATAIRE")
 {
 $statut_prof= "V";
 }
 elseif ($categorie_prof=="PERMANENT") 
 {
   $statut_prof= "P";
 }
 else
 {
 $statut_prof= "erreur";
 }
 
$fichier.=$nom_prof.";".$prenom_prof.";".$harpege_prof.";".$statut_prof.";".$code_etape.";".$identifiant_composante.";".$code_composante.";".$code_apogee_a_afficher.";".$niveau.";".$cycle.";".$ancienne_periode.";".$public_a_afficher.";".$ligne.";".$type_a_afficher.";".$total_heure_eqtd.",".$total_min_eqtd.";".$nb_semaine."\n";		
	

	$public_a_afficher="FI";
	}
	$total_heure_eqtd=$heureduree;
	$total_min_eqtd=$minduree;
	}




//si sup�rieur � 12h et le reste de la division de la dur�e hebdo par le nombre de semaine est �gale � zero et que le nombre de semaine est inf�rieur � 12
elseif ($total_heure_eqtd_en_min>720 and ( (($total_heure_eqtd_en_min%720)%intval($total_heure_eqtd_en_min/720)==0 and $total_heure_eqtd_en_min/720<=12) or (($total_heure_eqtd_en_min%660)%intval($total_heure_eqtd_en_min/660)==0 and $total_heure_eqtd_en_min/660<=12) or (($total_heure_eqtd_en_min%600)%intval($total_heure_eqtd_en_min/600)==0 and $total_heure_eqtd_en_min/600<=12) or (($total_heure_eqtd_en_min%540)%intval($total_heure_eqtd_en_min/540)==0 and $total_heure_eqtd_en_min/540<=12) or (($total_heure_eqtd_en_min%480)%intval($total_heure_eqtd_en_min/480)==0 and $total_heure_eqtd_en_min/480<=12) or (($total_heure_eqtd_en_min%420)%intval($total_heure_eqtd_en_min/420)==0 and $total_heure_eqtd_en_min/420<=12) or (($total_heure_eqtd_en_min%360)%intval($total_heure_eqtd_en_min/360)==0 and $total_heure_eqtd_en_min/360<=12) or (($total_heure_eqtd_en_min%300)%intval($total_heure_eqtd_en_min/300)==0 and $total_heure_eqtd_en_min/300<=12) or (($total_heure_eqtd_en_min%240)%intval($total_heure_eqtd_en_min/240)==0 and $total_heure_eqtd_en_min/240<=12) or (($total_heure_eqtd_en_min%180)%intval($total_heure_eqtd_en_min/180)==0 and $total_heure_eqtd_en_min/180<=12) or (($total_heure_eqtd_en_min%120)%intval($total_heure_eqtd_en_min/120)==0 and $total_heure_eqtd_en_min/120<=12) ))
	{

	//nb de semaines
	if (($total_heure_eqtd_en_min%720)%intval($total_heure_eqtd_en_min/720)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/720)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/720);
		}
	elseif (($total_heure_eqtd_en_min%660)%intval($total_heure_eqtd_en_min/660)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/660)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/660);
		}
	elseif (($total_heure_eqtd_en_min%600)%intval($total_heure_eqtd_en_min/600)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/600)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/600);
		}
	elseif (($total_heure_eqtd_en_min%540)%intval($total_heure_eqtd_en_min/540)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/540)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/540);
		}
	elseif (($total_heure_eqtd_en_min%480)%intval($total_heure_eqtd_en_min/480)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/480)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/480);
		}
	elseif (($total_heure_eqtd_en_min%420)%intval($total_heure_eqtd_en_min/420)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/420)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/420);
		}
	elseif (($total_heure_eqtd_en_min%360)%intval($total_heure_eqtd_en_min/360)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/360)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/360);
		}
	elseif (($total_heure_eqtd_en_min%300)%intval($total_heure_eqtd_en_min/300)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/300)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/300);
		}
	elseif (($total_heure_eqtd_en_min%240)%intval($total_heure_eqtd_en_min/240)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/240)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/240);
		}
	elseif (($total_heure_eqtd_en_min%180)%intval($total_heure_eqtd_en_min/180)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/180)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/180);
		}
	elseif (($total_heure_eqtd_en_min%120)%intval($total_heure_eqtd_en_min/120)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/120)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/120);
		}
	$total_heure_eqtd_en_min=$total_heure_eqtd_en_min/$nb_semaine;
	$total_heure_eqtd=intval($total_heure_eqtd_en_min/60);
	$total_min_eqtd=$total_heure_eqtd_en_min%60;
	if (strlen($total_heure_eqtd)==1)
		{
		$total_heure_eqtd="0".$total_heure_eqtd;
		}
	if (strlen($total_min_eqtd)==1)
		{
		$total_min_eqtd="0".$total_min_eqtd;
		}
	if (strlen($total_min_eqtd)==0)
		{
		$total_min_eqtd="00";
		}
	for ($i=0; $i<$n; $i++)
{	
if ($niveau==1 || $niveau==2 || $niveau ==3) 
 {
 $cycle="L";
 }
 else
 {
 $cycle="M";
 } 
 
  //ligne budg�taire
 if ($identifiant_composante=="SIT" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_sitec_FI;
 }
 elseif ($identifiant_composante=="SIT" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
$ligne=$ligne_sitec_titulaire_FA_FC;
 } 
 elseif ($identifiant_composante=="TI1" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_iut_FI;
 } 
 elseif ($identifiant_composante=="TI1" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
 $ligne=$ligne_iut_titulaire_FA_FC;
 }
 elseif (($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="VACATAIRE")
 {
$ligne=$ligne_budgetaire_FA_FC_vac;
 } 
 else
 {
$ligne="Erreur";
 }
 
  //code composante
if($identifiant_composante=="SIT")
{
$code_composante="909";
}
 else 
 {
$code_composante="960";
 } 
 
   //statut prof
 if ($categorie_prof=="VACATAIRE")
 {
 $statut_prof= "V";
 }
 elseif ($categorie_prof=="PERMANENT") 
 {
   $statut_prof= "P";
 }
 else
 {
 $statut_prof= "erreur";
 }
 
 
$fichier.=$nom_prof.";".$prenom_prof.";".$harpege_prof.";".$statut_prof.";".$code_etape.";".$identifiant_composante.";".$code_composante.";".$code_apogee_a_afficher.";".$niveau.";".$cycle.";".$ancienne_periode.";".$public_a_afficher.";".$ligne.";".$type_a_afficher.";".$total_heure_eqtd.",".$total_min_eqtd.";".$nb_semaine."\n";		
	

	$public_a_afficher="FI";
	}
	$total_heure_eqtd=$heureduree;
	$total_min_eqtd=$minduree;
	}

	
	

else
	{
	$nb_de_semaine=intval($total_heure_eqtd_en_min/720);
	$minute_restante=$total_heure_eqtd_en_min%720;
	if ($nb_de_semaine>12)
		{
		$nb_de_semaine=12;
		$minute_restante=$total_heure_eqtd_en_min-(12*12*60);
		}

	//mise en forme de la dur�e pour la ligne 1
	$total_heure_ligne_1=($nb_de_semaine*720)/(60*$nb_de_semaine);
	$total_min_ligne_1=0;
	if (strlen($total_heure_ligne_1)==1)
		{
		$total_heure_ligne_1="0".$total_heure_ligne_1;
		}
	if (strlen($total_min_ligne_1)==1)
		{
		$total_min_ligne_1="0".$total_min_ligne_1;
		}
	if (strlen($total_min_ligne_1)==0)
		{
		$total_min_ligne_1="00";
		}

	//mise en forme de la dur�e pour la ligne 2
	if (($minute_restante%720)%intval($minute_restante/720)==0 and $minute_restante/intval($minute_restante/720)<=720 and $minute_restante/720<=12 and intval($minute_restante/720)>0)
		{
		$nb_semaine_l2=intval($minute_restante/720);
		}
	elseif (($minute_restante%660)%intval($minute_restante/660)==0 and $minute_restante/intval($minute_restante/660)<=720 and $minute_restante/660<=12 and intval($minute_restante/660)>0)
		{
		$nb_semaine_l2=intval($minute_restante/660);
		}
	elseif (($minute_restante%600)%intval($minute_restante/600)==0 and $minute_restante/intval($minute_restante/600)<=720 and $minute_restante/600<=12 and intval($minute_restante/600)>0)
		{
		$nb_semaine_l2=intval($minute_restante/600);
		}
	elseif (($minute_restante%540)%intval($minute_restante/540)==0 and $minute_restante/intval($minute_restante/540)<=720 and $minute_restante/540<=12 and intval($minute_restante/540)>0)
		{
		$nb_semaine_l2=intval($minute_restante/540);
		}
	elseif (($minute_restante%480)%intval($minute_restante/480)==0 and $minute_restante/intval($minute_restante/480)<=720 and $minute_restante/480<=12 and intval($minute_restante/480)>0)
		{
		$nb_semaine_l2=intval($minute_restante/480);
		}
	elseif (($minute_restante%420)%intval($minute_restante/420)==0 and $minute_restante/intval($minute_restante/420)<=720 and $minute_restante/420<=12 and intval($minute_restante/420)>0)
		{
		$nb_semaine_l2=intval($minute_restante/420);
		}
	elseif (($minute_restante%360)%intval($minute_restante/360)==0 and $minute_restante/intval($minute_restante/360)<=720 and $minute_restante/360<=12 and intval($minute_restante/360)>0)
		{
		$nb_semaine_l2=intval($minute_restante/360);
		}
	elseif (($minute_restante%300)%intval($minute_restante/300)==0 and $minute_restante/intval($minute_restante/300)<=720 and $minute_restante/300<=12 and intval($minute_restante/300)>0)
		{
		$nb_semaine_l2=intval($minute_restante/300);
		}
	elseif (($minute_restante%240)%intval($minute_restante/240)==0 and $minute_restante/intval($minute_restante/240)<=720 and $minute_restante/240<=12 and intval($minute_restante/240)>0)
		{
		$nb_semaine_l2=intval($minute_restante/240);
		}
	elseif (($minute_restante%180)%intval($minute_restante/180)==0 and $minute_restante/intval($minute_restante/180)<=720 and $minute_restante/180<=12 and intval($minute_restante/180)>0)
		{
		$nb_semaine_l2=intval($minute_restante/180);
		}
	elseif (($minute_restante%120)%intval($minute_restante/120)==0 and $minute_restante/intval($minute_restante/120)<=720 and $minute_restante/120<=12 and intval($minute_restante/120)>0)
		{
		$nb_semaine_l2=intval($minute_restante/120);
		}
	else
		{
		$nb_semaine_l2=1;
		}


	$total_heure_eqtd_en_min=$minute_restante/$nb_semaine_l2;
	$total_heure_ligne_2=intval($total_heure_eqtd_en_min/60);
	$total_min_ligne_2=$total_heure_eqtd_en_min%60;

	if (strlen($total_heure_ligne_2)==1)
		{
		$total_heure_ligne_2="0".$total_heure_ligne_2;
		}
	if (strlen($total_min_ligne_2)==1)
		{
		$total_min_ligne_2="0".$total_min_ligne_2;
		}
	if (strlen($total_min_ligne_2)==0)
		{
		$total_min_ligne_2="00";
		}
	for ($i=0; $i<$n; $i++)
{
if ($niveau==1 || $niveau==2 || $niveau ==3) 
 {
 $cycle="L";
 }
 else
 {
 $cycle="M";
 } 
 
  //ligne budg�taire
 if ($identifiant_composante=="SIT" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_sitec_FI;
 }
 elseif ($identifiant_composante=="SIT" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
$ligne=$ligne_sitec_titulaire_FA_FC;
 } 
 elseif ($identifiant_composante=="TI1" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_iut_FI;
 } 
 elseif ($identifiant_composante=="TI1" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
 $ligne=$ligne_iut_titulaire_FA_FC;
 }
 elseif (($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="VACATAIRE")
 {
$ligne=$ligne_budgetaire_FA_FC_vac;
 } 
 else
 {
$ligne="Erreur";
 }
 
  //code composante
if($identifiant_composante=="SIT")
{
$code_composante="909";
}
 else 
 {
$code_composante="960";
 } 
    //statut prof
 if ($categorie_prof=="VACATAIRE")
 {
 $statut_prof= "V";
 }
 elseif ($categorie_prof=="PERMANENT") 
 {
   $statut_prof= "P";
 }
 else
 {
 $statut_prof= "erreur";
 }
 
 
$fichier.=$nom_prof.";".$prenom_prof.";".$harpege_prof.";".$statut_prof.";".$code_etape.";".$identifiant_composante.";".$code_composante.";".$code_apogee_a_afficher.";".$niveau.";".$cycle.";".$ancienne_periode.";".$public_a_afficher.";".$ligne.";".$type_a_afficher.";".$total_heure_ligne_1.",".$total_min_ligne_1.";".$nb_de_semaine."\n";		
$fichier.=$nom_prof.";".$prenom_prof.";".$harpege_prof.";".$statut_prof.";".$code_etape.";".$identifiant_composante.";".$code_composante.";".$code_apogee_a_afficher.";".$niveau.";".$cycle.";".$ancienne_periode.";".$public_a_afficher.";".$ligne.";".$type_a_afficher.";".$total_heure_ligne_2.",".$total_min_ligne_2.";".$nb_semaine_l2."\n";		


	$public_a_afficher="FI";
}
	$total_heure_eqtd=$heureduree;
	$total_min_eqtd=$minduree;
	}

}

else
	{
	$total_heure_eqtd+=$heureduree;
	$total_min_eqtd+=$minduree;
	}	
	
$code_etape=$nouveau_code_etape;
$code_apogee=$nouveau_code_apogee;	
$premiere_seance='0';
$nom_prof=$prof['nom'];
$prenom_prof=$prof['prenom'];
$harpege_prof=$prof['identifiant'];
$ancien_public=$public;
$ancien_type=$type;
$ancienne_periode=$periode;
$ancien_nomenseignement=$nomenseignement;
$ancien_code_groupe=$seance_prof['codeGroupe'];
}
	

//affichage de la derni�re ligne pour le dernier prof du tableau
if ($premiere_seance=='0' && (  ($compteur_seance==$nombre_seance_a_traiter && $code_du_dernier_prof==$prof['codeProf'])))
{






//changement des couleurs
if ($changement_a_la_ligne_suivante==1)
	{
	$changement_a_la_ligne_suivante=0;
	if ($variable_couleur==1)
		{
		$variable_couleur=0;
		}
	else
		{
		$variable_couleur=1;
		}
	}
if ($prenom_prof!=$prof['prenom'] || $nom_prof!=$prof['nom'] ) //test si on a change de prof pour la gestion des couleurs
	{
	$changement_a_la_ligne_suivante=1;
	}	

if ($variable_couleur==1)
	{
	if ($bgcolor=="#FFDCAA")
		{
		$bgcolor="#D2FFD2";
		}
	else
		{
		$bgcolor="#FFDCAA";
		}
	}
else
	{
	if ($bgcolor=="white")
		{
		$bgcolor="#FAFA50";
		}
	else
		{
		$bgcolor="white";
		}	
	}





//correction du code apog�e pour master. Si cours avec m�ca et elec et ener, il faut 3 codes apog�e diff�rents et pas toujours le m�me. La troisieme lettre du code apog�e correspond � la filiere.

//si grp des m�ca (M1 ou M2)
 if ($code_etape=="Z4MSCI91" || $code_etape=="Z5MSCI91" )
	 {
	 $lettre_code_apogee=substr($code_apogee, 2, 1);
	 if ($lettre_code_apogee!="M")
		 {
		 $longueur_code_apogee=strlen($code_apogee);
		 $code_apogee_a_afficher=substr($code_apogee, 0, 2)."M".substr($code_apogee, 3, $longueur_code_apogee-3);
		 }
	 else
		 {
		 $code_apogee_a_afficher=$code_apogee;
		 }
	 }
 //si grp des �lec (M1 ou M2)
 elseif ($code_etape=="Z4EESC91" || $code_etape=="Z5EESC91")
	 {
	$lettre_code_apogee=substr($code_apogee, 2, 1);
	if ($lettre_code_apogee!="S")
		 {
		 $longueur_code_apogee=strlen($code_apogee);
		 $code_apogee_a_afficher=substr($code_apogee, 0, 2)."S".substr($code_apogee, 3, $longueur_code_apogee-3);
		 }
	else
		 {
		 $code_apogee_a_afficher=$code_apogee;
		 }
	 }
//si grp des ener (M1 ou M2)
elseif ($code_etape=="Z4ENMA91" || $code_etape=="Z5ENMA91")
	{
	$lettre_code_apogee=substr($code_apogee, 2, 1);
	if (($lettre_code_apogee!="E" && $lettre_code_apogee!="C") && $code_apogee!='ZMMCO101' && $code_apogee!='ZMMMC101' && $code_apogee!='ZMMMS301') //pour le cours de composite de Manu qui est commun au M1 m�ca et au M2 �ner, les 2 codes apogee ont plus de diff�rences que seulement 1 lettre (ZMMMC101 et ZMEMA301)
		{
		$longueur_code_apogee=strlen($code_apogee);
		$code_apogee_a_afficher=substr($code_apogee, 0, 2)."E".substr($code_apogee, 3, $longueur_code_apogee-3);
		}
	else
		{
		$code_apogee_a_afficher=$code_apogee;
		}
		
	 //exception pour le cours de composite de Manu qui est commun au M1 m�ca et au M2 �ner, les 2 codes apogee  ont plus de diff�rences que seulement 1 lettre (ZMMMC101 et ZMEMA301)
		 if ($code_apogee_a_afficher=="ZMMMC101")
		{
		$code_apogee_a_afficher="ZMEMA301";
		}
 
	}
 

//correction pour la licence L3. Les codes apog�e sont au format suivant : "MECA:ZMLRD501 ELEC:ZMLRD501"

elseif ($code_etape=="Z3ELEC91" )
	{
	if(stristr($code_apogee, 'elec:') === FALSE) 
		{
		$code_apogee_a_afficher=$code_apogee;
		}
	else
		{
		$code_apogee_a_afficher=substr(stristr($code_apogee, 'elec:'),5,8);
		}
	}
elseif ($code_etape=="Z3ENRG91" )
	{
	if(stristr($code_apogee, 'ener:') === FALSE) 
		{
		$code_apogee_a_afficher=$code_apogee;
		}
	else
		{
		$code_apogee_a_afficher=substr(stristr($code_apogee, 'ener:'),5,8);
		}
	}
elseif ($code_etape=="Z3MECA91" )
	{
	if(stristr($code_apogee, 'meca:') === FALSE) 
		{
		$code_apogee_a_afficher=$code_apogee;
		}
	else
		{
		$code_apogee_a_afficher=substr(stristr($code_apogee, 'meca:'),5,8);
		}
	}
else
	{
	$code_apogee_a_afficher=$code_apogee;
	}





//si le public est de type "autre", on paye 50% FI et 50%FA pour les TP donc on fait 2 lignes. 
if ($ancien_public=="AUTRE"  && $ancien_type=="TP")
{
$n=2;
//la premi�re ligne sera de l'apprentissage
$public_a_afficher="FA";
}
elseif ($ancien_public=="AUTRE" && $ancien_type!="TP")
{
$n=1;
//la premi�re ligne sera de l'apprentissage
$public_a_afficher="FI";
}
else
{
$n=1;
$public_a_afficher=$ancien_public;

}



//mise en forme de la dur�e
$total_heure_eqtd_en_min=($total_heure_eqtd*60+$total_min_eqtd)/$n;



//pour les vacataire, on regarde si on doit transformer les TP en TD
if ($categorie_prof=="VACATAIRE") 
{
if ($ancien_type=="TP")
	{
	if ($vacataire=="oui")
		{
		$type_a_afficher="TD";
		}
	else
		{
		$type_a_afficher=$ancien_type;
		}
	}
	else
	{
	$type_a_afficher=$ancien_type;
	}
}
else
{
$type_a_afficher=$ancien_type;
}


//recherche de la ligne budgetaire pour payer les vacataires en FA et FC	
$req_ligne_budgetaire->execute(array(':codeGroupe'=>$ancien_code_groupe));
$lignes_budgetaires=$req_ligne_budgetaire->fetchAll();
$compteur_ligne_budgetaire=0;
foreach($lignes_budgetaires as $ligne_budgetaire)
	{	
	
	$compteur_ligne_budgetaire+=1;
	}		
	if ($compteur_ligne_budgetaire!="0")
	{
	$ligne_budgetaire_FA_FC_vac=$ligne_budgetaire['identifiant'];
	}
	else
	{
	$ligne_budgetaire_FA_FC_vac="Erreur";
	}




//verifie sur dur�e est inf�rieure � 12h soit 720 min Si oui on affiche une ligne . 
if ($total_heure_eqtd_en_min<=720)
	{

	
	$total_heure_eqtd=intval($total_heure_eqtd_en_min/60);
	$total_min_eqtd=$total_heure_eqtd_en_min%60;
	if (strlen($total_heure_eqtd)==1)
		{
		$total_heure_eqtd="0".$total_heure_eqtd;
		}

	if (strlen($total_min_eqtd)==1)
		{
		$total_min_eqtd="0".$total_min_eqtd;
		}
	if (strlen($total_min_eqtd)==0)
		{
		$total_min_eqtd="00";
		}	
for ($i=0; $i<$n; $i++)
{	
if ($niveau==1 || $niveau==2 || $niveau ==3) 
 {
 $cycle="L";
 }
 else
 {
 $cycle="M";
 } 
 
 //ligne budg�taire
 if ($identifiant_composante=="SIT" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_sitec_FI;
 }
 elseif ($identifiant_composante=="SIT" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
$ligne=$ligne_sitec_titulaire_FA_FC;
 } 
 elseif ($identifiant_composante=="TI1" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_iut_FI;
 } 
 elseif ($identifiant_composante=="TI1" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
 $ligne=$ligne_iut_titulaire_FA_FC;
 }
 elseif (($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="VACATAIRE")
 {
$ligne=$ligne_budgetaire_FA_FC_vac;
 } 
 else
 {
$ligne="Erreur";
 }
 
 //code composante
if($identifiant_composante=="SIT")
{
$code_composante="909";
}
 else 
 {
$code_composante="960";
 } 
 
 //statut prof
 if ($categorie_prof=="VACATAIRE")
 {
 $statut_prof= "V";
 }
 elseif ($categorie_prof=="PERMANENT") 
 {
   $statut_prof= "P";
 }
 else
 {
 $statut_prof= "erreur";
 }
 
$fichier.=$nom_prof.";".$prenom_prof.";".$harpege_prof.";".$statut_prof.";".$code_etape.";".$identifiant_composante.";".$code_composante.";".$code_apogee_a_afficher.";".$niveau.";".$cycle.";".$ancienne_periode.";".$public_a_afficher.";".$ligne.";".$type_a_afficher.";".$total_heure_eqtd.",".$total_min_eqtd.";"."1"."\n";		





	$public_a_afficher="FI";
	}
	$total_heure_eqtd=$heureduree;
	$total_min_eqtd=$minduree;
	}


//si sup�rieur � 12h et le resultat de la division par 12, 10, 11, 10... est �gale � 00min afin de favoriser l'affichage des heures avec des chiffres ronds
elseif ($total_heure_eqtd_en_min>720 and (($total_heure_eqtd_en_min%720==0 and $total_heure_eqtd_en_min/720<=12) or ($total_heure_eqtd_en_min%660==0 and $total_heure_eqtd_en_min/660<=12) or ($total_heure_eqtd_en_min%600==0 and $total_heure_eqtd_en_min/600<=12) or ($total_heure_eqtd_en_min%540==0 and $total_heure_eqtd_en_min/540<=12) or ($total_heure_eqtd_en_min%480==0 and $total_heure_eqtd_en_min/480<=12) or ($total_heure_eqtd_en_min%420==0 and $total_heure_eqtd_en_min/420<=12) ))
	{

	//nb de semaines
	if ($total_heure_eqtd_en_min%720==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min/720;
		}	
	elseif ($total_heure_eqtd_en_min%660==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min/660;
		}
	elseif ($total_heure_eqtd_en_min%600==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min/600;
		}
	elseif ($total_heure_eqtd_en_min%540==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min/540;
		}
	elseif ($total_heure_eqtd_en_min%480==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min/480;
		}
	elseif ($total_heure_eqtd_en_min%420==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min/420;
		}
	$total_heure_eqtd_en_min=$total_heure_eqtd_en_min/$nb_semaine;
	$total_heure_eqtd=intval($total_heure_eqtd_en_min/60);
	$total_min_eqtd=$total_heure_eqtd_en_min%60;
	if (strlen($total_heure_eqtd)==1)
		{
		$total_heure_eqtd="0".$total_heure_eqtd;
		}
	if (strlen($total_min_eqtd)==1)
		{
		$total_min_eqtd="0".$total_min_eqtd;
		}
	if (strlen($total_min_eqtd)==0)
		{
		$total_min_eqtd="00";
		}	
	for ($i=0; $i<$n; $i++)
{	
if ($niveau==1 || $niveau==2 || $niveau ==3) 
 {
 $cycle="L";
 }
 else
 {
 $cycle="M";
 } 
  //ligne budg�taire
 if ($identifiant_composante=="SIT" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_sitec_FI;
 }
 elseif ($identifiant_composante=="SIT" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
$ligne=$ligne_sitec_titulaire_FA_FC;
 } 
 elseif ($identifiant_composante=="TI1" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_iut_FI;
 } 
 elseif ($identifiant_composante=="TI1" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
 $ligne=$ligne_iut_titulaire_FA_FC;
 }
 elseif (($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="VACATAIRE")
 {
$ligne=$ligne_budgetaire_FA_FC_vac;
 } 
 else
 {
$ligne="Erreur";
 }
 
  //code composante
if($identifiant_composante=="SIT")
{
$code_composante="909";
}
 else 
 {
$code_composante="960";
 } 
 
  //statut prof
 if ($categorie_prof=="VACATAIRE")
 {
 $statut_prof= "V";
 }
 elseif ($categorie_prof=="PERMANENT") 
 {
   $statut_prof= "P";
 }
 else
 {
 $statut_prof= "erreur";
 }
 
$fichier.=$nom_prof.";".$prenom_prof.";".$harpege_prof.";".$statut_prof.";".$code_etape.";".$identifiant_composante.";".$code_composante.";".$code_apogee_a_afficher.";".$niveau.";".$cycle.";".$ancienne_periode.";".$public_a_afficher.";".$ligne.";".$type_a_afficher.";".$total_heure_eqtd.",".$total_min_eqtd.";".$nb_semaine."\n";		
	

	$public_a_afficher="FI";
	}
	$total_heure_eqtd=$heureduree;
	$total_min_eqtd=$minduree;
	}




//si sup�rieur � 12h et le reste de la division de la dur�e hebdo par le nombre de semaine est �gale � zero et que le nombre de semaine est inf�rieur � 12
elseif ($total_heure_eqtd_en_min>720 and ( (($total_heure_eqtd_en_min%720)%intval($total_heure_eqtd_en_min/720)==0 and $total_heure_eqtd_en_min/720<=12) or (($total_heure_eqtd_en_min%660)%intval($total_heure_eqtd_en_min/660)==0 and $total_heure_eqtd_en_min/660<=12) or (($total_heure_eqtd_en_min%600)%intval($total_heure_eqtd_en_min/600)==0 and $total_heure_eqtd_en_min/600<=12) or (($total_heure_eqtd_en_min%540)%intval($total_heure_eqtd_en_min/540)==0 and $total_heure_eqtd_en_min/540<=12) or (($total_heure_eqtd_en_min%480)%intval($total_heure_eqtd_en_min/480)==0 and $total_heure_eqtd_en_min/480<=12) or (($total_heure_eqtd_en_min%420)%intval($total_heure_eqtd_en_min/420)==0 and $total_heure_eqtd_en_min/420<=12) or (($total_heure_eqtd_en_min%360)%intval($total_heure_eqtd_en_min/360)==0 and $total_heure_eqtd_en_min/360<=12) or (($total_heure_eqtd_en_min%300)%intval($total_heure_eqtd_en_min/300)==0 and $total_heure_eqtd_en_min/300<=12) or (($total_heure_eqtd_en_min%240)%intval($total_heure_eqtd_en_min/240)==0 and $total_heure_eqtd_en_min/240<=12) or (($total_heure_eqtd_en_min%180)%intval($total_heure_eqtd_en_min/180)==0 and $total_heure_eqtd_en_min/180<=12) or (($total_heure_eqtd_en_min%120)%intval($total_heure_eqtd_en_min/120)==0 and $total_heure_eqtd_en_min/120<=12) ))
	{

	//nb de semaines
	if (($total_heure_eqtd_en_min%720)%intval($total_heure_eqtd_en_min/720)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/720)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/720);
		}
	elseif (($total_heure_eqtd_en_min%660)%intval($total_heure_eqtd_en_min/660)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/660)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/660);
		}
	elseif (($total_heure_eqtd_en_min%600)%intval($total_heure_eqtd_en_min/600)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/600)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/600);
		}
	elseif (($total_heure_eqtd_en_min%540)%intval($total_heure_eqtd_en_min/540)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/540)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/540);
		}
	elseif (($total_heure_eqtd_en_min%480)%intval($total_heure_eqtd_en_min/480)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/480)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/480);
		}
	elseif (($total_heure_eqtd_en_min%420)%intval($total_heure_eqtd_en_min/420)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/420)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/420);
		}
	elseif (($total_heure_eqtd_en_min%360)%intval($total_heure_eqtd_en_min/360)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/360)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/360);
		}
	elseif (($total_heure_eqtd_en_min%300)%intval($total_heure_eqtd_en_min/300)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/300)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/300);
		}
	elseif (($total_heure_eqtd_en_min%240)%intval($total_heure_eqtd_en_min/240)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/240)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/240);
		}
	elseif (($total_heure_eqtd_en_min%180)%intval($total_heure_eqtd_en_min/180)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/180)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/180);
		}
	elseif (($total_heure_eqtd_en_min%120)%intval($total_heure_eqtd_en_min/120)==0 and $total_heure_eqtd_en_min/intval($total_heure_eqtd_en_min/120)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min/120);
		}
	$total_heure_eqtd_en_min=$total_heure_eqtd_en_min/$nb_semaine;
	$total_heure_eqtd=intval($total_heure_eqtd_en_min/60);
	$total_min_eqtd=$total_heure_eqtd_en_min%60;
	if (strlen($total_heure_eqtd)==1)
		{
		$total_heure_eqtd="0".$total_heure_eqtd;
		}
	if (strlen($total_min_eqtd)==1)
		{
		$total_min_eqtd="0".$total_min_eqtd;
		}
	if (strlen($total_min_eqtd)==0)
		{
		$total_min_eqtd="00";
		}
	for ($i=0; $i<$n; $i++)
{	
if ($niveau==1 || $niveau==2 || $niveau ==3) 
 {
 $cycle="L";
 }
 else
 {
 $cycle="M";
 } 
 
  //ligne budg�taire
 if ($identifiant_composante=="SIT" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_sitec_FI;
 }
 elseif ($identifiant_composante=="SIT" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
$ligne=$ligne_sitec_titulaire_FA_FC;
 } 
 elseif ($identifiant_composante=="TI1" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_iut_FI;
 } 
 elseif ($identifiant_composante=="TI1" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
 $ligne=$ligne_iut_titulaire_FA_FC;
 }
 elseif (($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="VACATAIRE")
 {
$ligne=$ligne_budgetaire_FA_FC_vac;
 } 
 else
 {
$ligne="Erreur";
 }
 
  //code composante
if($identifiant_composante=="SIT")
{
$code_composante="909";
}
 else 
 {
$code_composante="960";
 } 
 
   //statut prof
 if ($categorie_prof=="VACATAIRE")
 {
 $statut_prof= "V";
 }
 elseif ($categorie_prof=="PERMANENT") 
 {
   $statut_prof= "P";
 }
 else
 {
 $statut_prof= "erreur";
 }
 
 
$fichier.=$nom_prof.";".$prenom_prof.";".$harpege_prof.";".$statut_prof.";".$code_etape.";".$identifiant_composante.";".$code_composante.";".$code_apogee_a_afficher.";".$niveau.";".$cycle.";".$ancienne_periode.";".$public_a_afficher.";".$ligne.";".$type_a_afficher.";".$total_heure_eqtd.",".$total_min_eqtd.";".$nb_semaine."\n";		
	

	$public_a_afficher="FI";
	}
	$total_heure_eqtd=$heureduree;
	$total_min_eqtd=$minduree;
	}

	
	

else
	{
	$nb_de_semaine=intval($total_heure_eqtd_en_min/720);
	$minute_restante=$total_heure_eqtd_en_min%720;
	if ($nb_de_semaine>12)
		{
		$nb_de_semaine=12;
		$minute_restante=$total_heure_eqtd_en_min-(12*12*60);
		}

	//mise en forme de la dur�e pour la ligne 1
	$total_heure_ligne_1=($nb_de_semaine*720)/(60*$nb_de_semaine);
	$total_min_ligne_1=0;
	if (strlen($total_heure_ligne_1)==1)
		{
		$total_heure_ligne_1="0".$total_heure_ligne_1;
		}
	if (strlen($total_min_ligne_1)==1)
		{
		$total_min_ligne_1="0".$total_min_ligne_1;
		}
	if (strlen($total_min_ligne_1)==0)
		{
		$total_min_ligne_1="00";
		}

	//mise en forme de la dur�e pour la ligne 2
	if (($minute_restante%720)%intval($minute_restante/720)==0 and $minute_restante/intval($minute_restante/720)<=720 and $minute_restante/720<=12 and intval($minute_restante/720)>0)
		{
		$nb_semaine_l2=intval($minute_restante/720);
		}
	elseif (($minute_restante%660)%intval($minute_restante/660)==0 and $minute_restante/intval($minute_restante/660)<=720 and $minute_restante/660<=12 and intval($minute_restante/660)>0)
		{
		$nb_semaine_l2=intval($minute_restante/660);
		}
	elseif (($minute_restante%600)%intval($minute_restante/600)==0 and $minute_restante/intval($minute_restante/600)<=720 and $minute_restante/600<=12 and intval($minute_restante/600)>0)
		{
		$nb_semaine_l2=intval($minute_restante/600);
		}
	elseif (($minute_restante%540)%intval($minute_restante/540)==0 and $minute_restante/intval($minute_restante/540)<=720 and $minute_restante/540<=12 and intval($minute_restante/540)>0)
		{
		$nb_semaine_l2=intval($minute_restante/540);
		}
	elseif (($minute_restante%480)%intval($minute_restante/480)==0 and $minute_restante/intval($minute_restante/480)<=720 and $minute_restante/480<=12 and intval($minute_restante/480)>0)
		{
		$nb_semaine_l2=intval($minute_restante/480);
		}
	elseif (($minute_restante%420)%intval($minute_restante/420)==0 and $minute_restante/intval($minute_restante/420)<=720 and $minute_restante/420<=12 and intval($minute_restante/420)>0)
		{
		$nb_semaine_l2=intval($minute_restante/420);
		}
	elseif (($minute_restante%360)%intval($minute_restante/360)==0 and $minute_restante/intval($minute_restante/360)<=720 and $minute_restante/360<=12 and intval($minute_restante/360)>0)
		{
		$nb_semaine_l2=intval($minute_restante/360);
		}
	elseif (($minute_restante%300)%intval($minute_restante/300)==0 and $minute_restante/intval($minute_restante/300)<=720 and $minute_restante/300<=12 and intval($minute_restante/300)>0)
		{
		$nb_semaine_l2=intval($minute_restante/300);
		}
	elseif (($minute_restante%240)%intval($minute_restante/240)==0 and $minute_restante/intval($minute_restante/240)<=720 and $minute_restante/240<=12 and intval($minute_restante/240)>0)
		{
		$nb_semaine_l2=intval($minute_restante/240);
		}
	elseif (($minute_restante%180)%intval($minute_restante/180)==0 and $minute_restante/intval($minute_restante/180)<=720 and $minute_restante/180<=12 and intval($minute_restante/180)>0)
		{
		$nb_semaine_l2=intval($minute_restante/180);
		}
	elseif (($minute_restante%120)%intval($minute_restante/120)==0 and $minute_restante/intval($minute_restante/120)<=720 and $minute_restante/120<=12 and intval($minute_restante/120)>0)
		{
		$nb_semaine_l2=intval($minute_restante/120);
		}
	else
		{
		$nb_semaine_l2=1;
		}


	$total_heure_eqtd_en_min=$minute_restante/$nb_semaine_l2;
	$total_heure_ligne_2=intval($total_heure_eqtd_en_min/60);
	$total_min_ligne_2=$total_heure_eqtd_en_min%60;

	if (strlen($total_heure_ligne_2)==1)
		{
		$total_heure_ligne_2="0".$total_heure_ligne_2;
		}
	if (strlen($total_min_ligne_2)==1)
		{
		$total_min_ligne_2="0".$total_min_ligne_2;
		}
	if (strlen($total_min_ligne_2)==0)
		{
		$total_min_ligne_2="00";
		}
	for ($i=0; $i<$n; $i++)
{
if ($niveau==1 || $niveau==2 || $niveau ==3) 
 {
 $cycle="L";
 }
 else
 {
 $cycle="M";
 } 
 
  //ligne budg�taire
 if ($identifiant_composante=="SIT" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_sitec_FI;
 }
 elseif ($identifiant_composante=="SIT" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
$ligne=$ligne_sitec_titulaire_FA_FC;
 } 
 elseif ($identifiant_composante=="TI1" && $public_a_afficher=="FI" )
 {
$ligne=$ligne_iut_FI;
 } 
 elseif ($identifiant_composante=="TI1" && ($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="PERMANENT")
 {
 $ligne=$ligne_iut_titulaire_FA_FC;
 }
 elseif (($public_a_afficher=="FA" || $public_a_afficher=="FC")  && $categorie_prof=="VACATAIRE")
 {
$ligne=$ligne_budgetaire_FA_FC_vac;
 } 
 else
 {
$ligne="Erreur";
 }
 
  //code composante
if($identifiant_composante=="SIT")
{
$code_composante="909";
}
 else 
 {
$code_composante="960";
 } 
    //statut prof
 if ($categorie_prof=="VACATAIRE")
 {
 $statut_prof= "V";
 }
 elseif ($categorie_prof=="PERMANENT") 
 {
   $statut_prof= "P";
 }
 else
 {
 $statut_prof= "erreur";
 }
 
 
$fichier.=$nom_prof.";".$prenom_prof.";".$harpege_prof.";".$statut_prof.";".$code_etape.";".$identifiant_composante.";".$code_composante.";".$code_apogee_a_afficher.";".$niveau.";".$cycle.";".$ancienne_periode.";".$public_a_afficher.";".$ligne.";".$type_a_afficher.";".$total_heure_ligne_1.",".$total_min_ligne_1.";".$nb_de_semaine."\n";		
$fichier.=$nom_prof.";".$prenom_prof.";".$harpege_prof.";".$statut_prof.";".$code_etape.";".$identifiant_composante.";".$code_composante.";".$code_apogee_a_afficher.";".$niveau.";".$cycle.";".$ancienne_periode.";".$public_a_afficher.";".$ligne.";".$type_a_afficher.";".$total_heure_ligne_2.",".$total_min_ligne_2.";".$nb_semaine_l2."\n";		


	$public_a_afficher="FI";
}
	$total_heure_eqtd=$heureduree;
	$total_min_eqtd=$minduree;
	}

}





	
	

//forfait sans s�ance plac�es
		if ($export_forfait=="oui")
	{
//liste des groupes 

$ressource_formation2="(";
$req_groupes->execute(array(':departement'=>$formation));
$res_groupes=$req_groupes->fetchAll();
foreach($res_groupes as $code)
	{	
	$ressource_formation2.="enseignements_groupes.codeRessource='".$code['codeGroupe']."' or ";

	
	}	

$ressource_formation2.="0)";

$codeRessource=$prof['codeProf'];	
$req_enseignement_forfait->execute(array(':codeRessource'=>$codeRessource));
$res_enseignement_forfait=$req_enseignement_forfait->fetchAll();
foreach($res_enseignement_forfait as $enseignements_au_forfait)
{

$codeenseignement=$enseignements_au_forfait['codeEnseignement'];
//on regarde si le l'enseignement forfaitaire est fait dans la formation souhait�e 
$test="";
$nom_forfait_groupe="";

$sql="SELECT * FROM enseignements_groupes where enseignements_groupes.deleted='0' and enseignements_groupes.codeEnseignement=:codeEnseignement and $ressource_formation2 "	;
$req_groupe_enseignement=$dbh->prepare($sql);	
$req_groupe_enseignement->execute(array(':codeEnseignement'=>$codeenseignement));
$res_groupe_enseignement=$req_groupe_enseignement->fetchAll();
foreach($res_groupe_enseignement as $groupes_enseignement_au_forfait)
	{	
	$test=$groupes_enseignement_au_forfait['codeEnseignement'];
	//recherche de la ligne budgetaire pour payer les vacataires en FA et FC	
	$req_ligne_budgetaire->execute(array(':codeGroupe'=>$groupes_enseignement_au_forfait['codeRessource']));
	$lignes_budgetaires=$req_ligne_budgetaire->fetchAll();
	$compteur_ligne_budgetaire=0;
	foreach($lignes_budgetaires as $ligne_budgetaire)
		{	
		
		$compteur_ligne_budgetaire+=1;
		}		
		if ($compteur_ligne_budgetaire!="0")
		{
		$ligne_budgetaire_FA_FC_vac=$ligne_budgetaire['identifiant'];
		}
		else
		{
		$ligne_budgetaire_FA_FC_vac="Erreur";
		}
	}

if ($test!="")
{

//comptage du nb de s�naces associ� � l'enseignement
$nb_seances=0;
$enseignement_codeenseignement=$enseignements_au_forfait['codeEnseignement'];
$req_seance_enseignement->execute(array(':codeEnseignement'=>$codeenseignement, ':codeProf'=>$codeRessource));
$res_seance_enseignement=$req_seance_enseignement->fetchAll();
foreach($res_seance_enseignement as $groupe)
	{	
	$nb_seances=$nb_seances+1;
	}	
if ($nb_seances==0)
{

// r�cup�ration du code de l'activit�
$CodeActivite=$enseignements_au_forfait['codeTypeActivite'];


// on �crit une ligne par groupe afin de r�partir les heures sur les diff�rents groupes. Par exemple, en L3, r�partition sur les trois parcours
$req_groupe_enseignement->execute(array(':codeEnseignement'=>$codeenseignement));
$res_groupe_enseignement=$req_groupe_enseignement->fetchAll();
$nombre_de_groupes=count($res_groupe_enseignement);
foreach($res_groupe_enseignement as $groupes_enseignement_au_forfait)
{
//recherche des infos sur l'enseignement et sur les groupes
	$codeGroupe=$groupes_enseignement_au_forfait['codeRessource'];
	//nom groupe, version d'�tape, filiere
	$req_groupe_forfait->execute(array(':codeGroupe'=>$codeGroupe));
	$res_groupe_forfait=$req_groupe_forfait->fetchAll();
	foreach($res_groupe_forfait as $groupe)
		{	
		$nom_forfait_groupe=$nom_forfait_groupe.$groupe['nom_groupe']." ";
		$identifiant_groupe=$groupe['identifiant_groupe'];
		$identifiant_composante=$groupe['identifiant_composante'];
		$niveau=$groupe['niveau'];
		}


if ($enseignements_au_forfait['volumeReparti']==1)
	{
	//comptage du nb de profs associ�s � l'enseignement forfaitaire
	$nb_profs_forfait=0;
	$req_enseignement_prof_forfait	->execute(array(':codeEnseignement'=>$codeenseignement));
	$res_enseignement_prof_forfait=$req_enseignement_prof_forfait	->fetchAll();
	foreach($res_enseignement_prof_forfait as $enseignement_prof_forfait)
		{		
		$nb_profs_forfait=$nb_profs_forfait+1;
		}	
	}

//changement des couleurs

if ($changement_a_la_ligne_suivante==1)
	{
	$changement_a_la_ligne_suivante=0;
	if ($variable_couleur==1)
		{
		$variable_couleur=0;
		}
	else
		{
		$variable_couleur=1;
		}
	}
if ($prenom_prof!=$prof['prenom'] || $nom_prof!=$prof['nom'] ) //test si on a change de prof pour la gestion des couleurs
	{
	$changement_a_la_ligne_suivante=1;
	}			

if ($variable_couleur==1)
	{
	if ($bgcolor=="#FFDCAA")
		{
		$bgcolor="#D2FFD2";
		}
	else
		{
		$bgcolor="#FFDCAA";
		}
	}
else
	{
	if ($bgcolor=="white")
		{
		$bgcolor="#FAFA50";
		}
	else
		{
		$bgcolor="white";
		}	
	}	

//Type de public		
$public=$enseignements_au_forfait['typePublic'];
if ($public=="0")
	{
	//si le public est de type "autre" (0), on paye 100% en FI et non pas 50%fi et 50%fa car les forfaits sans s�ances sont sous forme de TD et non de TP. 
	$public="FI";
	}
elseif ($public=="1")
	{
	$public="FI";
	}
elseif ($public=="2")
	{
	$public="FA";
	}
elseif ($public=="3")
	{
	$public="FC";
	}


//duree forfait
if (strlen($enseignements_au_forfait['dureeForfaitaire'])==5)
	{
	$heureduree=substr($enseignements_au_forfait['dureeForfaitaire'],0,3);
	$minduree=substr($enseignements_au_forfait['dureeForfaitaire'],3,2);
	}		
if (strlen($enseignements_au_forfait['dureeForfaitaire'])==4)
	{
	$heureduree=substr($enseignements_au_forfait['dureeForfaitaire'],0,2);
	$minduree=substr($enseignements_au_forfait['dureeForfaitaire'],2,2);
	}
if (strlen($enseignements_au_forfait['dureeForfaitaire'])==3)
	{
	$heureduree=substr($enseignements_au_forfait['dureeForfaitaire'],0,1);
	$minduree=substr($enseignements_au_forfait['dureeForfaitaire'],1,2);
	}
if (strlen($enseignements_au_forfait['dureeForfaitaire'])==2)
	{
	$heureduree=0;
	$minduree=$enseignements_au_forfait['dureeForfaitaire'];
	}
if (strlen($enseignements_au_forfait['dureeForfaitaire'])==1)
	{
	$heureduree=0;
	$minduree="0".$enseignements_au_forfait['dureeForfaitaire'];
	}					
if (strlen($heureduree)==1)
	{
	$heureduree="0".$heureduree;
	}	

/*

if ($enseignements_au_forfait['volumeReparti']==1)
	{
	$dureeenmin=$heureduree*60+$minduree;
	$dureeenmin=$dureeenmin/$nb_profs_forfait;
	$heureduree=intval($dureeenmin/60);
						
	if (strlen($heureduree)==1)
		{
		$heureduree="0".$heureduree;
		}
	$minduree=$dureeenmin%60;
	if (strlen($minduree)==1)
		{
		$minduree="0".$minduree;
		}
	if (strlen($minduree)==0)
		{
		$minduree="00";
		}
	}
*/
	
	
			
// Calcul de la dur�e CM, TD et TP correspondant au forfait � partir du tableau d'�quivalence			
			
if ($enseignements_au_forfait['volumeReparti']==1)
		{	  $dureeenminCM=($heureduree*60*$TauxTypeEns[$CodeActivite][0]+$minduree*$TauxTypeEns[$CodeActivite][0])/$nb_profs_forfait;
				$dureeenminTD=($heureduree*60*$TauxTypeEns[$CodeActivite][1]+$minduree*$TauxTypeEns[$CodeActivite][1])/$nb_profs_forfait;
        $dureeenminTP=($heureduree*60*$TauxTypeEns[$CodeActivite][2]+$minduree*$TauxTypeEns[$CodeActivite][2])/$nb_profs_forfait;
     }
else   
    {	  $dureeenminCM=$heureduree*60*$TauxTypeEns[$CodeActivite][0]+$minduree*$TauxTypeEns[$CodeActivite][0];
				$dureeenminTD=$heureduree*60*$TauxTypeEns[$CodeActivite][1]+$minduree*$TauxTypeEns[$CodeActivite][1];
        $dureeenminTP=$heureduree*60*$TauxTypeEns[$CodeActivite][2]+$minduree*$TauxTypeEns[$CodeActivite][2];
     }


// Calcul pour la portion CM du forfait
      $heuredureeCM=intval($dureeenminCM/60);
													
			if (strlen($heuredureeCM)==1)
				{
					$heuredureeCM="0".$heuredureeCM;
				}
			$mindureeCM=$dureeenminCM%60;
			if (strlen($mindureeCM)==1)
				{
					$mindureeCM="0".$mindureeCM;
				}
			if (strlen($mindureeCM)==0)
				{
					$mindureeCM="00";
				}	
// Calcul pour la portion TD du forfait
      $heuredureeTD=intval($dureeenminTD/60);
													
			if (strlen($heuredureeTD)==1)
				{
					$heuredureeTD="0".$heuredureeTD;
				}
			$mindureeTD=$dureeenminTD%60;
			if (strlen($mindureeTD)==1)
				{
					$mindureeTD="0".$mindureeTD;
				}
			if (strlen($mindureeTD)==0)
				{
					$mindureeTD="00";
				}	
        
 // Calcul pour la portion TP du forfait
      $heuredureeTP=intval($dureeenminTP/60);
													
			if (strlen($heuredureeTP)==1)
				{
					$heuredureeTP="0".$heuredureeTP;
				}
			$mindureeTP=$dureeenminTP%60;
			if (strlen($mindureeTP)==1)
				{
					$mindureeTP="0".$mindureeTP;
				}
			if (strlen($mindureeTP)==0)
				{
					$mindureeTP="00";}

	
	
	
	
		
	
	
//periodicit� (semestre 1 ou 2) correspond au trois�me chiffre avant la fin du code apog�e
$periode="Erreur";
$req_semestre->execute(array(':codeNiveau'=>$enseignements_au_forfait['codeNiveau']));
$res_semestres=$req_semestre->fetchAll();
foreach($res_semestres as $res_semestre)
	{	
	$periode=$res_semestre['identifiant'];
	}	


if ($periode==1 || $periode==3 || $periode==5 || $periode==7)
	{
	$periode=1;
	}
elseif ($periode==2 || $periode==4 || $periode==6 || $periode==8)
	{
	$periode=2;
	}
elseif ($periode==0 )
	{
	//pour les vacataires, la p�riodicit� annuelle n'existe pas donc on force � la valeur 1 (semestre 1)
	if ($categorie_prof=="VACATAIRE")
	{
	$periode=1;
	}
	else
	{
	$periode=0;
	}
	}
else
	{
	$periode="Erreur";
	}

	
	
	
	
	
	
	
	
	
//mise en forme matiere
$pos_dudebut = strpos($enseignements_au_forfait['nom'], "_")+1;	
$pos_defin = strripos($enseignements_au_forfait['nom'], "_");	
$longueur=$pos_defin-$pos_dudebut;
$nomenseignement=substr($enseignements_au_forfait['nom'],$pos_dudebut,$longueur);

//mise en forme de la dur�e
/*
$total_heure_eqtd_en_min_au_forfait=($heureduree*60+$minduree)/$nombre_de_groupes;
*/
$total_heure_eqtd_en_min_au_forfait=(($heuredureeCM*60+$mindureeCM)/$nombre_de_groupes)+(($heuredureeTD*60+$mindureeTD)/$nombre_de_groupes)+(($heuredureeTP*60+$mindureeTP)/$nombre_de_groupes);



//verifie sur dur�e est inf�rieure � 12h soit 720 min Si oui on affiche une ligne . 
if ($total_heure_eqtd_en_min_au_forfait<=720)
	{
	$total_heure_eqtd_au_forfait=intval($total_heure_eqtd_en_min_au_forfait/60);
	$total_min_eqtd_au_forfait=$total_heure_eqtd_en_min_au_forfait%60;
	if (strlen($total_heure_eqtd_au_forfait)==1)
		{
		$total_heure_eqtd_au_forfait="0".$total_heure_eqtd_au_forfait;
		}
	if (strlen($total_min_eqtd_au_forfait)==1)
		{
		$total_min_eqtd_au_forfait="0".$total_min_eqtd_au_forfait;
		}
	if (strlen($total_min_eqtd_au_forfait)==0)
		{
		$total_min_eqtd_au_forfait="00";
		}
if ($niveau==1 || $niveau==2 || $niveau ==3) 
 {
 $cycle="L";
 }
 else
 {
 $cycle="M";
 } 	

 //ligne budg�taire
 if ($identifiant_composante=="SIT" && $public=="FI" )
 {
$ligne=$ligne_sitec_FI;
 }
 elseif ($identifiant_composante=="SIT" && ($public=="FA" || $public=="FC")  && $categorie_prof=="PERMANENT")
 {
$ligne=$ligne_sitec_titulaire_FA_FC;
 } 
 elseif ($identifiant_composante=="TI1" && $public=="FI" )
 {
$ligne=$ligne_iut_FI;
 } 
 elseif ($identifiant_composante=="TI1" && ($public=="FA" || $public=="FC")  && $categorie_prof=="PERMANENT")
 {
 $ligne=$ligne_iut_titulaire_FA_FC;
 }
 elseif (($public=="FA" || $public=="FC")  && $categorie_prof=="VACATAIRE")
 {
$ligne=$ligne_budgetaire_FA_FC_vac;
 } 
 else
 {
$ligne="Erreur";
 }
 
  //code composante
if($identifiant_composante=="SIT")
{
$code_composante="909";
}
 else 
 {
$code_composante="960";
 } 
 
     //statut prof
 if ($categorie_prof=="VACATAIRE")
 {
 $statut_prof= "V";
 }
 elseif ($categorie_prof=="PERMANENT") 
 {
   $statut_prof= "P";
 }
 else
 {
 $statut_prof= "erreur";
 }
 
 //type activit�
 if($heuredureeCM!="00" or $mindureeCM!="00") 
 {$type_activ="CM";}  
 elseif($heuredureeTD!="00" or $mindureeTD!="00") 
 {$type_activ="TD";}  
 elseif($heuredureeTP!="00" or $mindureeTP!="00") 
 {$type_activ="TP";}
  else
 {
  {$type_activ="TD";} 
 }
 
 
$fichier.=$prof['nom'].";".$prof['prenom'].";".$prof['identifiant'].";".$statut_prof.";".$identifiant_groupe.";".$identifiant_composante.";".$code_composante.";".$enseignements_au_forfait['identifiant'].";".$niveau.";".$cycle.";".$periode.";".$public.";".$ligne.";".$type_activ.";".$total_heure_eqtd_au_forfait.",".$total_min_eqtd_au_forfait.";"."1"."\n";		
		

	$total_heure_eqtd_au_forfait=$heureduree;
	$total_min_eqtd_au_forfait=$minduree;
	}


//si sup�rieur � 12h et le resultat de la division par 12, 10, 11, 10... est �gale � 00min afin de favoriser l'affichage des heures avec des chiffres ronds
elseif ($total_heure_eqtd_en_min_au_forfait>720 and (($total_heure_eqtd_en_min_au_forfait%720==0 and $total_heure_eqtd_en_min_au_forfait/720<=12) or ($total_heure_eqtd_en_min_au_forfait%660==0 and $total_heure_eqtd_en_min_au_forfait/660<=12) or ($total_heure_eqtd_en_min_au_forfait%600==0 and $total_heure_eqtd_en_min_au_forfait/660<=12) or ($total_heure_eqtd_en_min_au_forfait%540==0 and $total_heure_eqtd_en_min_au_forfait/540<=12) or ($total_heure_eqtd_en_min_au_forfait%480==0 and $total_heure_eqtd_en_min_au_forfait/480<=12) or ($total_heure_eqtd_en_min_au_forfait%420==0 and $total_heure_eqtd_en_min_au_forfait/420<=12) ))
	{
	//nb de semaines
	if ($total_heure_eqtd_en_min_au_forfait%720==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min_au_forfait/720;
		}
	elseif ($total_heure_eqtd_en_min_au_forfait%660==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min_au_forfait/660;
		}
	elseif ($total_heure_eqtd_en_min_au_forfait%600==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min_au_forfait/600;
		}
	elseif ($total_heure_eqtd_en_min_au_forfait%540==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min_au_forfait/540;
		}
	elseif ($total_heure_eqtd_en_min_au_forfait%480==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min_au_forfait/480;
		}
	elseif ($total_heure_eqtd_en_min_au_forfait%420==0)
		{
		$nb_semaine=$total_heure_eqtd_en_min_au_forfait/420;
		}

	$total_heure_eqtd_en_min_au_forfait=$total_heure_eqtd_en_min_au_forfait/$nb_semaine;
	$total_heure_eqtd_au_forfait=intval($total_heure_eqtd_en_min_au_forfait/60);
	$total_min_eqtd_au_forfait=$total_heure_eqtd_en_min_au_forfait%60;
	if (strlen($total_heure_eqtd_au_forfait)==1)
		{
		$total_heure_eqtd_au_forfait="0".$total_heure_eqtd_au_forfait;
		}
	if (strlen($total_min_eqtd_au_forfait)==1)
		{
		$total_min_eqtd_au_forfait="0".$total_min_eqtd_au_forfait;
		}
	if (strlen($total_min_eqtd_au_forfait)==0)
		{
		$total_min_eqtd_au_forfait="00";
		}

if ($niveau==1 || $niveau==2 || $niveau ==3) 
 {
 $cycle="L";
 }
 else
 {
 $cycle="M";
 } 
 
  //ligne budg�taire
if ($identifiant_composante=="SIT" && $public=="FI" )
 {
$ligne=$ligne_sitec_FI;
 }
 elseif ($identifiant_composante=="SIT" && ($public=="FA" || $public=="FC")  && $categorie_prof=="PERMANENT")
 {
$ligne=$ligne_sitec_titulaire_FA_FC;
 } 
 elseif ($identifiant_composante=="TI1" && $public=="FI" )
 {
$ligne=$ligne_iut_FI;
 } 
 elseif ($identifiant_composante=="TI1" && ($public=="FA" || $public=="FC")  && $categorie_prof=="PERMANENT")
 {
 $ligne=$ligne_iut_titulaire_FA_FC;
 }
 elseif (($public=="FA" || $public=="FC")  && $categorie_prof=="VACATAIRE")
 {
$ligne=$ligne_budgetaire_FA_FC_vac;
 } 
 else
 {
$ligne="Erreur";
 }
 
  //code composante
if($identifiant_composante=="SIT")
{
$code_composante="909";
}
 else 
 {
$code_composante="960";
 } 
 
     //statut prof
 if ($categorie_prof=="VACATAIRE")
 {
 $statut_prof= "V";
 }
 elseif ($categorie_prof=="PERMANENT") 
 {
   $statut_prof= "P";
 }
 else
 {
 $statut_prof= "erreur";
 }
 
  //type activit�
 if($heuredureeCM!="00" or $mindureeCM!="00") 
 {$type_activ="CM";}  
 elseif($heuredureeTD!="00" or $mindureeTD!="00") 
 {$type_activ="TD";}  
 elseif($heuredureeTP!="00" or $mindureeTP!="00") 
 {$type_activ="TP";}
  else
 {
  {$type_activ="TD";} 
 }
 
$fichier.=$prof['nom'].";".$prof['prenom'].";".$prof['identifiant'].";".$statut_prof.";".$identifiant_groupe.";".$identifiant_composante.";".$code_composante.";".$enseignements_au_forfait['identifiant'].";".$niveau.";".$cycle.";".$periode.";".$public.";".$ligne.";".$type_activ.";".$total_heure_eqtd_au_forfait.",".$total_min_eqtd_au_forfait.";".$nb_semaine."\n";		
		

	$total_heure_eqtd_au_forfait=$heureduree;
	$total_min_eqtd_au_forfait=$minduree;
	}





//si sup�rieur � 12h et le reste de la division de la dur�e hebdo par le nombre de semaine est �gale � zero et que le nombre de semaine est inf�rieur � 12
elseif ($total_heure_eqtd_en_min_au_forfait>720 and ( (($total_heure_eqtd_en_min_au_forfait%720)%intval($total_heure_eqtd_en_min_au_forfait/720)==0 and $total_heure_eqtd_en_min_au_forfait/720<=12) or (($total_heure_eqtd_en_min_au_forfait%660)%intval($total_heure_eqtd_en_min_au_forfait/660)==0 and $total_heure_eqtd_en_min_au_forfait/660<=12) or (($total_heure_eqtd_en_min_au_forfait%600)%intval($total_heure_eqtd_en_min_au_forfait/600)==0 and $total_heure_eqtd_en_min_au_forfait/600<=12) or (($total_heure_eqtd_en_min_au_forfait%540)%intval($total_heure_eqtd_en_min_au_forfait/540)==0 and $total_heure_eqtd_en_min_au_forfait/540<=12) or (($total_heure_eqtd_en_min_au_forfait%480)%intval($total_heure_eqtd_en_min_au_forfait/480)==0 and $total_heure_eqtd_en_min_au_forfait/480<=12) or (($total_heure_eqtd_en_min_au_forfait%420)%intval($total_heure_eqtd_en_min_au_forfait/420)==0 and $total_heure_eqtd_en_min_au_forfait/420<=12) or (($total_heure_eqtd_en_min_au_forfait%360)%intval($total_heure_eqtd_en_min_au_forfait/360)==0 and $total_heure_eqtd_en_min_au_forfait/360<=12) or (($total_heure_eqtd_en_min_au_forfait%300)%intval($total_heure_eqtd_en_min_au_forfait/300)==0 and $total_heure_eqtd_en_min_au_forfait/300<=12) or (($total_heure_eqtd_en_min_au_forfait%240)%intval($total_heure_eqtd_en_min_au_forfait/240)==0 and $total_heure_eqtd_en_min_au_forfait/240<=12) or (($total_heure_eqtd_en_min_au_forfait%180)%intval($total_heure_eqtd_en_min_au_forfait/180)==0 and $total_heure_eqtd_en_min_au_forfait/180<=12) or (($total_heure_eqtd_en_min_au_forfait%120)%intval($total_heure_eqtd_en_min_au_forfait/120)==0 and $total_heure_eqtd_en_min_au_forfait/120<=12) ))
	{
	//nb de semaines
	if (($total_heure_eqtd_en_min_au_forfait%720)%intval($total_heure_eqtd_en_min_au_forfait/720)==0 and $total_heure_eqtd_en_min_au_forfait/intval($total_heure_eqtd_en_min_au_forfait/720)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min_au_forfait/720);
		}
	elseif (($total_heure_eqtd_en_min_au_forfait%660)%intval($total_heure_eqtd_en_min_au_forfait/660)==0 and $total_heure_eqtd_en_min_au_forfait/intval($total_heure_eqtd_en_min_au_forfait/660)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min_au_forfait/660);
		}
	elseif (($total_heure_eqtd_en_min_au_forfait%600)%intval($total_heure_eqtd_en_min_au_forfait/600)==0 and $total_heure_eqtd_en_min_au_forfait/intval($total_heure_eqtd_en_min_au_forfait/600)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min_au_forfait/600);
		}
	elseif (($total_heure_eqtd_en_min_au_forfait%540)%intval($total_heure_eqtd_en_min_au_forfait/540)==0 and $total_heure_eqtd_en_min_au_forfait/intval($total_heure_eqtd_en_min_au_forfait/540)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min_au_forfait/540);
		}
	elseif (($total_heure_eqtd_en_min_au_forfait%480)%intval($total_heure_eqtd_en_min_au_forfait/480)==0 and $total_heure_eqtd_en_min_au_forfait/intval($total_heure_eqtd_en_min_au_forfait/480)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min_au_forfait/480);
		}
	elseif (($total_heure_eqtd_en_min_au_forfait%420)%intval($total_heure_eqtd_en_min_au_forfait/420)==0 and $total_heure_eqtd_en_min_au_forfait/intval($total_heure_eqtd_en_min_au_forfait/420)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min_au_forfait/420);
		}
	elseif (($total_heure_eqtd_en_min_au_forfait%360)%intval($total_heure_eqtd_en_min_au_forfait/360)==0 and $total_heure_eqtd_en_min_au_forfait/intval($total_heure_eqtd_en_min_au_forfait/360)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min_au_forfait/360);
		}
	elseif (($total_heure_eqtd_en_min_au_forfait%300)%intval($total_heure_eqtd_en_min_au_forfait/300)==0 and $total_heure_eqtd_en_min_au_forfait/intval($total_heure_eqtd_en_min_au_forfait/300)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min_au_forfait/300);
		}
	elseif (($total_heure_eqtd_en_min_au_forfait%240)%intval($total_heure_eqtd_en_min_au_forfait/240)==0 and $total_heure_eqtd_en_min_au_forfait/intval($total_heure_eqtd_en_min_au_forfait/240)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min_au_forfait/240);
		}
	elseif (($total_heure_eqtd_en_min_au_forfait%180)%intval($total_heure_eqtd_en_min_au_forfait/180)==0 and $total_heure_eqtd_en_min_au_forfait/intval($total_heure_eqtd_en_min_au_forfait/180)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min_au_forfait/180);
		}
	elseif (($total_heure_eqtd_en_min_au_forfait%120)%intval($total_heure_eqtd_en_min_au_forfait/120)==0 and $total_heure_eqtd_en_min_au_forfait/intval($total_heure_eqtd_en_min_au_forfait/120)<=720)
		{
		$nb_semaine=intval($total_heure_eqtd_en_min_au_forfait/120);
		}

	$total_heure_eqtd_en_min_au_forfait=$total_heure_eqtd_en_min_au_forfait/$nb_semaine;
	$total_heure_eqtd_au_forfait=intval($total_heure_eqtd_en_min_au_forfait/60);
	$total_min_eqtd_au_forfait=$total_heure_eqtd_en_min_au_forfait%60;
	if (strlen($total_heure_eqtd_au_forfait)==1)
		{
		$total_heure_eqtd_au_forfait="0".$total_heure_eqtd_au_forfait;
		}

	if (strlen($total_min_eqtd_au_forfait)==1)
		{
		$total_min_eqtd_au_forfait="0".$total_min_eqtd_au_forfait;
		}
	if (strlen($total_min_eqtd_au_forfait)==0)
		{
		$total_min_eqtd_au_forfait="00";
		}
		
if ($niveau==1 || $niveau==2 || $niveau ==3) 
 {
 $cycle="L";
 }
 else
 {
 $cycle="M";
 } 		
  //ligne budg�taire
 if ($identifiant_composante=="SIT" && $public=="FI" )
 {
$ligne=$ligne_sitec_FI;
 }
 elseif ($identifiant_composante=="SIT" && ($public=="FA" || $public=="FC")  && $categorie_prof=="PERMANENT")
 {
$ligne=$ligne_sitec_titulaire_FA_FC;
 } 
 elseif ($identifiant_composante=="TI1" && $public=="FI" )
 {
$ligne=$ligne_iut_FI;
 } 
 elseif ($identifiant_composante=="TI1" && ($public=="FA" || $public=="FC")  && $categorie_prof=="PERMANENT")
 {
 $ligne=$ligne_iut_titulaire_FA_FC;
 }
 elseif (($public=="FA" || $public=="FC")  && $categorie_prof=="VACATAIRE")
 {
$ligne=$ligne_budgetaire_FA_FC_vac;
 } 
 else
 {
$ligne="Erreur";
 }
 
   //code composante
if($identifiant_composante=="SIT")
{
$code_composante="909";
}
 else 
 {
$code_composante="960";
 } 
 
 
 
      //statut prof
 if ($categorie_prof=="VACATAIRE")
 {
 $statut_prof= "V";
 }
 elseif ($categorie_prof=="PERMANENT") 
 {
   $statut_prof= "P";
 }
 else
 {
 $statut_prof= "erreur";
 }
 
   //type activit�
 if($heuredureeCM!="00" or $mindureeCM!="00") 
 {$type_activ="CM";}  
 elseif($heuredureeTD!="00" or $mindureeTD!="00") 
 {$type_activ="TD";}  
 elseif($heuredureeTP!="00" or $mindureeTP!="00") 
 {$type_activ="TP";}
  else
 {
  {$type_activ="TD";} 
 }
 
 
$fichier.=$prof['nom'].";".$prof['prenom'].";".$prof['identifiant'].";".$statut_prof.";".$identifiant_groupe.";".$identifiant_composante.";".$code_composante.";".$enseignements_au_forfait['identifiant'].";".$niveau.";".$cycle.";".$periode.";".$public.";".$ligne.";".$type_activ.";".$total_heure_eqtd_au_forfait.",".$total_min_eqtd_au_forfait.";".$nb_semaine."\n";		
		

	$total_heure_eqtd_au_forfait=$heureduree;
	$total_min_eqtd_au_forfait=$minduree;
	}






else
	{
	$nb_de_semaine=intval($total_heure_eqtd_en_min_au_forfait/720);
	$minute_restante=$total_heure_eqtd_en_min_au_forfait%720;
	if ($nb_de_semaine>12)
		{
		$nb_de_semaine=12;
		$minute_restante=$total_heure_eqtd_en_min_au_forfait-(12*12*60);
		}
	//mise en forme de la dur�e pour la ligne 1
	$total_heure_ligne_1_au_forfait=($nb_de_semaine*720)/(60*$nb_de_semaine);
	$total_min_ligne_1_au_forfait=0;
	if (strlen($total_heure_ligne_1_au_forfait)==1)
		{
		$total_heure_ligne_1_au_forfait="0".$total_heure_ligne_1_au_forfait;
		}

	if (strlen($total_min_ligne_1_au_forfait)==1)
		{
		$total_min_ligne_1_au_forfait="0".$total_min_ligne_1_au_forfait;
		}
	if (strlen($total_min_ligne_1_au_forfait)==0)
		{
		$total_min_ligne_1_au_forfait="00";
		}
	//mise en forme de la dur�e pour la ligne 2

	if (($minute_restante%720)%intval($minute_restante/720)==0 and $minute_restante/intval($minute_restante/720)<=720 and intval($minute_restante/720)>0)
		{
		$nb_semaine_l2=intval($minute_restante/720);
		}
	elseif (($minute_restante%660)%intval($minute_restante/660)==0 and $minute_restante/intval($minute_restante/660)<=720 and intval($minute_restante/660)>0)
		{
		$nb_semaine_l2=intval($minute_restante/660);
		}
	elseif (($minute_restante%600)%intval($minute_restante/600)==0 and $minute_restante/intval($minute_restante/600)<=720 and intval($minute_restante/600)>0)
		{
		$nb_semaine_l2=intval($minute_restante/600);
		}
	elseif (($minute_restante%540)%intval($minute_restante/540)==0 and $minute_restante/intval($minute_restante/540)<=720 and intval($minute_restante/540)>0)
		{
		$nb_semaine_l2=intval($minute_restante/540);
		}
	elseif (($minute_restante%480)%intval($minute_restante/480)==0 and $minute_restante/intval($minute_restante/480)<=720 and intval($minute_restante/480)>0)
		{
		$nb_semaine_l2=intval($minute_restante/480);
		}
	elseif (($minute_restante%420)%intval($minute_restante/420)==0 and $minute_restante/intval($minute_restante/420)<=720 and intval($minute_restante/420)>0)
		{
		$nb_semaine_l2=intval($minute_restante/420);
		}
	elseif (($minute_restante%360)%intval($minute_restante/360)==0 and $minute_restante/intval($minute_restante/360)<=720 and intval($minute_restante/360)>0)
		{
		$nb_semaine_l2=intval($minute_restante/360);
		}
	elseif (($minute_restante%300)%intval($minute_restante/300)==0 and $minute_restante/intval($minute_restante/300)<=720 and intval($minute_restante/300)>0)
		{
		$nb_semaine_l2=intval($minute_restante/300);
		}
	elseif (($minute_restante%240)%intval($minute_restante/240)==0 and $minute_restante/intval($minute_restante/240)<=720 and intval($minute_restante/240)>0)
		{
		$nb_semaine_l2=intval($minute_restante/240);
		}
	elseif (($minute_restante%180)%intval($minute_restante/180)==0 and $minute_restante/intval($minute_restante/180)<=720 and intval($minute_restante/180)>0)
		{
		$nb_semaine_l2=intval($minute_restante/180);
		}
	elseif (($minute_restante%120)%intval($minute_restante/120)==0 and $minute_restante/intval($minute_restante/120)<=720 and intval($minute_restante/120)>0)
		{
		$nb_semaine_l2=intval($minute_restante/120);
		}
	else
		{
		$nb_semaine_l2=1;
		}

	$total_heure_eqtd_en_min_au_forfait=$minute_restante/$nb_semaine_l2;
	$total_heure_ligne_2_au_forfait=intval($total_heure_eqtd_en_min_au_forfait/60);
	$total_min_ligne_2_au_forfait=$total_heure_eqtd_en_min_au_forfait%60;

	if (strlen($total_heure_ligne_2_au_forfait)==1)
		{
		$total_heure_ligne_2_au_forfait="0".$total_heure_ligne_2_au_forfait;
		}
	if (strlen($total_min_ligne_2_au_forfait)==1)
		{
		$total_min_ligne_2_au_forfait="0".$total_min_ligne_2_au_forfait;
		}
	if (strlen($total_min_ligne_2_au_forfait)==0)
		{
		$total_min_ligne_2_au_forfait="00";
		}
		
if ($niveau==1 || $niveau==2 || $niveau ==3) 
 {
 $cycle="L";
 }
 else
 {
 $cycle="M";
 } 		
  //ligne budg�taire
if ($identifiant_composante=="SIT" && $public=="FI" )
 {
$ligne=$ligne_sitec_FI;
 }
 elseif ($identifiant_composante=="SIT" && ($public=="FA" || $public=="FC")  && $categorie_prof=="PERMANENT")
 {
$ligne=$ligne_sitec_titulaire_FA_FC;
 } 
 elseif ($identifiant_composante=="TI1" && $public=="FI" )
 {
$ligne=$ligne_iut_FI;
 } 
 elseif ($identifiant_composante=="TI1" && ($public=="FA" || $public=="FC")  && $categorie_prof=="PERMANENT")
 {
 $ligne=$ligne_iut_titulaire_FA_FC;
 }
 elseif (($public=="FA" || $public=="FC")  && $categorie_prof=="VACATAIRE")
 {
$ligne=$ligne_budgetaire_FA_FC_vac;
 } 
 else
 {
$ligne="Erreur";
 }
 
  //code composante
if($identifiant_composante=="SIT")
{
$code_composante="909";
}
 else 
 {
$code_composante="960";
 } 
 
       //statut prof
 if ($categorie_prof=="VACATAIRE")
 {
 $statut_prof= "V";
 }
 elseif ($categorie_prof=="PERMANENT") 
 {
   $statut_prof= "P";
 }
 else
 {
 $statut_prof= "erreur";
 }
 
    //type activit�
 if($heuredureeCM!="00" or $mindureeCM!="00") 
 {$type_activ="CM";}  
 elseif($heuredureeTD!="00" or $mindureeTD!="00") 
 {$type_activ="TD";}  
 elseif($heuredureeTP!="00" or $mindureeTP!="00") 
 {$type_activ="TP";}
 else
 {
  {$type_activ="TD";} 
 }
 
 
 
 
$fichier.=$prof['nom'].";".$prof['prenom'].";".$prof['identifiant'].";".$statut_prof.";".$identifiant_groupe.";".$identifiant_composante.";".$code_composante.";".$enseignements_au_forfait['identifiant'].";".$niveau.";".$cycle.";".$periode.";".$public.";".$ligne.";".$type_activ.";".$total_heure_ligne_1_au_forfait.",".$total_min_ligne_1_au_forfait.";".$nb_de_semaine."\n";		
$fichier.=$prof['nom'].";".$prof['prenom'].";".$prof['identifiant'].";".$statut_prof.";".$identifiant_groupe.";".$identifiant_composante.";".$code_composante.";".$enseignements_au_forfait['identifiant'].";".$niveau.";".$cycle.";".$periode.";".$public.";".$ligne.";".$type_activ.";".$total_heure_ligne_2_au_forfait.",".$total_min_ligne_2_au_forfait.";".$nb_semaine_l2."\n";		


	}
}
}
}
}
}
}

}
}
}
}

$jour=date('d');

$mois=date('m');

$annee=date('y');
$heuredujour=date('H');
$minutedujour=date('i');
$formation=str_replace(" ","_",$formation);
	$nomfichier=$formation."_".$jour."_".$mois."_".$annee."-".$heuredujour."h".$minutedujour.".csv";


	header("Content-Type: application/csv-tab-delimited-table");
header("Content-disposition: filename=$nomfichier");

echo $fichier;
}
}
?>

