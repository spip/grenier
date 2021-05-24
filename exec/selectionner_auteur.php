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
 * afficher un mini-navigateur de rubriques
 * 
 * @removed from SPIP 3.0
 */
function exec_selectionner_auteur_dist()
{
  	$id = intval(_request('id_article'));
	$type = _request('type');
	if (!preg_match(',^[a-z_]+$,', $type)) $type = 'article';
	$selectionner_auteur = charger_fonction('selectionner_auteur', 'inc');
	include_spip('inc/actions');
	ajax_retour($selectionner_auteur($id, $type));
}
