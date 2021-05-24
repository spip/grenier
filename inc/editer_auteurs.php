<?php

/***************************************************************************\
 *  SPIP, Système de publication pour l'internet                           *
 *                                                                         *
 *  Copyright © avec tendresse depuis 2001                                 *
 *  Arnaud Martin, Antoine Pitrou, Philippe Rivière, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribué sous licence GNU/GPL.     *
 *  Pour plus de détails voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined('_ECRIRE_INC_VERSION')) return;

/**
 * File removed
 * 
 * @removed from SPIP 3.0
 */

include_spip('inc/presentation');
include_spip('inc/actions');

// L'ajout d'un auteur se fait par mini-navigateur dans la fourchette:
define('_SPIP_SELECT_MIN_AUTEURS', 30); // en dessous: balise Select
define('_SPIP_SELECT_MAX_AUTEURS', 30); // au-dessus: saisie + return

// https://code.spip.net/@inc_editer_auteurs_dist
function inc_editer_auteurs_dist($type, $id, $flag, $cherche_auteur, $ids, $titre_boite = null, $script_edit_objet = null) {
	return
	recuperer_fond('prive/objets/editer/liens', array('table_source' => 'auteurs', 'objet' => $type, 'id_objet' => $id));
}
