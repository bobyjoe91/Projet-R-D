
			// M�thode pour changer la visiblit� d'une balise dont l'ID est pass�e en param�tre
			function toggleVisibility(tagId) {
			if (!document.getElementById) {
			msg = 'Votre navigateur est trop ancien pour profiter de votre visite\n';
			msg += 'Veuillez le mettre � jour ou vous en procurer un autre';
			return false;
			}
			var tagToToggle;
			try { // On tente de r�cup�rer la balise cible dont on doit changer la visibilit�
			tagToToggle = document.getElementById(tagId);
			} catch (e) { // Si �chec de la r�cup�ration de la balise cible
			alert('Je n\'ai pas pu trouver la balise cible');
			}
			try { // Seulement pour les non IE
			if (tagToToggle.style.display == 'none') {
			tagToToggle.style.display = 'inline';
			} else {
			tagToToggle.style.display = 'none';
			}
			} catch (e) {
			}
			// Pour IE
			if (tagToToggle.style.visibility == 'hidden') {
			tagToToggle.style.visibility = 'visible';
			} else {
			tagToToggle.style.visibility = 'hidden';
			}
			}
