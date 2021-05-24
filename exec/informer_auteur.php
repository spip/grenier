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

include_spip('inc/actions');

# Les informations d'une rubrique selectionnee dans le mini navigateur

/**
 * @removed from SPIP 3.0
 */
function exec_informer_auteur_dist()
{
	$id = intval(_request('id'));

	$informer_auteur = charger_fonction('informer_auteur', 'inc');
	ajax_retour($informer_auteur($id));
}
