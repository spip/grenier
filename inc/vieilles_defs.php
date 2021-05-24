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

/* 
 * Ce fichier contient des fonctions, globales ou constantes
 * qui ont fait partie des fichiers de configurations de Spip
 * mais en ont ete retires ensuite.
 * Ce fichier n'est donc jamais charge par la presente version
 * mais est present pour que les contributions a Spip puissent
 * fonctionner en chargeant ce fichier, en attendant d'etre
 * reecrites conformement a la nouvelle interface.
 */


// SPIP < 4.0
if (!function_exists('generer_url_retour')) {
	/**
	 * Permet d'ajouter lien vers une page privée à un paramètre d'url (déprécié)
	 *
	 *     ```
	 *     // deprecié
	 *     $h = generer_url_ecrire('article', "id_article=$id_article&redirect=" . generer_url_retour('articles'));
	 *     // utiliser
	 *     $h = generer_url_ecrire('article');
	 *     $h = parametre_url($h, 'id_article', $id_article);
	 *     $h = parametre_url($h, 'redirect', generer_url_ecrire('articles'));
	 *     ```
	 *
	 * @removed from SPIP 4.0
	 * @deprecated 3.2 Utiliser parametre_url() et generer_url_ecrire()
	 * @see parametre_url()
	 * @see generer_url_ecrire()
	 *
	 * @param string $script
	 * @param string $args
	 * @return string
	 */
	function generer_url_retour($script, $args = "") {
		return rawurlencode(generer_url_ecrire($script, $args, true, true));
	}
}


if (!function_exists('spip_fetch_array')) {
	/**
	 * Retourne une ligne d'un résultat de requête mysql (déprécié)
	 *
	 * @removed from SPIP 4.0
	 * @see sql_fetch()
	 * @deprecated 2.0 Utiliser sql_fetch()
	 * @param Ressource $r Ressource mysql
	 * @param int|null $t Type de retour
	 * @return array|void|bool Tableau de la ligne SQL
	 **/
	function spip_fetch_array($r, $t = null) {
		if (!isset($t)) {
			if ($r) {
				return sql_fetch($r);
			}
		} else {
			if ($t == 'SPIP_NUM') {
				$t = MYSQLI_NUM;
			}
			if ($t == 'SPIP_BOTH') {
				$t = MYSQLI_BOTH;
			}
			if ($t == 'SPIP_ASSOC') {
				$t = MYSQLI_ASSOC;
			}
			spip_log("appel deprecie de spip_fetch_array(..., $t)", 'vieilles_defs');
			if ($r) {
				return mysqli_fetch_array($r, $t);
			}
		}
	}

}
