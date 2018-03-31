<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2018                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined('_ECRIRE_INC_VERSION')) return;

include_once _ROOT_RESTREINT . "inc/actions.php";

// Retourne un formulaire d'execution de $action sur $id,
// revenant a l'envoyeur $script d'arguments $args.
// Utilise Ajax si dispo, en ecrivant le resultat dans le innerHTML du noeud
// d'attribut  id = $action-$id (cf. AjaxSqueeze dans layer.js)

// https://code.spip.net/@ajax_action_auteur
function ajax_action_auteur($action, $id, $script, $args='', $corps=false, $args_ajax='', $fct_ajax='')
{
	if (strpos($args,"#")===FALSE)
		$ancre = "$action-" . intval($id);
	else {
		$ancre = explode("#",$args);
		$args = $ancre[0];
		$ancre = $ancre[1];
	}

	// Formulaire (POST)
	// methodes traditionnelle et ajax a unifier...
	if (is_string($corps)) {

		// Methode traditionnelle
		if (_SPIP_AJAX !== 1) {
			return redirige_action_post($action,
				$id,
				$script,
				"$args#$ancre",
				$corps);
		}

		// Methode Ajax
		else {
			if ($args AND !$args_ajax) $args_ajax = "&$args";
			if (isset($_GET['var_profile']))
				$args_ajax .= '&var_profile=1';
			return redirige_action_post($action,
				$id,
				$action,
				"script=$script$args_ajax",
				$corps,
				(" onsubmit="
				 . ajax_action_declencheur('this', $ancre, $fct_ajax)));

		}
	}

	// Lien (GET)
	else {
		$href = redirige_action_auteur($action,
			$id,
			$script,
			"$args#$ancre",
			false);

		if ($args AND !$args_ajax) $args_ajax = "&$args";
		if (isset($_GET['var_profile']))
			$args_ajax .= '&var_profile=1';

		$ajax = redirige_action_auteur($action,
			$id,
			$action,
			"script=$script$args_ajax");

		$cli = array_shift($corps);
		return "<a href='$href'\nonclick="
		.  ajax_action_declencheur($ajax, $ancre, $fct_ajax)
		. ">"
		. (!$corps ?  $cli : ("\n<span" . $corps[0] . ">$cli</span>"))
		. "</a>";
	}
}


// Comme ci-dessus, mais reduit au cas POST et on fournit le bouton Submit.
//
// https://code.spip.net/@ajax_action_post
function ajax_action_post($action, $arg, $retour, $gra, $corps, $clic='', $atts_i='', $atts_span = "", $args_ajax='')
{
	global $spip_lang_right;

	if (strpos($gra,"#")===FALSE) {
	  // A etudier: prendre systematiquement arg en trancodant les \W
		$n = intval($arg);
		$ancre = "$action-" . ($n ? $n : $arg);
	} else {
		$ancre = explode("#",$gra);
		$args = $ancre[0];
		$ancre = $ancre[1];
	}

	if (!$atts_i)
		$atts_i = " class='fondo' style='float: $spip_lang_right'";

	if (is_array($clic)) {
		$submit = "";
		$atts_i .= "\nonclick='AjaxNamedSubmit(this)'";
		foreach($clic as $n => $c)
		  $submit .= "\n<input type='submit' name='$n' value='$c' $atts_i />";
	} else {
		if (!$clic)  $clic =  _T('bouton_valider');
		$submit = "<input type='submit' value='$clic' $atts_i />";
	}
	$corps = "<div>"
	  . $corps
	  . "<span"
	  . $atts_span
	  . ">"
	  . $submit
	  . "</span></div>";

	if (_SPIP_AJAX !== 1) {
		return redirige_action_post($action, $arg, $retour,
					($gra . '#' . $ancre),
				        $corps);
	} else {

		if ($gra AND !$args_ajax) $args_ajax = "&$gra";
		if (isset($GLOBALS['var_profile']))
			$args_ajax .= '&var_profile=1';

		return redirige_action_post($action,
			$arg,
			$action,
			"script=$retour$args_ajax",
			$corps,
			" onsubmit=" . ajax_action_declencheur('this', $ancre));
	}
}


//
// Attention pour que Safari puisse manipuler cet evenement
// il faut onsubmit="return AjaxSqueeze(x,'truc',...)"
// et non pas onsubmit='return AjaxSqueeze(x,"truc",...)'
//
// https://code.spip.net/@ajax_action_declencheur
function ajax_action_declencheur($request, $noeud, $fct_ajax='') {
	if (strpos($request, 'this') !== 0)
		$request = "'".$request."'";

	return '"return AjaxSqueeze('
	. $request
	. ",'"
	. $noeud
	. "',"
	  . ($fct_ajax ? $fct_ajax : "''")
	. ',event)"';
}



// Place un element HTML dans une div nommee,
// sauf si c'est un appel Ajax car alors la div y est deja
// $fonction : denomination semantique du bloc, que l'on retouve en attribut class
// $id : id de l'objet concerne si il y a lieu ou "", sert a construire un identifiant unique au bloc ("fonction-id")
// https://code.spip.net/@ajax_action_greffe
function ajax_action_greffe($fonction, $id, $corps)
{
	$idom = $fonction.(strlen($id)?"-$id":"");
	return _AJAX
		? "$corps"
		: "\n<div id='$idom' class='ajax-action $fonction'>$corps\n</div>\n";
}
