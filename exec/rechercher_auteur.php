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

# gerer un charset minimaliste en convertissant tout en unicode &#xxx;

/**
 * @removed from SPIP 3.0
 */
function exec_rechercher_auteur_dist()
{
	exec_rechercher_auteur_args(_request('idom'));
}

/**
 * @removed from SPIP 3.0
 */
function exec_rechercher_auteur_args($idom)
{
	if (!preg_match('/\w+/', $idom))
	      {
		include_spip('inc/minipres');
		echo minipres();
	      } else {
		include_spip('inc/actions');
		$where = preg_split(",\s+,", _request('nom'));
		if ($where) {
		  foreach ($where as $k => $v)
			$where[$k] = "'%" . substr(str_replace("%", "\%", sql_quote($v)), 1, -1) . "%'";
		  $where = ("(nom LIKE " . join(" AND nom LIKE ", $where) . ")");
		}
		include_spip('inc/selectionner_auteur');
		ajax_retour(selectionner_auteur_boucle($where, $idom));
	}
}
