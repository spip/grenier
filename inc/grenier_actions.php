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