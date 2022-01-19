<?php

if (!function_exists('modifier_contenu')) {
/**
 * Modifie un contenu
 *
 * Dépreciée :
 * Fonction générique pour l'API de modification de contenu
 *
 * @removed from SPIP 4.0
 * @deprecated
 * @param string $type
 *     Type d'objet
 * @param int $id
 *     Identifiant de l'objet
 * @param array $options
 *     Toutes les options
 * @param array|null $c
 *     Couples champ/valeur à modifier
 * @param string $serveur
 *     Nom du connecteur à la base de données
 * @return bool
 *     true si quelque chose est modifié correctement
 *     false sinon (erreur ou aucun champ modifié)
 */
function modifier_contenu($type, $id, $options, $c = null, $serveur = '') {
	$res = objet_modifier_champs($type, $id, $options, $c, $serveur);

	return ($res === '' ? true : false);
}
}

if (!function_exists('revision_objet')) {
/**
 * Crée une modification d'un objet
 *
 * Wrapper pour remplacer tous les obsoletes revision_xxx
 *
 * @removed from SPIP 4.0
 * @deprecated
 *     Utiliser objet_modifier();
 * @uses objet_modifier()
 *
 * @param string $objet
 *     Nom de l'objet
 * @param int $id_objet
 *     Identifiant de l'objet
 * @param array $c
 *     Couples des champs/valeurs modifiées
 * @return mixed|string
 */
function revision_objet($objet, $id_objet, $c = null) {
	$objet = objet_type($objet); // securite
	include_spip('action/editer_objet');

	return objet_modifier($objet, $id_objet, $c);
}
}

if (!function_exists('revisions_articles')) {
/**
 * Créer une révision d'un article
 *
 * @removed from SPIP 4.0
 * @deprecated 3.1 Utiliser article_modifier()
 * @see article_modifier()
 *
 * @param int $id_article
 *     Identifiant de l'article à modifier
 * @param array|null $c
 *     Couples (colonne => valeur) de données à modifier.
 *     En leur absence, on cherche les données dans les champs éditables
 *     qui ont été postés (via _request())
 * @return string|null
 *     Chaîne vide si aucune erreur,
 *     Null si aucun champ à modifier,
 *     Chaîne contenant un texte d'erreur sinon.
 */
function revisions_articles($id_article, $c = false) {
	return article_modifier($id_article, $c);
}
}

if (!function_exists('revision_article')) {
/**
 * Créer une révision d'un article
 *
 * @removed from SPIP 4.0
 * @deprecated 3.1 Utiliser article_modifier()
 * @see article_modifier()
 *
 * @param int $id_article
 *     Identifiant de l'article à modifier
 * @param array|null $c
 *     Couples (colonne => valeur) de données à modifier.
 *     En leur absence, on cherche les données dans les champs éditables
 *     qui ont été postés (via _request())
 * @return string|null
 *     Chaîne vide si aucune erreur,
 *     Null si aucun champ à modifier,
 *     Chaîne contenant un texte d'erreur sinon.
 */
function revision_article($id_article, $c = false) {
	return article_modifier($id_article, $c);
}
}

if (!function_exists('articles_set')) {
/**
 * Modifier un article
 *
 * @removed from SPIP 4.0
 * @deprecated 3.1 Utiliser article_modifier()
 * @see article_modifier()
 *
 * @param int $id_article
 *     Identifiant de l'article à modifier
 * @param array|null $set
 *     Couples (colonne => valeur) de données à modifier.
 *     En leur absence, on cherche les données dans les champs éditables
 *     qui ont été postés (via _request())
 * @return string|null
 *     Chaîne vide si aucune erreur,
 *     Null si aucun champ à modifier,
 *     Chaîne contenant un texte d'erreur sinon.
 */
function articles_set($id_article, $set = null) {
	return article_modifier($id_article, $set);
}
}

if (!function_exists('insert_article')) {
/**
 * Insertion d'un article dans une rubrique
 *
 * @removed from SPIP 4.0
 * @deprecated 3.1 Utiliser article_inserer()
 * @see article_inserer()
 *
 * @param int $id_rubrique
 *     Identifiant de la rubrique
 * @return int
 *     Identifiant du nouvel article
 */
function insert_article($id_rubrique) {
	return article_inserer($id_rubrique);
}
}

if (!function_exists('instituer_article')) {
/**
 * Instituer un article dans une rubrique
 *
 * @removed from SPIP 4.0
 * @deprecated 3.1 Utiliser article_instituer()
 * @see article_instituer()
 *
 * @param int $id_article
 *     Identifiant de l'article
 * @param array $c
 *     Couples (colonne => valeur) des données à instituer
 *     Les colonnes 'statut' et 'id_parent' sont liées, car un admin restreint
 *     peut deplacer un article publié vers une rubrique qu'il n'administre pas
 * @param bool $calcul_rub
 *     True pour changer le statut des rubriques concernées si un article
 *     change de statut ou est déplacé dans une autre rubrique
 * @return string
 *     Chaîne vide
 */
function instituer_article($id_article, $c, $calcul_rub = true) {
	return article_instituer($id_article, $c, $calcul_rub);
}
}



if (!function_exists('insert_auteur')) {
/**
 * Insertion d'un auteur
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser auteur_inserer()
 * @see auteur_inserer()
 *
 * @param string|null $source
 * @return int
 */
function insert_auteur($source = null) {
	return auteur_inserer($source);
}
}

if (!function_exists('auteurs_set')) {
/**
 * Modification d'un auteur
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser auteur_modifier()
 * @see auteur_modifier()
 *
 * @param int $id_auteur
 * @param array|null $set
 * @return string|null
 */
function auteurs_set($id_auteur, $set = null) {
	return auteur_modifier($id_auteur, $set);
}
}

if (!function_exists('instituer_auteur')) {
/**
 * Modifier le statut d'un auteur, ou son login/pass
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser auteur_instituer()
 * @see auteur_instituer()
 *
 * @param int $id_auteur
 * @param array $c
 * @param bool $force_webmestre
 * @return bool|string
 */
function instituer_auteur($id_auteur, $c, $force_webmestre = false) {
	return auteur_instituer($id_auteur, $c, $force_webmestre);
}
}

if (!function_exists('revision_auteur')) {
/**
 * Créer une révision d'un auteur
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser auteur_modifier()
 * @see auteur_modifier()
 *
 * @param int $id_auteur
 * @param array $c
 * @return string|null
 */
function revision_auteur($id_auteur, $c = false) {
	return auteur_modifier($id_auteur, $c);
}
}


if (!function_exists('auteur_referent')) {
/**
 * Ancien nommage pour compatibilité
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser auteur_associer()
 * @see auteur_associer()
 *
 * @param int $id_auteur
 * @param array $c
 * @return string
 */
function auteur_referent($id_auteur, $c) {
	return auteur_associer($id_auteur, $c);
}
}



if (!function_exists('insert_rubrique')) {
/**
 * Crée une rubrique
 *
 * @removed from SPIP 4.0
 * @deprecated
 *     Utiliser rubrique_inserer()
 * @see rubrique_inserer()
 *
 * @param int $id_parent
 *     Identifiant de la rubrique parente.
 *     0 pour la racine.
 * @return int
 *     Identifiant de la rubrique crée
 **/
function insert_rubrique($id_parent) {
	return rubrique_inserer($id_parent);
}
}

if (!function_exists('revisions_rubriques')) {
/**
 * Modifie les contenus d'une rubrique
 *
 * @removed from SPIP 4.0
 * @deprecated
 *     Utiliser rubrique_modifier()
 * @see rubrique_modifier()
 *
 * @param int $id_rubrique
 *     Identifiant de la rubrique à instituer
 * @param array|null $set
 *     Tableau qu'on peut proposer en lieu et place de _request()
 * @return bool|string
 *     - false  : Aucune modification, aucun champ n'est à modifier
 *     - chaîne vide : Vide si tout s'est bien passé
 *     - chaîne : Texte d'un message d'erreur
 **/
function revisions_rubriques($id_rubrique, $set = null) {
	return rubrique_modifier($id_rubrique, $set);
}
}

if (!function_exists('instituer_rubrique')) {
/**
 * Institue une rubrique (change son parent)
 *
 * @removed from SPIP 4.0
 * @deprecated
 *     Utiliser rubrique_instituer()
 * @see rubrique_instituer()
 *
 * @param int $id_rubrique
 *     Identifiant de la rubrique à instituer
 * @param array $c
 *     Informations pour l'institution (id_rubrique, confirme_deplace)
 * @return string
 *     Chaine vide : aucune erreur
 *     Chaîne : Texte du message d'erreur
 **/
function instituer_rubrique($id_rubrique, $c) {
	return rubrique_instituer($id_rubrique, $c);
}
}





// MEDIAS
// --------------------

if (!function_exists('insert_document')) {
/**
 * Insertion d'un document
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser document_inserer()
 * @see document_inserer()
 * @return int Identifiant du nouveau document
 */
function insert_document() {
	return document_inserer();
}
}

if (!function_exists('document_set')) {
/**
 * Modification d'un document
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser document_modifier()
 * @see document_modifier()
 * @param int $id_document Identifiant du document
 * @param array|bool $set
 */
function document_set($id_document, $set = false) {
	return document_modifier($id_document, $set);
}
}

if (!function_exists('instituer_document')) {
/**
 * Insituer un document
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser document_instituer()
 * @see document_instituer()
 * @param int $id_document Identifiant du document
 * @param array $champs
 */
function instituer_document($id_document, $champs = []) {
	return document_instituer($id_document, $champs);
}
}

if (!function_exists('revision_document')) {
/**
 * Réviser un document
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser document_modifier()
 * @see document_modifier()
 * @param int $id_document Identifiant du document
 * @param array $c
 */
function revision_document($id_document, $c = false) {
	return document_modifier($id_document, $c);
}
}

// MOTS

if (!function_exists('groupemots_inserer')) {
/**
 * Insertion d'un groupe de mots clés
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser groupe_mots_inserer() ou objet_inserer()
 * @see groupe_mots_inserer()
 *
 * @param string $table
 *     Tables sur lesquels des mots de ce groupe pourront être liés
 * @param null|array $set
 * @return int|bool
 *     Identifiant du nouveau groupe de mots clés.
 */
function groupemots_inserer($table = '', $set = null) {
	return groupe_mots_inserer($table, $set);
}
}

if (!function_exists('groupemots_modifier')) {
/**
 * Modifier un groupe de mot
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser groupe_mots_modifier() ou objet_modifier()
 * @see groupe_mots_modifier()
 *
 * @param int $id_groupe
 *     Identifiant du grope de mots clés à modifier
 * @param array|null $set
 *     Couples (colonne => valeur) de données à modifier.
 *     En leur absence, on cherche les données dans les champs éditables
 *     qui ont été postés
 * @return string|null
 *     Chaîne vide si aucune erreur,
 *     Null si aucun champ à modifier,
 *     Chaîne contenant un texte d'erreur sinon.
 */
function groupemots_modifier($id_groupe, $set = null) {
	return groupe_mots_modifier($id_groupe, $set);
}
}


if (!function_exists('insert_mot')) {
/**
 * Insertion d'un mot dans un groupe
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser mot_inserer()
 * @see mot_inserer()
 *
 * @param int $id_groupe
 *     Identifiant du groupe de mot
 * @return int|bool
 *     Identifiant du nouveau mot clé, false si erreur.
 */
function insert_mot($id_groupe) {
	return mot_inserer($id_groupe);
}
}

if (!function_exists('mots_set')) {
/**
 * Modifier un mot
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser mot_modifier()
 * @see mot_modifier()
 *
 * @param int $id_mot
 *     Identifiant du mot clé à modifier
 * @param array|null $set
 *     Couples (colonne => valeur) de données à modifier.
 *     En leur absence, on cherche les données dans les champs éditables
 *     qui ont été postés
 * @return string|null
 *     - Chaîne vide si aucune erreur,
 *     - Null si aucun champ à modifier,
 *     - Chaîne contenant un texte d'erreur sinon.
 */
function mots_set($id_mot, $set = null) {
	return mot_modifier($id_mot, $set);
}
}

if (!function_exists('revision_mot')) {
/**
 * Créer une révision d'un mot
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser mot_modifier()
 * @see mot_modifier()
 *
 * @param int $id_mot
 *     Identifiant du mot clé à modifier
 * @param array|null $c
 *     Couples (colonne => valeur) de données à modifier.
 *     En leur absence, on cherche les données dans les champs éditables
 *     qui ont été postés
 * @return string|null
 *     - Chaîne vide si aucune erreur,
 *     - Null si aucun champ à modifier,
 *     - Chaîne contenant un texte d'erreur sinon.
 */
function revision_mot($id_mot, $c = false) {
	return mot_modifier($id_mot, $c);
}
}



// Sites
// --------------------

if (!function_exists('insert_syndic')) {
/**
 * Insérer un site
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser site_inserer()
 * @uses site_inserer()
 *
 * @param int $id_rubrique
 * @return int
 **/
function insert_syndic($id_rubrique) {
	return site_inserer($id_rubrique);
}
}

if (!function_exists('syndic_set')) {
/**
 * Modifier un site
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser site_modifier()
 * @uses site_modifier()
 *
 * @param int $id_syndic
 * @param array|bool $set
 * @return string
 **/
function syndic_set($id_syndic, $set = false) {
	return site_modifier($id_syndic, $set);
}
}

if (!function_exists('revisions_sites')) {
/**
 * Créer une révision d'un site
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser site_modifier()
 * @uses site_modifier()
 *
 * @param int $id_syndic
 * @param array|bool $set
 * @return string
 **/
function revisions_sites($id_syndic, $set = false) {
	return site_modifier($id_syndic, $set);
}
}

if (!function_exists('instituer_syndic')) {
/**
 * Instituer un site
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser objet_instituer()
 * @uses objet_instituer()
 *
 * @param int $id_syndic
 * @param array $c
 * @param bool $calcul_rub
 * @return string
 **/
function instituer_syndic($id_syndic, $c, $calcul_rub = true) {
	include_spip('action/editer_objet');

	return objet_instituer('site', $id_syndic, $c, $calcul_rub);
}
}



// Brèves
// --------------------

if (!function_exists('insert_breve')) {
/**
 * Insertion d'une brève dans une rubrique
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser breve_inserer()
 * @see breve_inserer()
 *
 * @param int $id_rubrique
 *     Identifiant de la rubrique
 * @return int
 *     Identifiant de la nouvelle brève.
 */
function insert_breve($id_rubrique) {
	return breve_inserer($id_rubrique);
}
}

if (!function_exists('breve_modifier')) {
/**
 * Créer une révision de brève
 *
 * @removed from SPIP 4.0
 * @deprecated Utiliser breve_modifier()
 * @see breve_modifier()
 *
 * @param int $id_breve
 *     Identifiant de la brève à modifier
 * @param array|null $set
 *     Couples (colonne => valeur) de données à modifier.
 *     En leur absence, on cherche les données dans les champs éditables
 *     qui ont été postés (via _request())
 * @return string|null
 *     Chaîne vide si aucune erreur,
 *     Null si aucun champ à modifier,
 *     Chaîne contenant un texte d'erreur sinon.
 */
function revisions_breves($id_breve, $set = false) {
	return breve_modifier($id_breve, $set);
}
}



if (!function_exists('maj_version')) {
/**
 * Mise à jour des versions de SPIP < 1.926
 *
 * @removed from SPIP 4.0
 * @deprecated 3.1
 * @see maj_plugin() ou la globale `maj` pour le core.
 * @see maj_base()
 * @see https://core.spip.net/issues/4798
 *
 * @param float $version
 * @param bool $test
 * @return void
 **/
function maj_version($version, $test = true) {
	if ($test) {
		if ($version >= 1.922) {
			ecrire_meta('version_installee', $version, 'oui');
		} else {
			// on le fait manuellement, car ecrire_meta utilise le champs impt qui est absent sur les vieilles versions
			$GLOBALS['meta']['version_installee'] = $version;
			sql_updateq('spip_meta', ['valeur' => $version], 'nom=' . sql_quote('version_installee'));
		}
		spip_log("mise a jour de la base en $version", 'maj.' . _LOG_INFO_IMPORTANTE);
	} else {
		echo _T('alerte_maj_impossible', ['version' => $version]);
		exit;
	}
}
}

if (!function_exists('upgrade_vers')) {
/**
 * Teste de mise à jour des versions de SPIP < 1.926
 *
 * @removed from SPIP 4.0
 * @deprecated 3.1
 * @see maj_plugin() ou la globale `maj` pour le core.
 * @see maj_base()
 *
 * @param float $version
 * @param float $version_installee
 * @param int $version_cible
 * @return bool true si la mise à jour doit se réaliser
 **/
function upgrade_vers($version, $version_installee, $version_cible = 0) {
	return ($version_installee < $version
		and (($version_cible >= $version) or ($version_cible == 0))
	);
}
}

if (!function_exists('upgrade_types_documents')) {
/**
 * Mise à jour des types MIME de documents
 *
 * Fonction utilisé par les vieilles mises à jour de SPIP, à appeler dans
 * le tableau `$maj` quand on rajoute des types MIME. Remplacé actuellement
 * par le plugin Medias.
 *
 * @removed from SPIP 4.0
 * @deprecated 3.1
 * @see Utiliser directement `creer_base_types_doc()` du plugin Medias
 * @example
 *     ```
 *     $GLOBALS['maj'][1953] = array(array('upgrade_types_documents'));
 *
 *     ```
 * @uses creer_base_types_doc()
 *
 **/
function upgrade_types_documents() {
	if (
		include_spip('base/medias')
		and function_exists('creer_base_types_doc')
	) {
		creer_base_types_doc();
	}
}
}


if (!function_exists('spip_get_lock')) {
/**
 * Poser un verrou SQL local
 *
 * Changer de nom toutes les heures en cas de blocage MySQL (ca arrive)
 *
 * @removed from SPIP 4.0
 * @deprecated Pas d'équivalence actuellement en dehors de MySQL
 * @see spip_release_lock()
 *
 * @param string $nom
 *     Inutilisé. Le nom est calculé en fonction de la connexion principale
 * @param int $timeout
 * @return string|bool
 *     - Nom du verrou si réussite,
 *     - false sinon
 */
function spip_get_lock($nom, $timeout = 0) {

	define('_LOCK_TIME', intval(time() / 3600 - 316982));

	$connexion = &$GLOBALS['connexions'][0];
	$bd = $connexion['db'];
	$prefixe = $connexion['prefixe'];
	$nom = "$bd:$prefixe:$nom" . _LOCK_TIME;

	$connexion['last'] = $q = 'SELECT GET_LOCK(' . _q($nom) . ", $timeout) AS n";

	$q = @sql_fetch(mysqli_query(_mysql_link(), $q));
	if (!$q) {
		spip_log("pas de lock sql pour $nom", _LOG_ERREUR);
	}

	return $q['n'];
}
}


if (!function_exists('spip_release_lock')) {
/**
 * Relâcher un verrou SQL local
 *
 * @removed from SPIP 4.0
 * @deprecated Pas d'équivalence actuellement en dehors de MySQL
 * @see spip_get_lock()
 *
 * @param string $nom
 *     Inutilisé. Le nom est calculé en fonction de la connexion principale
 * @return string|bool
 *     True si réussite, false sinon.
 */
function spip_release_lock($nom) {

	$connexion = &$GLOBALS['connexions'][0];
	$bd = $connexion['db'];
	$prefixe = $connexion['prefixe'];
	$nom = "$bd:$prefixe:$nom" . _LOCK_TIME;

	$connexion['last'] = $q = 'SELECT RELEASE_LOCK(' . _q($nom) . ')';
	mysqli_query(_mysql_link(), $q);
}
}
