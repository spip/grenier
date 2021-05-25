<?php


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

if (!function_exists('echo_log')) {
/**
 * Affiche un code html (echo) et log l'affichage car cet echo est anormal !
 *
 * Signale une fonction qui devrait retourner un contenu mais effectue
 * un echo à la place pour compatibilité ascendante
 *
 * @removed from SPIP 4.0
 * @deprecated
 *     Utiliser des squelettes pour l'affichage !
 *
 * @param string $f
 *     Nom de la fonction
 * @param string $ret
 *     Code HTML à afficher
 * @return void
 **/
function echo_log($f, $ret) {
	spip_log("Page " . self() . " function $f: echo " . substr($ret, 0, 50) . "...", 'echo');
	echo(_SIGNALER_ECHOS ? "#Echo par $f#" : "") . $ret;
}
}


if (!function_exists('charger_php_extension')) {
/**
 * Teste la présence d’une extension PHP
 *
 * @removed from SPIP 4.0
 * @deprected 4.0 Utiliser directement la fonction native `extension_loaded($module)`
 * @example
 *     ```
 *     $ok = charger_php_extension('sqlite');
 *     ```
 * @param string $module Nom du module à charger
 * @return bool true si le module est chargé
 **/
function charger_php_extension($module) {
	if (extension_loaded($module)) {
		return true;
	}
	return false;
}
}

if (!function_exists('version_svn_courante')) {
/**
 * Retrouve un numéro de révision SVN d'un répertoire
 *
 * Mention de la révision SVN courante d'un répertoire
 * /!\ Retourne un nombre négatif si on est sur .svn
 *
 * @removed from SPIP 4.0
 * @deprecated 4.0 Utiliser version_vcs_courante()
 * @param string $dir Chemin du répertoire
 * @return int
 *
 *     - 0 si aucune info trouvée
 *     - -NN (entier) si info trouvée par .svn/wc.db
 *
 **/
function version_svn_courante($dir) {
	if ($desc = decrire_version_svn($dir)) {
		return -$desc['commit'];
	}
	return 0;
}
}


if (!function_exists('admin_repair_plat')) {
/**
 * Réparer les documents stockés dans des faux répertoires .plat
 *
 * @removed from SPIP 4.0
 * @deprecated 2.0 Les fichiers .plat ne sont plus utilisés. Cette fonction n'est plus appelée depuis r14292
 * @todo À supprimer ou déplacer dans le plugin Medias.
 *
 * @return string Description des changements de chemins des documents
 **/
function admin_repair_plat() {
	spip_log("verification des documents joints", _LOG_INFO_IMPORTANTE);
	$out = "";
	$repertoire = array();
	include_spip('inc/getdocument');
	$res = sql_select('*', 'spip_documents', "fichier REGEXP CONCAT('^',extension,'[^/\]') AND distant='non'");

	while ($row = sql_fetch($res)) {
		$ext = $row['extension'];
		if (!$ext) {
			spip_log("document sans extension: " . $row['id_document'], _LOG_INFO_IMPORTANTE);
			continue;
		}
		if (!isset($repertoire[$ext])) {
			if (@file_exists($plat = _DIR_IMG . $ext . ".plat")) {
				spip_unlink($plat);
			}
			$repertoire[$ext] = creer_repertoire_documents($ext);
			if (preg_match(',_$,', $repertoire[$ext])) {
				$repertoire[$ext] = false;
			}
		}
		if ($d = $repertoire[$ext]) {
			$d = substr($d, strlen(_DIR_IMG));
			$src = $row['fichier'];
			$dest = $d . substr($src, strlen($d));
			if (@copy(_DIR_IMG . $src, _DIR_IMG . $dest)
				and file_exists(_DIR_IMG . $dest)
			) {
				sql_updateq('spip_documents', array('fichier' => $dest), 'id_document=' . intval($row['id_document']));
				spip_unlink(_DIR_IMG . $src);
				$out .= "$src => $dest<br />";
			}
		}
	}

	return $out;
}
}