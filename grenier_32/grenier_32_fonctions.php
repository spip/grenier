<?php

include_spip('inc/presentation');

/**
 * Filtres d'images
 * Nommages maintenus pour compatibilite.
 */
if (!function_exists('extraire_image_couleur')) {
	/**
	 * Extraire une couleur d'une image
	 *
	 * @removed from SPIP 3.2 (Filtres Images)
	 * @param string $img
	 * @param int $x
	 * @param int $y
	 * @return string
	 */
	function extraire_image_couleur($img, $x = 10, $y = 6) {
		include_spip('filtres/images_lib');
		return _image_couleur_extraire($img, $x, $y);
	}
}

/**
 * Vieilles fonctions d'affichage
 */
if (!function_exists('afficher_plus')) {
	/**
	 * Afficher un petit "i" pour lien vers autre page
	 *
	 * @removed from SPIP 3.2
	 * @deprecated utiliser `afficher_plus_info()`
	 * @uses afficher_plus_info()
	 * @param string $lien
	 *    URL du lien desire
	 *
	 * @return string
	 */
	function afficher_plus($lien) {
		include_spip('inc/filtres_ecrire');
		afficher_plus_info($lien);
	}
}


if (!function_exists('debut_cadre_couleur_foncee')) {
	/**
	 * Ouvre un cadre foncé
	 *
	 * @removed from SPIP 3.2
	 * @deprecated utiliser boite_ouvrir()
	 */
	function debut_cadre_couleur_foncee($icone = '', $dummy = '', $fonction = '', $titre = '', $id = '', $class = '') {
		include_spip('inc/presentation');
		return debut_cadre_grenier('couleur-foncee', $icone, $fonction, $titre, $id, $class);
	}
}

if (!function_exists('fin_cadre_couleur_foncee')) {
	/**
	 * Ferme un cadre foncé
	 *
	 * @removed from SPIP 3.2
	 * @deprecated utiliser boite_fermer()
	 */
	function fin_cadre_couleur_foncee() {
		return fin_cadre_grenier();
	}
}



/**
 * Ouvre un cadre.
 * Copie de debut_cadre() pour historique
 *
 * @removed from SPIP 3.2
 */
function debut_cadre_grenier($style, $icone = '', $fonction = '', $titre = '', $id = '', $class = '', $padding = true) {
	$fond = null;
	$style_mapping = [
		'r' => 'simple',
		'e' => 'raccourcis',
		'couleur' => 'basic highlight',
		'couleur-foncee' => 'basic highlight',
		'trait-couleur' => 'important',
		'alerte' => 'notice',
		'info' => 'info',
		'sous_rub' => 'simple sous-rub'
	];
	$style_titre_mapping = ['couleur' => 'topper', 'trait-couleur' => 'section'];
	$c = $style_mapping[$style] ?? 'simple';
	$class = $c . ($class ? " $class" : '');
	if (!$padding) {
		$class .= ($class ? ' ' : '') . 'no-padding';
	}

	//($id?"id='$id' ":"")
	if (strlen($icone) > 1) {
		if ($icone_renommer = charger_fonction('icone_renommer', 'inc', true)) {
			[$fond, $fonction] = $icone_renommer($icone, $fonction);
		}
		$size = 24;
		if (preg_match('/-([0-9]{1,3})[.](gif|png)$/i', $fond, $match)) {
			$size = $match[1];
		}
		if ($fonction) {
			// 2 images pour composer l'icone : le fond (article) en background,
			// la fonction (new) en image
			$icone = http_img_pack($fonction, '', "class='cadre-icone' width='$size' height='$size'\n" .
				http_style_background($fond, 'no-repeat center center'));
		} else {
			$icone = http_img_pack($fond, '', "class='cadre-icone' width='$size' height='$size'");
		}
		$titre = $icone . $titre;
	}

	return boite_ouvrir($titre, $class, $style_titre_mapping[$style] ?? '', $id);
}

/**
 * Ferme un cadre.
 * Copie de fin_cadre() pour historique
 *
 * @removed from SPIP 3.2
 */
function fin_cadre_grenier() {
	return boite_fermer();
}
