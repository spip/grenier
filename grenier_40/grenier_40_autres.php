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


if (!function_exists('afficher_documents_colonne')) {
/**
 * Afficher un document dans la colonne de gauche
 *
 * @removed from SPIP 4.0
 * @deprecated
 *     Utiliser l'inclusion prévue ou une véritable
 *     déclaration d'objet éditorial (la colonne document
 *     est alors affichée automatiquement sur la page d'édition de l'objet)
 *
 * @param int $id
 *     Identifiant de l'objet, ou id_auteur négatif pour un nouvel objet
 * @param string $type
 *     Type d'objet
 * @param null $script
 *     ??
 * @return string
 *     Code HTML permettant de gérer des documents
 */
function afficher_documents_colonne($id, $type = 'article', $script = null) {
	return recuperer_fond('prive/objets/editer/colonne_document', array('objet' => $type, 'id_objet' => $id));
}
}

if (!function_exists('lien_objet')) {
/**
 * Pour compat uniquement, utiliser generer_lien_entite
 *
 * @removed from SPIP 4.0
 * @deprecated
 * @uses generer_lien_entite()
 *
 * @param int $id
 * @param string $type
 * @param int $longueur
 * @param null $connect
 * @return string
 */
function lien_objet($id, $type, $longueur = 80, $connect = null) {
	return generer_lien_entite($id, $type, $longueur, $connect);
}
}


if (!function_exists('sha256')) {
	/**
	 * Calcul du SHA256
	 *
	 * 2009-07-23: Added check for function as the Suhosin plugin adds this routine.
	 * 
	 * @removed from SPIP 4.0
	 * @param string $str Chaîne dont on veut calculer le SHA
	 * @param bool $ig_func
	 * @return string Le SHA de la chaîne
	 * @deprecated
	 */
	function sha256($str, $ig_func = true) { return spip_sha256($str); }
}



if (!function_exists('table_jointure')) {
/**
 * Récupérer le nom de la table de jointure `xxxx` sur l'objet `yyyy`
 *
 * @removed from SPIP 4.0
 * @deprecated
 *     Utiliser l'API editer_liens ou les tables de liaisons spip_xx_liens
 *     ou spip_yy_liens selon.
 *
 * @param string $x Table de destination
 * @param string $y Objet source
 * @return array|string
 *     - array : Description de la table de jointure si connue
 *     - chaîne vide si non trouvé.
 **/
function table_jointure($x, $y) {
	$trouver_table = charger_fonction('trouver_table', 'base');
	$xdesc = $trouver_table(table_objet($x));
	$ydesc = $trouver_table(table_objet($y));
	$ix = @$xdesc['key']["PRIMARY KEY"];
	$iy = @$ydesc['key']["PRIMARY KEY"];
	if ($table = $ydesc['tables_jointures'][$ix]) {
		return $table;
	}
	if ($table = $xdesc['tables_jointures'][$iy]) {
		return $table;
	}

	return '';
}
}


if (!function_exists('notifier_publication_article')) {
/**
 * Notifier la publication d'un article
 *
 * @removed from SPIP 4.0
 * @deprecated Ne plus utiliser
 * @param int $id_article
 **/
function notifier_publication_article($id_article) {
	if ($GLOBALS['meta']["suivi_edito"] == "oui") {
		$adresse_suivi = $GLOBALS['meta']["adresse_suivi"];
		$texte = email_notification_article($id_article, "notifications/article_publie");
		notifications_envoyer_mails($adresse_suivi, $texte);
	}
}
}

if (!function_exists('notifier_proposition_article')) {
/**
 * Notifier la proposition d'un article
 *
 * @removed from SPIP 4.0
 * @deprecated Ne plus utiliser
 * @param int $id_article
 **/
function notifier_proposition_article($id_article) {
	if ($GLOBALS['meta']["suivi_edito"] == "oui") {
		$adresse_suivi = $GLOBALS['meta']["adresse_suivi"];
		$texte = email_notification_article($id_article, "notifications/article_propose");
		notifications_envoyer_mails($adresse_suivi, $texte);
	}
}
}


if (!function_exists('calcul_branche')) {
/**
 * Calcule une branche de rubriques
 *
 * Dépréciée, pour compatibilité
 *
 * @removed from SPIP 4.0
 * @deprecated
 * @see calcul_branche_in()
 *
 * @param string|int|array $generation
 * @return string
 */
function calcul_branche($generation) { return calcul_branche_in($generation); }
}

if (!function_exists('ecrire_metas')) {
/**
 * ecrire_metas : fonction dépréciée
 *
 * @removed from SPIP 4.0
 * @deprecated
 **/
function ecrire_metas() { }
}


if (!function_exists('spip_query_db')) {
/**
 * Exécute une requête Mysql (obsolète, ne plus utiliser)
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser sql_query() ou autres
 *
 * @param string $query Requête
 * @param string $serveur Nom de la connexion
 * @param bool $requeter Exécuter la requête, sinon la retourner
 * @return Resource        Ressource pour fetch()
 **/
function spip_query_db($query, $serveur = '', $requeter = true) {
	return spip_mysql_query($query, $serveur, $requeter);
}
}