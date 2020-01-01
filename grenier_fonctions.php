<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2020                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

include_spip('inc/presentation');

/**
 * Filtres d'images
 * Nommages maintenus pour compatibilite.
 */
if (!function_exists('extraire_image_couleur')) {
	/**
	 * Extraire une couleur d'une image
	 *
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
	 * @deprecated utiliser boite_ouvrir()
	 */
	function debut_cadre_couleur_foncee($icone = '', $dummy = '', $fonction = '', $titre = '', $id = "", $class = "") {
		include_spip('inc/presentation');
		return debut_cadre_grenier('couleur-foncee', $icone, $fonction, $titre, $id, $class);
	}
}

if (!function_exists('fin_cadre_couleur_foncee')) {
	/**
	 * Ferme un cadre foncé
	 * @deprecated utiliser boite_fermer()
	 */
	function fin_cadre_couleur_foncee() { 
		return fin_cadre_grenier('couleur-foncee'); 
	}
}



/**
 * Ouvre un cadre.
 * Copie de debut_cadre() pour historique
 */
function debut_cadre_grenier($style, $icone = "", $fonction = "", $titre = "", $id = "", $class = "", $padding = true) {
	$style_mapping = array(
		'r' => 'simple',
		'e' => 'raccourcis',
		'couleur' => 'basic highlight',
		'couleur-foncee' => 'basic highlight',
		'trait-couleur' => 'important',
		'alerte' => 'notice',
		'info' => 'info',
		'sous_rub' => 'simple sous-rub'
	);
	$style_titre_mapping = array('couleur' => 'topper', 'trait-couleur' => 'section');
	$c = isset($style_mapping[$style]) ? $style_mapping[$style] : 'simple';
	$class = $c . ($class ? " $class" : "");
	if (!$padding) {
		$class .= ($class ? " " : "") . "no-padding";
	}

	//($id?"id='$id' ":"")
	if (strlen($icone) > 1) {
		if ($icone_renommer = charger_fonction('icone_renommer', 'inc', true)) {
			list($fond, $fonction) = $icone_renommer($icone, $fonction);
		}
		$size = 24;
		if (preg_match("/-([0-9]{1,3})[.](gif|png)$/i", $fond, $match)) {
			$size = $match[1];
		}
		if ($fonction) {
			// 2 images pour composer l'icone : le fond (article) en background,
			// la fonction (new) en image
			$icone = http_img_pack($fonction, "", "class='cadre-icone' width='$size' height='$size'\n" .
				http_style_background($fond, "no-repeat center center"));
		} else {
			$icone = http_img_pack($fond, "", "class='cadre-icone' width='$size' height='$size'");
		}
		$titre = $icone . $titre;
	}

	return boite_ouvrir($titre, $class, isset($style_titre_mapping[$style]) ? $style_titre_mapping[$style] : '', $id);
}

/**
 * Ferme un cadre.
 * Copie de fin_cadre() pour historique
 */
function fin_cadre_grenier() { 
	return boite_fermer(); 
}


if (!function_exists('aligner')) {
	/**
	 * Alignements en HTML (Old-style, préférer CSS)
	 *
	 * Cette fonction ne crée pas de paragraphe
	 *
	 * @deprecated Utiliser CSS
	 * @param string $letexte
	 * @param string $justif
	 * @return string
	 */
	function aligner($letexte, $justif = '') {
		$letexte = trim($letexte);
		if (!strlen($letexte)) {
			return '';
		}

		// Paragrapher rapidement
		$letexte = "<div style='text-align:$justif'>"
			. $letexte
			. "</div>";

		return $letexte;
	}
}

if (!function_exists('justifier')) {
	/**
	 * Justifie en HTML (Old-style, préférer CSS)
	 *
	 * @deprecated Utiliser CSS
	 * @uses aligner()
	 * @param string $letexte
	 * @return string
	 */
	function justifier($letexte) { 
		return aligner($letexte, 'justify'); 
	}
}

if (!function_exists('aligner_droite')) {
	/**
	 * Aligne à droite en HTML (Old-style, préférer CSS)
	 *
	 * @deprecated Utiliser CSS
	 * @uses aligner()
	 * @param string $letexte
	 * @return string
	 */
	function aligner_droite($letexte) { return aligner($letexte, 'right'); }
}

if (!function_exists('aligner_gauche')) {
	/**
	 * Aligne à gauche en HTML (Old-style, préférer CSS)
	 *
	 * @deprecated Utiliser CSS
	 * @uses aligner()
	 * @param string $letexte
	 * @return string
	 */
	function aligner_gauche($letexte) { 
		return aligner($letexte, 'left'); 
	}
}

if (!function_exists('centrer')) {
	/**
	 * Centre en HTML (Old-style, préférer CSS)
	 *
	 * @deprecated Utiliser CSS
	 * @uses aligner()
	 * @param string $letexte
	 * @return string
	 */
	function centrer($letexte) { 
		return aligner($letexte, 'center'); 
	}
}

if (!function_exists('style_align')) {
	/**
	 * Retourne un texte de style CSS aligné sur la langue en cours
	 *
	 * @deprecated
	 * @param mixed $bof Inutilisé
	 * @return string Style CSS
	 **/
	function style_align($bof) {
		return "text-align: " . $GLOBALS['spip_lang_left'];
	}
}
