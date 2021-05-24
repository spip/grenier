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

// https://code.spip.net/@inc_meme_rubrique_dist
function inc_meme_rubrique_dist($id_rubrique, $id, $type, $order = '') {

	$table = table_objet($type);
	$primary = id_table_objet($type);

	$lister_objets = charger_fonction('lister_objets', 'inc');
	$contexte = array('id_rubrique' => $id_rubrique,'where' => "$primary!=".intval($id));

	if ($GLOBALS['visiteur_session']['statut'] !== '0minirezo')
		$contexte['statut'] = array('publie','prop');

	if ($order)
		$contexte['par'] = $order;
	elseif ($type == 'article' and defined('_TRI_ARTICLES_RUBRIQUE'))
		$contexte['par'] = _TRI_ARTICLES_RUBRIQUE;

	$contexte['titre'] = _T('info_meme_rubrique');
	return $lister_objets($table, $contexte);

}
