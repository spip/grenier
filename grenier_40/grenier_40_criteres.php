<?php

if (!function_exists('critere_DATA_datasource_dist')) {
/**
 * Compile le critère {datasource} d'une boucle DATA
 *
 * Permet de déclarer le mode d'obtention des données dans une boucle DATA
 *
 * @removed from SPIP 4.0
 * @deprecated 3.1 Utiliser directement le critère {source}
 *
 * @param string $idb Identifiant de la boucle
 * @param array $boucles AST du squelette
 * @param Critere $crit Paramètres du critère dans cette boucle
 */
function critere_DATA_datasource_dist($idb, &$boucles, $crit) {
	$boucle = &$boucles[$idb];
	$boucle->hash .= '
	$command[\'source\'] = array(' . calculer_liste($crit->param[0], $idb, $boucles, $boucles[$idb]->id_parent) . ');
	$command[\'sourcemode\'] = ' . calculer_liste($crit->param[1], $idb, $boucles, $boucles[$idb]->id_parent) . ';';
}
}
