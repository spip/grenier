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

if (!defined('_ECRIRE_INC_VERSION')) return;

// reaffichage du formulaire d'une option de configuration 
// apres sa modification par appel du script action/configurer 
// redirigeant ici.

// https://code.spip.net/@exec_configurer_dist
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
?>
