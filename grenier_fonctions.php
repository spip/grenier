<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2016                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}


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
