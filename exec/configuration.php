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

// reaffichage du formulaire d'une option de configuration 
// apres sa modification par appel du script action/configurer 
// redirigeant ici.

/**
 * @removed from SPIP 3.0
 */
function exec_configuration_dist()
{
	if(!autoriser('configurer', '_'._request('configuration'))) {
		include_spip('inc/minipres');
		echo minipres(_T('info_acces_interdit'));
		exit;
	}
	include_spip('inc/actions');
	$configuration = charger_fonction(_request('configuration'), 'configuration', true);
	ajax_retour($configuration ? $configuration() : 'configure quoi?');
}
