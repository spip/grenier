<?php


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
function instituer_document($id_document, $champs = array()) {
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

