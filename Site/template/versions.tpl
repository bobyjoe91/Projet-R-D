<html>
	<head>
		<meta charset="utf-8">
		<title>Versions du site</title>
		<link rel="stylesheet" href="API/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/common.css"/>
		<link rel="stylesheet" href="css/version.css"/>
		<script type="text/javascript" src="js/version.js"></script>
		<script type="text/javascript" src="js/loadPage.js"></script>
	</head>
	
	<body>
		<div class="page-header">
			<h2><span class="glyphicon glyphicon-calendar"></span>
				VT CALENDAR 
				<small>consultation des emplois du temps faits avec VT</small><br>
			</h2>
		</div>
		<input type="button" value="Pr�cedent" onClick="loadIndex()">
		<div class="panel panel-default">
		
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte79')">Version 6.0</a></h3>
			</div>
			<div class="panel-body"><span id="texte79" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Design et refonte de l'arbo en cours</li>
				</ul>

				<ul>
					<lh><em><strong>Inferface �tudiant :</strong></em></lh>
					<li>Design et refonte de l'arbo en cours</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte78')">Version 5.1.9</a></h3>
			</div>
			<div class="panel-body"><span id="texte78" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans les infos-bulles des s�ances des profs, il y avait un probl�me entre la dur�e r�elle d'une s�ance et la dur�e par d�faut d�finie dans vt..</li>
						<li>Maintenant, les r�servations priv�es s'affichent dans une couleur diff�rente des r�servations non priv�es.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte77')">Version 5.1.8</a></h3>
			</div>
			<div class="panel-body"><span id="texte77" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans les infos-bulles des s�ances des profs, le noms du et des profs ont �t� ajout�s.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte76')">Version 5.1.7</a></h3>
			</div>
			<div class="panel-body"><span id="texte76" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans le bilan des salles, ajout d'un colonne donnant le taux d'occupation annuel par salle.</li>
						<li>Dans le bilan des salles, correction du bug qui apr�s un export excel continuait � g�n�rer des fichiers excel lorsqu'on changeait d'ann�e.</li>
						<li>Correction de variables mal initialis�es dans "dialogue de gestion" et dans "admin".</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte75')">Version 5.1.6</a></h3>
			</div>
			<div class="panel-body"><span id="texte75" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Ajout de la possibilit� de choisir dans le fichier config.php l'identifiant correspondant aux DS dans la base de donn�es de VT.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans le bilan des salles, le graphique du taux d'occupation des salles par zone se fait maintenant sur une base de 1120h/an au lieu de 1400h comme ce qui est demand� lors des enqu�tes nationales.</li>
						<li>Dans le fichier config.php, on peut maintenant faire en sorte qu'une r�servation priv�e soit totalement invisible par les autres profs au lieu de marquer "priv�" sur la r�servation.</li>
				</ul>				
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte74')">Version 5.1.5</a></h3>
			</div>
			<div class="panel-body"><span id="texte74" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Export Giseh (uniquement pour l'universit� Paris10). Le code de la composante n'apparaissait pas � chaque fois pour certains enseignements au forfait.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte73')">Version 5.1.4</a></h3>
			</div>
			<div class="panel-body"><span id="texte73" style="visibility: hidden; display: none;">
				<ul>
					<li>Il faut ajouter le champ "dialogue" en int(2) dans la table "login_prof" avec 0 comme valeur par d�faut.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Export Giseh (uniquement pour l'universit� Paris10). Les cours au forfait apparaissaient sous forme de TD.</li>
						<li>Dialogue de gestion (uniquement pour l'universit� Paris10). Ajout de l'interface qui calcule les donn�es n�cessaires au dialogue de gestion avec l'universit�.</li>
						<li>Lorsqu'on triait les salles par composante, il y avait un petit bug et les salles n'apparaissaient pas dans la liste d�roulante.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte72')">Version 5.1.3</a></h3>
			</div>
			<div class="panel-body"><span id="texte72" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans "mes heures", lorsqu'on a le droit de voir les heures des autres profs le changement de prof ne se fait plus de mani�re automatique mais en appuyant sur le bouton "envoyer"</li>
						<li>Export Giseh (uniquement pour l'universit� Paris10). Si le dernier enseignement du dernier prof du tableau n'avait qu'une seule s�ance, celle-ci n'apparaissait pas et les heures �taient report�es sur la ligne pr�c�dente.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte71')">Version 5.1.2</a></h3>
			</div>
			<div class="panel-body"><span id="texte71" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Si on n'est pas sur la semaine courante un dimanche soir et qu'on appuie sur le bouton "retour � la semaine courante" le lundi, on tombe maintenant sur la nouvelle semaine et non sur la semaine pass�e.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Si on n'est pas sur la semaine courante un dimanche soir et qu'on appuie sur le bouton "retour � la semaine courante" le lundi, on tombe maintenant sur la nouvelle semaine et non sur la semaine pass�e.</li>
				</ul>				
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte70')">Version 5.1.1</a></h3>
			</div>
			<div class="panel-body"><span id="texte70" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Suite a la disparition du champ "affectation" dans la table "ressources_profs", le pr�-tri des profs se fait maintenant uniquement avec les composantes.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte69')">Version 5.1.0</a></h3>
			</div>
			<div class="panel-body"><span id="texte69" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Ajout d'une interface "Gestion des droits" qui permet � l'administrateur de d�finir les droits de chaque utilisateur.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte68')">Version 5.0.9</a></h3>
			</div>
			<div class="panel-body"><span id="texte68" style="visibility: hidden; display: none;">
				<ul>
					<li>Il faut ajouter le champ "mes_droits" en int(2) dans la table "login_prof" avec 1 comme valeur par d�faut.</li>
					<li>Il faut ajouter le champ "admin" en int(2) dans la table "login_prof" avec 0 comme valeur par d�faut.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Ajout d'une interface "Mes droits" qui permet aux utilisateurs de voir les droits qu'ils ont.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte67')">Version 5.0.8</a></h3>
			</div>
			<div class="panel-body"><span id="texte67" style="visibility: hidden; display: none;">
				<ul>
					<li>Il y avait un petit probl�me d'affichage sur la page d'accueil depuis la version 7 de firefox qui a �t� corrig�.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Il y a maintenant une vue verticale, horizontale, mensuelle, mensuelle r�duite et journali�re.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte66')">Version 5.0.7</a></h3>
			</div>
			<div class="panel-body"><span id="texte66" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Cr�ation d'un outil "Mes DS" qui permet aux �tudiants d'avoir une liste de leurs DS.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte65')">Version 5.0.6</a></h3>
			</div>
			<div class="panel-body"><span id="texte65" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Quand on est dans "Mes modules", "Mes heures", "Bilan par formation"... et qu'on se fait d�connecter par le serveur, il y a maintenant un lien qui s'affiche pour revenir � la page principale.</li>
						<li>Dans "Mes heures", il y a maintenant la somme des heures effectu�es en bas du tableau.</li>
						<li>Dans "Mes heures, il y a maintenant un graphique qui repr�sente l'�volution des heures au cours de l'ann�e.</li>
						<li>Dans "Occupation des salles", il y a maintenant un graphique qui repr�sente le taux d'occupation des salles en fonction des zones.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte64')">Version 5.0.5</a></h3>
			</div>
			<div class="panel-body"><span id="texte64" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Ajout d'une vue mensuelle o� on voit le d�tail des s�ances. L'ancienne vue mensuelle s'appelle maintenant "vue mensuelle r�duite".</li>
						<li>Dans le bilan par formation et dans le bilan "giseh", les vacataires et les titulaires sont distingu�s � l'aide du champ "titulaire" de la table "ressource_profs".</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte63')">Version 5.0.4</a></h3>
			</div>
			<div class="panel-body"><span id="texte63" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans la vue mensuelle, quand on choisissait par exemple la semaine 44 de 2011, elle ne s'affichait pas.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte62')">Version 5.0.3</a></h3>
			</div>
			<div class="panel-body"><span id="texte62" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Il est maintenant possible de choisir avec quoi on filtre les groupes, les profs et les salles (niveau, diplome, composante, zone...). Ceci se fait dans le fichier config.php.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte61')">Version 5.0.2</a></h3>
			</div>
			<div class="panel-body"><span id="texte61" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Avec le login perso, si on n'a pas le droit de se mettre des rendez-vous perso, les boutons permettant de d�finir l'heure de d�but et de fin des raccourcis dans "ma config" sont maintenant cach�s.</li>
						<li>Les champs permettant de choisir la semaine et l'ann�e ont �t� d�plac�s pour gagner un peu de place.</li>
						<li>Lors de l'export pdf de la vue mensuelle, si la date de d�but �tait durant la derni�re semaine du mois, il y avait un probl�me d'affichage.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte60')">Version 5.0.1</a></h3>
			</div>
			<div class="panel-body"><span id="texte60" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Lors d'un export PDF, les dates de d�but et de fin correspondent maintenant aux dates du planning visualis�.</li>
						<li>Lors d'un conflit, la taille du rectangle noir est maintenant fonction du nombre de lignes � afficher.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte59')">Version 5.0.0</a></h3>
			</div>
			<div class="panel-body"><span id="texte59" style="visibility: hidden; display: none;">
				<ul>
					<li>Il faut ajouter le champ "selecMateriel" en varchar(45) dans la table "login_prof".</li>
					<li>Il faut ajouter les champs "couleur_groupe","couleur_prof", "couleur_salle" et "couleur_materiel" en int(3) dans la table "login_prof".</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Quand on affiche le planning d'un groupe, quand celui-ci est en "cong�", on voit maintenant le type de cong� : examen, entreprise/stage et cong�.</li>
						<li>Dans "Mes heures", il est maintenant possible de d�finir la r�partition cours, td et tp de chaque type d'enseignement de VT. Cela se fait dans le fichier config.php.</li>
						<li>Maintenant, on peut afficher le planning du mat�riel.</li>
						<li>Dans "ma config", on peut choisir pour chaque ressource (salle, groupe, prof et materiel) la couleur � associer � la s�ance (groupe, prof ou matiere).</li>
						<li>Dans mes modules, on a maintenant le mat�riel associ� aux s�ances.</li>
						<li>Ajout du script pour g�n�rer les fichiers ics du mat�riel.</li>
						<li>Dans la vue verticale avec plusieurs ressources, quand on cliquait sur le bouton "Retour � la semaine actuelle" qui �tait en bas du planning, la largeur et la hauteur de l'�cran n'�taient plus pris en compte lors de l'affichage du planning de la semaine courante.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>On voit maintenant le type de cong� : examen, entreprise/stage et cong�.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte58')">Version 4.4.8</a></h3>
			</div>
			<div class="panel-body"><span id="texte58" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Lors de la g�n�ration d'un pdf, le nom du fichier comporte le type de vue utilis� et les heures et les minutes ont �t� supprim�es.</li>
						<li>Avant de g�n�rer un pdf, la page de choix des dates indique maintenant si les conflits et les r�servations risquent d'�tre masqu�s si les cases "masquer les probl�mes" et "masquer les RDV" sont coch�es.</li>
						<li>Lors de l'export pdf du planning mensuel d'une seule ressource, l'intitul� des s�ances et des r�servations apparait.</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte57')">Version 4.4.7</a></h3>
			</div>
			<div class="panel-body"><span id="texte57" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Le menu du haut lors d'un export pdf avec le login g�n�rique ne fonctionnait pas correctement. C'est corrig�.</li>
						<li>Tous les CSS de la mise en page se trouvent maintenant dans le r�pertoire "css" au lieu d'�tre inclus dans chaque fichier php.</li>
						<li>La largeur des listes de choix est maintenant fixe. Elle peut �tre modifi�e dans le fichier "css/index.css".</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte56')">Version 4.4.6</a></h3>
			</div>
			<div class="panel-body"><span id="texte56" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Maintenant, quand plusieurs s�ances sont superpos�es, d�s qu'on passe la souris sur les s�ances une info-bulle apparait avec la liste de toutes les s�ances superpos�es.</li>
						<li>Lors d'un export PDF, le nom de la vue que l'on souhaite exporter apparait sur la page o� on choisit les dates de d�but et de fin de l'export.</li>
						<li>Lors d'un export PDF, le nom du fichier est fonction des ressources s�lectionn�es.</li>
						<li>Avec le login perso, si l'utilisateur n'avait pas d�fini une autre heure que l'heure de d�but et de fin par d�faut, la g�n�ration des pdf plantait.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Lors d'un export PDF, le nom du fichier correspond au nom de l'�tudiant.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte55')">Version 4.4.5</a></h3>
			</div>
			<div class="panel-body"><span id="texte55" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans le bilan par formation, il est maintenant possible de d�finir la r�partition cours, td et tp de chaque type d'enseignement de VT. Cela se fait dans le fichier config.php. La m�me chose sera faite bient�t dans le bilan "mes heures".</li>
				</ul>			
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte54')">Version 4.4.4</a></h3>
			</div>
			<div class="panel-body"><span id="texte54" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Ajout de la possibilit� de choisir l'ann�e scolaire dans "Mes modules" quand on a plusieurs bases de donn�es.</li>
						<li>Ajout de la possibilit� de choisir l'ann�e scolaire dans "Mes heures" quand on a plusieurs bases de donn�es.</li>
						<li>Quand on clique sur une s�ance, l'interface choisit maintenant la bonne base de donn�es et non plus uniquement la derni�re. </li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Ajout de la possibilit� de choisir l'ann�e scolaire dans "Mes modules" quand on a plusieurs bases de donn�es.</li>
						<li>Quand on clique sur une s�ance, l'interface choisit maintenant la bonne base de donn�es et non plus uniquement la derni�re.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte53')">Version 4.4.3</a></h3>
			</div>
			<div class="panel-body"><span id="texte53" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Le passage d'une ann�e � l'autre avec les fl�ches permettant de se d�placer de mois en mois ne fonctionnait pas. C'est corriger.</li>
						<li>Ajout de la possibilit� de colorier les s�ances avec la couleur associ�e aux profs dans VT. Le choix se fait dans le fichier config.php.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Le passage d'une ann�e � l'autre avec les fl�ches permettant de se d�placer de mois en mois ne fonctionnait pas. C'est corriger.</li>
						<li>Ajout de la possibilit� de colorier les s�ances avec la couleur associ�e aux profs dans VT. Le choix se fait dans le fichier config.php.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte52')">Version 4.4.2</a></h3>
			</div>
			<div class="panel-body"><span id="texte52" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Possibilit� d'afficher soit le nom soit l'alias des enseignements.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Possibilit� d'afficher soit le nom soit l'alias des enseignements.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte51')">Version 4.4.1</a></h3>
			</div>
			<div class="panel-body"><span id="texte51" style="visibility: hidden; display: none;">
				<ul>
					<li>Ajout d'un champ "salle" en int(2) avec une valeur par d�faut de 0 pour autoriser ou non l'utilisation du bilan de l'occupation des salles.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Ajout du bilan d'occupation des salles.</li>
						<li>Possibilit� d'afficher soit le nom soit l'alias des salles.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte50')">Version 4.4.0</a></h3>
			</div>
			<div class="panel-body"><span id="texte50" style="visibility: hidden; display: none;">
				<ul>
					<li>Ajout d'un champ "giseh" en int(2) avec une valeur par d�faut de 0 pour que la version de l'interface web disponible sur le site de VT soit la m�me que celle utilis�e dans mon universit�. Ce champ sert � activer un bilan des heures pour les exporter vers le logiciel Giseh. Si vous n'avez pas ce logiciel, il faut laisser ce champ � 0 pour tous vos utilisateurs.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Ajout d'un param�tre dans config.php afin de d�finir le fuseau horaire. Cela permet de mettre la bonne heure dans le champ "dateModif" lors de la cr�ation d'une r�servation au lieu de l'heure GMT+0.</li>
						<li>Ajout d'un param�tre dans config.php afin de choisir si la couleur des s�ances correspond � la couleur des groupes dans vt ou � la couleur des mati�res.</li>
						<li>Dans "Bilan par formation", j'ai ajout� en fin de tableau la somme totale des heures faites.</li>
						<li>Dans "Bilan par formation", j'ai s�par� les heures des titulaires des heures des vacataires.</li>
						<li>Ajout de fl�ches suppl�mentaires pour se d�placer de mois en mois</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Ajout de fl�ches suppl�mentaires pour se d�placer de mois en mois.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte49')">Version 4.3.9</a></h3>
			</div>
			<div class="panel-body"><span id="texte49" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Le flux RSS a �t� revu. Maintenant, les changements de prof, de salle et de groupe sont pris en compte.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Le flux RSS a �t� revu. Maintenant, les changements de prof, de salle et de groupe sont pris en compte.</li>
						<li>La cr�ation du cookie pour rester connect� est r�par�e.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte48')">Version 4.3.8</a></h3>
			</div>
			<div class="panel-body"><span id="texte48" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Am�lioration de la mise en page et ajout d'un menu.</li>
						<li>Dans la vue horizontale, quand une s�ance ou une r�servation ont une dur�e inf�rieure � 1h, le bandeau du haut et les arrondis sont r�duits pour laisser plus de place au texte.</li>
						<li>Dans la vue verticale mono-ressource, le bandeau du haut et les arrondis de chaque s�ance et r�servation sont l�g�rement plus petits pour gagner un peu de place.</li>
						<li>La l�gende en bas de page a �t� revue.</li>
						<li>Dans "mes heures", ajout de la possibilit� de faire un tri par code apog�e.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Am�lioration de la mise en page et ajout d'un menu.</li>
						<li>Quand une s�ance ou une r�servation ont une dur�e inf�rieure � 1h, le bandeau du haut et les arrondis sont r�duits pour laisser plus de place au texte.</li>
						<li>La l�gende en bas de page a �t� revue.</li>
						<li>Ajout de "Mes modules" pour les �tudiants.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface smartphone :</strong></em></lh>
						<li>Le rayon des arrondis a �t� l�g�rement r�duit pour gagner un peu de place.</li>
						<li>Les horaires de d�but et de fin de chaque s�ance ou r�servation sont mieux centr�s</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte47')">Version 4.3.7</a></h3>
			</div>
			<div class="panel-body"><span id="texte47" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Affichage des jours f�ri�s qui sont d�finis au niveau de la fili�re.</li>
						<li>Dans la vue "jour J", les vacances des anciennes bases de donn�es sont maintenant affich�es.</li>
						<li>Dans "Mes modules", quand il y a plusieurs ressources associ�es � une s�ance, elles sont maintenant class�es dans l'ordre alphab�tique.</li>
						<li>Quand on utilisait le login g�n�rique et qu'on souhaitait visualiser une semaine contenant un rendez-vous marqu� comme "priv�" et que le serveur est configur� pour afficher les erreurs, le planning ne s'affichait pas. C'est corrig�.</li>
						<li>Si dans une s�ance il y a plusieurs profs, plusieurs salles ou plusieurs groupes, ils sont maintenant class�s dans l'ordre alphab�tique.</li>
						<li>Dans "Mes heures", il y a une nouvelle colonne "Effectu�" afin de savoir quelles sont les s�ances qui sont d�j� pass�es.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Affichage des jours f�ri�s qui sont d�finis au niveau de la fili�re.</li>
						<li>Dans "Mes modules", quand il y a plusieurs ressources associ�es � une s�ance, elles sont maintenant class�es dans l'ordre alphab�tique.</li>
						<li>Si dans une s�ance il y a plusieurs profs ou plusieurs salles, ils sont maintenant class�s dans l'ordre alphab�tique.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface smartphone :</strong></em></lh>
						<li>Affichage des jours f�ri�s qui sont d�finis au niveau de la fili�re.</li>
						<li>Les cases des s�ances et des r�servations ont maintenant les coins arrondis comme dans l'interface classique.</li>
						<li>Dans la vue des profs, l'intitul� des s�ances n'�tait pas en gras.</li>
						<li>Quand une salle �tait associ�e � une r�servation, la salle n'apparaissait pas. C'est corrig�.</li>
						<li>Quand on utilisait le login g�n�rique et qu'on souhaitait visualiser une semaine contenant un rendez-vous marqu� comme "priv�" et que le serveur est configur� pour afficher les erreurs, le planning ne s'affichait pas. C'est corrig�.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte46')">Version 4.3.6</a></h3>
			</div>
			<div class="panel-body"><span id="texte46" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans "Ma config", on peut maintenant choisir les heures de d�but et de fin de chacun des 4 boutons de raccourci pour les horaires des r�servations. IL NE FAUT PAS OUBLIER D'AJOUTER 8 CHAMPS (bouton1Debut, bouton1Fin...) DANS LA TABLE LOGIN_PROF (Cf. lisezmoi.txt) !!!</li>
						<li>Dans "Mes modules", ajout d'un tiret pour s�parer le nom des profs quand il y a plusieurs profs associ�s � une s�ance.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte45')">Version 4.3.5</a></h3>
			</div>
			<div class="panel-body"><span id="texte45" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Lors que la croix permettant de modifier ou de supprimer une r�servation se trouvait superpos�e � une s�ance, elle n'�tait pas cliquable. C'est corrig�.</li>
						<li>Le pr�-tri des groupes se fait avec les "niveaux" qui sont associ�s aux groupes dans "groupes/ajouter modifier d�truire" dans VT.</li>
						<li>Quand on laisse la souris quelques secondes sur une s�ance, l'intitul� complet de la s�ance apparait dans une info-bulle.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Quand on clique sur une s�ance, on obtient le d�tail de l'ensemble des s�ances de l'enseignement.</li>
						<li>Quand on laisse la souris quelques secondes sur une s�ance, l'intitul� complet de la s�ance apparait dans une info-bulle.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte44')">Version 4.3.4</a></h3>
			</div>
			<div class="panel-body"><span id="texte44" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>La liste des profs �tait visible quand on tapait l'url des fonctions "mes modules" et "mes heures" en �tant d�connect�. Maintenant, il y a une page blanche.</li>
						<li>Quand une salle est associ�e � une r�servation pour un groupe ou un prof, le nom de la salle est maintenant affich�.</li>
						<li>Le texte des r�servations est mieux centr� verticalement.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte43')">Version 4.3.3</a></h3>
			</div>
			<div class="panel-body"><span id="texte43" style="visibility: hidden; display: none;">
				<ul>
					<li>Am�lioration des g�n�rateurs de logins et de mots de passe pour les �tudiants et les profs. Maintenant, les espaces, les tirets et les apostrophes sont supprim�es lors de la g�n�ration.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Quand un rendez-vous perso et une s�ance avaient la m�me heure de d�but, la croix permettant de modifier ou de supprimer le rendez-vous perso n'�tait pas cliquable. C'est corrig�.</li>
						<li>Dans "Bilan par formation", la date de la g�n�ration n'�tait pas la bonne pour la deuxi�me ann�e scolaire et les suivantes.</li>
						<li>Dans les diff�rents bilans, les forfaits de plus de 100h �taient mal comptabilis�s.</li>
				</ul>	
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte42')">Version 4.3.2</a></h3>
			</div>
			<div class="panel-body"><span id="texte42" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans "Mes modules", suppression du trait rouge de s�paration entre les s�ances pass�es et les s�ances futures et ajout d'une nouvelle colonne "Effectu�e" pour savoir si une s�ance a d�j� �t� faite ou non.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte41')">Version 4.3.1</a></h3>
			</div>
			<div class="panel-body"><span id="texte41" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>La balise <*map*> n'�tait pas toujours ferm�e. C'est corrig�.</li>
						<li>Avec le login et le mot de passe perso, on peut maintenant cliquer sur n'importe quelle s�ance afin d'afficher le d�tail du module auquel appartient celle-ci. L'administrateur peut activer ou non cette fonction pour chaque utilisateur. IL NE FAUT PAS  OUBLIER D'AJOUTER 1 CHAMP DANS LA TABLE LOGIN_PROF (Cf. lisezmoi.txt) !!!</li>
						<li>Dans "mes modules" quand on faisait un classement par prof, par groupe, par type ou par salle, le prof s�lectionn� dans la liste d�roulante changeait pour devenir l'utilisateur au lieu de rester sur le prof s�lectionn� au d�part. C'est corrig�.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte40')">Version 4.3</a></h3>
			</div>
			<div class="panel-body"><span id="texte40" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans "Bilan par formation", quand il n'y avait que des enseignements au forfait durant une ann�e scolaire, le tableau s'affichait mal. C'est corrig�.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte39')">Version 4.2.9</a></h3>
			</div>
			<div class="panel-body"><span id="texte39" style="visibility: hidden; display: none;">
				<ul>
					<li>Correction des erreurs de syntaxe HTML afin de passer le test w3c sur toutes les pages sauf celles de l'interface Smartphone (pr�vu pour bient�t).</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans "Mes heures", il y avait un bug d'affichage quand on s�lectionnait un prof qui n�a aucune s�ance.</li>
						<li>La mise en page du menu de "Mes modules" a �t� corrig�e pour �tre identique aux autres.</li>
						<li>Dans "Mes modules", il y avait une variable mal initialis�e.</li>
						<li>Dans "Mes modules", lors du classement chronologique, la s�paration entre les s�ances pass�es et les s�ances futures se fait par un trait ROUGE. Pour les autres types de classement, la s�paration entre les ressources se fait avec un trait BLEU.</li>
						<li>Limitation � 2 chiffres du num�ro de la semaine et � 4 chiffres pour l'ann�e dans les champs "semaine" et "ann�e".</li>
						<li>Dans "Ma config", il manquait des sauts de lignes pour avoir la m�me mise en page que les autres fonctions (Mes heures, Mes modules...).</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Limitation � 2 chiffres du num�ro de la semaine et � 4 chiffres pour l'ann�e dans les champs "semaine" et "ann�e".</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte38')">Version 4.2.8</a></h3>
			</div>
			<div class="panel-body"><span id="texte38" style="visibility: hidden; display: none;">
				<ul>
					<li>Correction d'une variable utilis�e pour les cookies mal initialis�e.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Ajout d'un bouton pour le flux RSS car dans Firefox 4 le flux RSS n'est plus accessible dans la barre d'adresse.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Transformation du lien du flux RSS en un bouton � c�t� de l'export PDF pour gagner un peu de place.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte37')">Version 4.2.7</a></h3>
			</div>
			<div class="panel-body"><span id="texte37" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Ajout de la possibilit� de faire un export PDF avec le login et le mot de passe g�n�rique des profs. On peut activer ou d�sactiver cette possibilit� dans le fichier config.php.</li>
						<li>Ajout de la possibilit� d'ajouter un titre lors de la g�n�ration des fichiers pdf.</li>
						<li>Avec le login et le mot de passe persos, prise en compte de l'affichage du samedi et du dimanche ainsi que de l'heure personnalis�e dans les exports PDF.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte36')">Version 4.2.6</a></h3>
			</div>
			<div class="panel-body"><span id="texte36" style="visibility: hidden; display: none;">
				<ul>
					<li>Ajout de la possibilit� de sauvegarder un cookie pour rester connect�. D�s qu'on appuie sur "Se d�connecter", le cookie est supprim�.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Ajout d'un export PDF de l'emploi du temps. L'administrateur peut activer ou non cette fonction pour chaque utilisateur. IL NE FAUT PAS OUBLIER D'AJOUTER 1 CHAMP DANS LA TABLE LOGIN_PROF (Cf. lisezmoi.txt) !!!</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Ajout d'un export PDF de l'emploi du temps.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte35')">Version 4.2.5</a></h3>
			</div>
			<div class="panel-body"><span id="texte35" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Bouton "Mes Modules" : ajout de la possibilit� de faire des tris en fonction des groupes, des salles, des profs, des types et de la date. Pour cela, il faut cliquer sur l'intitul� des colonnes du tableau.</li>
						<li>Vue "Jour J" : ajout de la possibilit� de changer de jour.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte34')">Version 4.2.4</a></h3>
			</div>
			<div class="panel-body"><span id="texte34" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>L'administrateur peut activer ou non le bilan des heures par formation. IL NE FAUT PAS OUBLIER D'AJOUTER 1 CHAMP DANS LA TABLE LOGIN_PROF (Cf. lisezmoi.txt) !!!</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte33')">Version 4.2.3</a></h3>
			</div>
			<div class="panel-body"><span id="texte33" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>L'administrateur peut maintenant activer ou non pour certains utilisateurs un bilan des heures o� on peut choisir le prof dont on veut faire le bilan. IL NE FAUT PAS OUBLIER D'AJOUTER 1 CHAMP DANS LA TABLE LOGIN_PROF (Cf. lisezmoi.txt) !!!</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte32')">Version 4.2.2</a></h3>
			</div>
			<div class="panel-body"><span id="texte32" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>L'administrateur peut maintenant activer ou non la possibilit� de mettre des r�servations, l'affichage des boutons "Mes modules", "Mes heures" et "Ma config" et le flux RSS. IL NE FAUT PAS OUBLIER D'AJOUTER 3 CHAMPS DANS LA TABLE LOGIN_PROF (Cf. lisezmoi.txt) !!!</li>
						<li>Dans la vue mensuelle, les vacances de la derni�re semaine du mois �taient affich�es l'avant derni�re semaine. C'est corrig�.</li>
						<li>Dans la vue mensuelle, les vacances du dernier dimanche du mois n'�taient pas affich�es. C'est corrig�.</li>
						<li>Quand on a plusieurs bases de donn�es, les vacances des bases des ann�es pr�c�dentes s'affichent dor�navant.</li>
						<li>Avec le login et le mot de passe perso, quand on se d�loguait, le flux RSS �tait toujours disponible.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte31')">Version 4.2.1</a></h3>
			</div>
			<div class="panel-body"><span id="texte31" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans certains cas, l'affichage des conflits des groupes faisait planter l'interface. C'est maintenant corrig�.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte30')">Version 4.2</a></h3>
			</div>
			<div class="panel-body"><span id="texte30" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans la vue mensuelle, la pause de midi est maintenant visible.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte29')">Version 4.1.9</a></h3>
			</div>
			<div class="panel-body"><span id="texte29" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Maintenant, quand on visualise le planning d'un groupe, les s�ances et les r�servations plac�es aux groupes de niveaux inf�rieurs sont visibles.</li>
						<li>Ajout du bouton "Mon planning" qui permet de revenir � l'affichage de son propre emploi du temps lorsque d'autres groupes, salles ou profs ont �t� s�lectionn�s. Marche uniquement avec le login et le mot de passe perso.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte28')">Version 4.1.8</a></h3>
			</div>
			<div class="panel-body"><span id="texte28" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>La croix � c�t� de l'horaire des rendez-vous persos permettant de les modifier ou de les supprimer apparaissait sur les r�servations enregistr�es dans les bases de donn�es des ann�es scolaires pr�c�dentes. Celle-ci a �t� effac�e car on ne peut modifier ou supprimer que les r�servations de la base de donn�es de l'ann�e scolaire en cours.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Prise en compte de la diffusabilit� des s�ances. Si une s�ance est marqu�e comme "non diffusable" dans VT, elle ne s'affichera pas sur le planning des �tudiants. Inversement, si elle est marqu�e comme "diffusable", elle s'affichera sur le planning des �tudiants. L'activation ou non de cette fonction se fait dans le fichier config.php</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte27')">Version 4.1.7</a></h3>
			</div>
			<div class="panel-body"><span id="texte27" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Page de Login :</strong></em></lh>
						<li>Maintenant, les logins g�n�riques et persos des profs sont insensibles aux majuscules. En effet, les iPhones ajoutent par d�faut des majuscules � la premi�re lettre du login et cela faisait planter l'interface. Par contre, le mot de passe est toujours sensible aux majuscules.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte26')">Version 4.1.6</a></h3>
			</div>
			<div class="panel-body"><span id="texte26" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Quand on utilise son login et son mot de passe perso pour la premi�re fois, l'heure de d�but et de fin du planning n'�taient pas les bonnes. Pour corriger le probl�me, il faut changer les valeurs par d�faut dans la table login_prof au niveau des champs heureDebut et heureFin afin de mettre la valeur 0 au lieu de 8 et 19.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte25')">Version 4.1.5</a></h3>
			</div>
			<div class="panel-body"><span id="texte25" style="visibility: hidden; display: none;">
				<ul>
					<li>Ajout de la possibilit� de changer le titre de la fen�tre depuis le fichier config.php</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>La liste de pr�-tri des salles ne s'affichait pas dans l'ordre alphab�tique. C'est maintenant corrig�.</li>
						<li>Quand on cliquait sur la croix pour modifier une r�servation, la date et l'heure de la r�servation n'�taient pas les bonnes.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte24')">Version 4.1.4</a></h3>
			</div>
			<div class="panel-body"><span id="texte24" style="visibility: hidden; display: none;">
				<ul>
					<li>Si l'heure de d�but de journ�e n'�tait pas un nombre entier, l'interface n'affichait pas les s�ances de d�but de journ�e.</li>
					<li>Certaines requ�tes �taient mal interpr�t�es avec les vielles versions de MySQL. Elles ont �t� am�lior�es.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Si l'heure de d�but de journ�e n'�tait pas un nombre entier, il y avait un probl�me d'affichage dans le choix des heures de d�but et de fin des r�servations.</li>
						<li>Si l'heure de d�but de journ�e n'�tait pas un nombre entier, il y avait un probl�me d'affichage dans le choix des heures de d�but et de fin de journ�e dans "Ma config".</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte23')">Version 4.1.3</a></h3>
			</div>
			<div class="panel-body"><span id="texte23" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans "Mes heures", les dur�es forfaitaires de 0h g�n�raient une erreur qui a �t� corrig�e.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte22')">Version 4.1.2</a></h3>
			</div>
			<div class="panel-body"><span id="texte22" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Avec JavaScript d�sactiv�, il �tait possible de placer une r�servation avec une date dans un mauvais format (exemple : 35/13/2010) et cela faisait planter VT. Maintenant, l'interface d�tecte si JavaScript est activ� et si ce n'est pas le cas, on ne peut plus placer de r�servations.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte21')">Version 4.1.1</a></h3>
			</div>
			<div class="panel-body"><span id="texte21" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Ajout de la possibilit� d'activer ou de d�sactiver le message "pas de salle" quand aucune salle n'est affect�e � une s�ance depuis le fichier config.php.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte20')">Version 4.1</a></h3>
			</div>
			<div class="panel-body"><span id="texte20" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Ajout du bouton "Ma config" qui permet de modifier l'heure de d�but et de fin des journ�es ainsi que de choisir si on veut afficher le samedi et le dimanche. Ne fonctionne que si on utilise son login perso.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte19')">Version 4.0.2</a></h3>
			</div>
			<div class="panel-body"><span id="texte19" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Lorsque des s�ances �taient annul�es, l'affichage du planning plantait. C'est corrig�.</li>
						<li>Lorsqu'une s�ance est annul�e, un message est maintenant affich� sur la s�ance.</li>
						<li>Les s�ances non comptabilis�es et les s�ances annul�es ne sont plus prises en compte dans "Mes heures".</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte18')">Version 4.0.1</a></h3>
			</div>
			<div class="panel-body"><span id="texte18" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Ajout de la possibilit� de configurer dans config.php l'ajout ou non du mot "Salle :" devant le nom des salles inscrits sur les s�ances.</li>
						<li>Ajout de la possibilit� de configurer dans config.php le nombre de caract�res � afficher pour les salles dont le nom est inscrit sur les s�ances.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Ajout de la possibilit� de configurer dans config.php l'ajout ou non du mot "Salle :" devant le nom des salles inscrits sur les s�ances.</li>
						<li>Ajout de la possibilit� de configurer dans config.php le nombre de caract�res � afficher pour les salles dont le nom est inscrit sur les s�ances.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte17')">Version 4.0</a></h3>
			</div>
			<div class="panel-body"><span id="texte17" style="visibility: hidden; display: none;">
				<ul>
					<li>Adaptation des scripts � la nouvelle version de VT.</li>
					<li>La page de login a �t� am�lior�e.</li>
					<li>Suppression de toutes les erreurs de syntaxe en php.</li>
					<li>Suppression des erreurs de syntaxe en html afin d'�tre conforme � la norme W3C.</li>
					<li>Les heures de d�but et de fin de journ�e sont r�glables directement depuis le fichier config.php</li>
					<li>Les heures de d�but et de fin de la pause de midi sont r�glables directement depuis le fichier config.php</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans l'affichage du planning des salles, quand il y avait plusieurs profs associ�s � une s�ance, le texte n'�tait pas centr� verticalement dans la case de la s�ance.</li>
						<li>Dans la vue mensuelle, les info-bulles pour les r�servations des groupes de niveaux sup�rieurs ne fonctionnait pas. Par exemple, une r�servation au niveau d'un groupe de TD n'apparaissait pas quand on visualisait le groupe de TP. C'est corrig�.</li>
						<li>Correction d'une faille de s�curit� dans la suppression des rendez-vous.</li>
						<li>Dans "Mes modules...", on peut maintenant choisir n'importe quel prof.</li>
						<li>Avec Internet explorer, quand le filtre des groupes �tait sur "Tous", le filtre des profs se retrouvait aussi sur "Tous" en plus du filtre choisi.</li>
						<li>Ajout de "Mes heures..." afin que les profs puissent voir le bilan de leurs heures. La colonne "Code apog�e" correspond au champ "identifiant" des enseignements dans VT.</li>
						<li>Dans "Mes heures.." ajout d'un bouton de tri qui classe les s�ances par ordre chronologique ou par mati�re.</li>
						<li>Dans "Mes heures..." ajout d'un export vers excel des bilans des heures.</li>
						<li>Il n'y a plus besoin d'appuyer sur "envoyer" quand on change de type de vue ou qu'on cache les rendez-vous ou les probl�mes. Ca marche pour tous les navigateurs sauf internet explorer qui ne respecte pas les standards du web.</li>
						<li>Dans "Mes modules", l'interface ne faisait pas la diff�rence entre un enseignement qui s'appelait par exemple "GMP1_AUTOM" et un autre qui s'appelait "GMP1_AUTOMATISATION" et les s�ances des deux enseignements se trouvaient m�lang�es quand on visualisait le module "GMP1_AUTOM". C'est corrig�.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte16')">Version 3.1.3</a></h3>
			</div>
			<div class="panel-body"><span id="texte16" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans le flux RSS, l'heure des modifications �tait donn�e en GMT+0. Elle est maintenant donn�e en GMT+1.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Dans le flux RSS, l'heure des modifications �tait donn�e en GMT+0. Elle est maintenant donn�e en GMT+1.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte15')">Version 3.1.2</a></h3>
			</div>
			<div class="panel-body"><span id="texte15" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans "Mes modules", un trait de s�paration horizontal rouge s�pare maintenant les s�ances pass�es des futures s�ances.</li>
						<li>Les r�servations des groupes de niveaux sup�rieurs n'apparaissaient pas. Par exemple, une r�servation au niveau d'un groupe de TD n'apparaissait pas quand on visualisait le groupe de TP. C'est corrig�.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte14')">Version 3.1.1</a></h3>
			</div>
			<div class="panel-body"><span id="texte14" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Am�lioration de l'algorithme de d�tection des conflits de profs, groupes, salles... Dur�e de g�n�ration du planning divis�e par 4.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte13')">Version 3.1</a></h3>
			</div>
			<div class="panel-body"><span id="texte13" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans l'emploi du temps d'un prof, on peut maintenant voir facilement s'il y a bien une salle affect�e � la s�ance, si le prof n'a pas plusieurs cours en m�me temps, si les groupes n'ont pas plusieurs cours en m�me temps et si la salle n'est pas utilis�e par quelqu'un d'autre.Ces messages peuvent �tre cach�s si on coche la case "Masquer les probl�mes".</li>
						<li>Quand la case "Masquer les RDV" �tait coch�e et qu'ensuite on cliquait sur "Retour � la semaine actuelle", la case "Masquer les RDV" ne restait pas coch�e. C'est corrig�.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte12')">Version 3.0.3</a></h3>
			</div>
			<div class="panel-body"><span id="texte12" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans le flux RSS, les noms des groupes et des salles n'apparaissaient plus. Ca a �t� corrig�.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte11')">Version 3.0.2</a></h3>
			</div>
			<div class="panel-body"><span id="texte11" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Les fichiers .ics ont �t� l�g�rement modifi�s afin de les rendre plus lisibles.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Les fichiers .ics ont �t� l�g�rement modifi�s afin de les rendre plus lisibles.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte10')">Version 3.0.1</a></h3>
			</div>
			<div class="panel-body"><span id="texte10" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Un bug avec internet explorer a �t� corrig�. Quand on cliquait sur "Tout d�s�lectionner" on se retrouvait d�logu� si apr�s on cliquait sur "Envoyer".</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte9')">Version 3.0</a></h3>
			</div>
			<div class="panel-body"><span id="texte9" style="visibility: hidden; display: none;">
				<ul>
					<li>Toutes les requ�tes vers la base de donn�es sont maintenant des requ�tes pr�par�es --> suppression des risques d'injections SQL.</li>
					<li>Correction de certains probl�mes d'affichage avec internet explorer.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Dans la vue "Jour J" un probl�me lors de l'affichage des vacances a �t� corrig�.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte8')">Version 2.8</a></h3>
			</div>
			<div class="panel-body"><span id="texte8" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Une vue "Jour J" a �t� ajout�e. Elle permet de ne visualiser que le jour actuel.</li>
						<li>La taille de l'image g�n�r�e dans les diff�rentes vues a �t� corrig�e pour �tre agrandie dans certains cas et diminu�e dans d'autres pour supprimer les ascenseurs verticaux. Ca marche pour tous les navigateurs sauf internet explorer qui ne respecte pas les standards du web.</li>
						<li>Dans "mes modules", le nom du jour (lundi, mardi...) des s�ances a �t� ajout�</li>
						<li>L'abonnement au flux RSS ne marchait pas bien dans certains cas. C'est corrig�.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>L'abonnement au flux RSS ne marchait pas bien dans certains cas. C'est corrig�.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte7')">Version 2.7</a></h3>
			</div>
			<div class="panel-body"><span id="texte7" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Un nouveau bouton a �t� ajout�. Il permet de voir tous les d�tails des modules dans lesquels on intervient. Pour le faire apparaitre, il faut absolument utiliser le login et le mot de passe perso.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte6')">Version 2.6</a></h3>
			</div>
			<div class="panel-body"><span id="texte6" style="visibility: hidden; display: none;">
				<ul>
					<li>Ajout d'un mode d'emploi</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
						<li>Changement du design des s�ances.</li>
						<li>L'abonnement � l'agenda �lectronique est de nouveau disponible. Pour s'abonner, il faut cliquer sur le nom de la ressource dans la zone grise.</li>
						<li>Ajout d'une liste de pr�-tri des groupes d'�tudiants.</li>
						<li>Ajout d'une liste de pr�-tri des profs</li>
						<li>Ajout d'une liste de pr�-tri des profs</li>
						<li>Ajout d'une liste de pr�-tri des salles.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Changement du design des s�ances</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte5')">Version 2.5</a></h3>
			</div>
			<div class="panel-body"><span id="texte5" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interfaces profs, salles et multi-ressources :</strong></em></lh>
						<li>Les interfaces profs et salles sont remplac�es par l'interface multi-ressources qui s'appelle maintenant "planning des profs".</li>
				</ul>
				<ul>
					<lh><em><strong>Interface t�l�phones portables :</strong></em></lh>
						<li>Une interface optimis�e pour les t�l�phones portables a �t� ajout�e. Pour passer � la semaine suivante, il faut cliquer sur le tiers droit de l'image. Pour aller � la semaine pr�c�dente, il faut cliquer sur le tiers gauche de l'image.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte4')">Version 2.4</a></h3>
			</div>
			<div class="panel-body"><span id="texte4" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface multi-ressources :</strong></em></lh>
					<li>Une vue mensuelle a �t� ajout�e. Pour voir le d�tail des s�ances, il faut laisser la souris quelques secondes au-dessus de celles-ci.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte3')">Version 2.3</a></h3>
			</div>
			<div class="panel-body"><span id="texte3" style="visibility: hidden; display: none;">
				<ul>
					<li>Les emplois du temps de 2008-2009 et de 2009-2010 sont visibles sur la m�me interface web.</li>
				</ul>
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte2')">Version 2.2</a></h3>
			</div>
			<div class="panel-body"><span id="texte2" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>Les vacances scolaires et les p�riodes d'apprentissage apparaissent dans l'emploi du temps.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
					<li>Les vacances scolaires des profs apparaissent dans l'emploi du temps.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface multi-ressources :</strong></em></lh>
					<li>Les vacances scolaires des profs apparaissent dans l'emploi du temps.</li>
					<li>Les vacances scolaires et les p�riodes d'apprentissage des groupes apparaissent dans l'emploi du temps.</li>
					<li>On peut maintenant masquer r�servations pour voir le cours qu'il y a en dessous en cas de superposition.</li>
				</ul> 
			</span></div>
			
			<div class="panel-heading">
				<h3 class="panel-title"><a onClick="toggleVisibility('texte1')">Version 2.1</a></h3>
			</div>
			<div class="panel-body"><span id="texte1" style="visibility: hidden; display: none;">
				<ul>
					<lh><em><strong>Interface �tudiant :</strong></em></lh>
						<li>J'ai corrig� l'affichage des commentaires de s�ances qui d�passaient 2 lignes.</li>
					    <li>Le flux RSS est maintenant d�tect� par votre navigateur.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface prof :</strong></em></lh>
					<li>Les fichiers ics sont faits � partir des bases 08-09 et 09-10.</li>
					<li>J'ai ajout� le bouton "journ�e" dans l'ajout des rendez-vous perso.</li>
					<li>J'ai corrig� l'affichage des commentaires de s�ances qui d�passaient 2 lignes.</li>
					<li>Le flux RSS est maintenant d�tect� par votre navigateur.</li>
				</ul>
				<ul>
					<lh><em><strong>Interface salle :</strong></em></lh>
					<li>J'ai corrig� l'affichage des commentaires de s�ances qui d�passaient 2 lignes</li>
					<li>J'ai corrig� l'affichage des noms des r�servations qui d�passaient 2 lignes.</li>
					<li>On peut maintenant masquer r�servations pour voir le cours qu'il y a en dessous en cas de superposition..</li>
				</ul> 
				<ul>
					<lh><em><strong>Interface multi-ressources :</strong></em></lh>
					<li>j'ai r�duit la largeur (ou la hauteur pour la vue verticale) du rectangle des rendez-vous perso pour pouvoir voir s'il y a un cours en dessous.</li>
					<li>On peut maintenant masquer les rendez-vous perso pour voir le cours qu'il y a en dessous en cas de superposition..</li>
					<li>J'ai ajout� le bouton "journ�e" dans l'ajout des rendez-vous perso.</li>
					<li>J'ai corrig� l'affichage des noms des rdv perso qui d�passaient 2 lignes.</li>
					<li>J'ai corrig� l'affichage des commentaires de s�ances qui d�passaient 2 lignes.</li>
					<li>Affichage de son propre emploi du temps lorsqu'on vient juste de se loguer avec son login perso en multi ressources..</li>
					<li>Le flux RSS est maintenant d�tect� par votre navigateur..</li>
				</ul>  				
			</span></div>
		</div>
		
		{include file='template/include/footer.tpl'}
		
	</body>
</html>