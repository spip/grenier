<?php


/**
 * Ancien marqueur de début de surlignement
 *
 * @see balise_DEBUT_SURLIGNE_dist()
 * @removed from SPIP 4.0
 * @deprecated 2.0 N'a plus d'effet
 **/
define('MARQUEUR_SURLIGNE', 'debut_surligneconditionnel');

/**
 * Ancien marqueur de fin de surlignement
 *
 * @see balise_FIN_SURLIGNE_dist()
 * @removed from SPIP 4.0
 * @deprecated 2.0 N'a plus d'effet
 **/
define('MARQUEUR_FSURLIGNE', 'finde_surligneconditionnel');


if (!function_exists('balise_DEBUT_SURLIGNE_dist')) {
/**
 * Compile la balise `#DEBUT_SURLIGNE` qui permettait le surlignage
 * des mots d'une recherche
 *
 * @note
 *     Cette balise n'a plus d'effet depuis r9343
 *
 * @balise
 * @see balise_FIN_SURLIGNE_dist()
 * @removed from SPIP 4.0
 * @deprecated 2.0 Utiliser les classes CSS `surlignable` ou `pas_surlignable`
 *
 * @param Champ $p
 *     Pile au niveau de la balise
 * @return Champ
 *     Pile complétée par le code à générer
 **/
function balise_DEBUT_SURLIGNE_dist($p) {
	include_spip('inc/surligne');
	$p->code = "'<!-- " . MARQUEUR_SURLIGNE . " -->'";

	return $p;
}
}



if (!function_exists('balise_FIN_SURLIGNE_dist')) {
/**
 * Compile la balise `#FIN_SURLIGNE` qui arrêtait le surlignage
 * des mots d'une recherche
 *
 * @note
 *     Cette balise n'a plus d'effet depuis r9343
 *
 * @balise
 * @see balise_DEBUT_SURLIGNE_dist()
 * @removed from SPIP 4.0
 * @deprecated Utiliser les classes CSS `surlignable` ou `pas_surlignable`
 *
 * @param Champ $p
 *     Pile au niveau de la balise
 * @return Champ
 *     Pile complétée par le code à générer
 **/
function balise_FIN_SURLIGNE_dist($p) {
	include_spip('inc/surligne');
	$p->code = "'<!-- " . MARQUEUR_FSURLIGNE . "-->'";

	return $p;
}
}


if (!function_exists('balise_NOOP_dist')) {
/**
 * Compile la balise `#NOOP`, alias (déprécié) de `#VAL`
 *
 * Alias pour regler #948. Ne plus utiliser.
 *
 * @balise
 * @removed from SPIP 4.0
 * @see balise_VAL_dist()
 * @deprecated 3.1 Utiliser #VAL
 *
 * @param Champ $p
 *     Pile au niveau de la balise
 * @return Champ
 *     Pile complétée par le code à générer
 **/
function balise_NOOP_dist($p) { return balise_VAL_dist($p); }
}
