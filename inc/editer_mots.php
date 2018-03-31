<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2018                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined('_ECRIRE_INC_VERSION')) return;

include_spip('inc/actions');
include_spip('inc/mots');

// https://code.spip.net/@inc_editer_mots_dist
function inc_editer_mots_dist($type, $id, $cherche_mot, $select_groupe, $flag, $visible = false, $url_base='') {
	return
	recuperer_fond('prive/objets/editer/liens',array('table_source'=>'mots','objet'=>$type,'id_objet'=>$id));
}

?>
