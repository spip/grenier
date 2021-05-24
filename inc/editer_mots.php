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

include_spip('inc/actions');
include_spip('inc/mots');

// https://code.spip.net/@inc_editer_mots_dist
function inc_editer_mots_dist($type, $id, $cherche_mot, $select_groupe, $flag, $visible = false, $url_base = '') {
	return
	recuperer_fond('prive/objets/editer/liens', array('table_source' => 'mots', 'objet' => $type, 'id_objet' => $id));
}
