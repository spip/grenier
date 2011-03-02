<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2011                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/

if (!defined('_ECRIRE_INC_VERSION')) return;

define('_SIGNALER_ECHOS', true);
define('_INTERFACE_ONGLETS', false);

include_once(_ROOT_RESTREINT."inc/presentation.php");

// Faux HR, avec controle de couleur
// http://doc.spip.org/@hr
/*
function hr($color, $retour = false) {
	$ret = "\n<div style='height: 1px; margin-top: 5px; padding-top: 5px; border-top: 1px solid $color;'></div>";

	if ($retour) return $ret; else echo_log('hr',$ret);
}
*/
//
// Cadres
//
// http://doc.spip.org/@afficher_onglets_pages
function afficher_onglets_pages($ordre,$onglets){
	static $onglet_compteur = 0;
	$res = "";
	$corps = "";
	$cpt = 0;
	$actif = 0;
	// ordre des onglets
	foreach($ordre as $id => $label) {
		$cpt++;
		$disabled = strlen(trim($onglets[$id]))?"":" class='tabs-disabled'";
		if (!$actif && !$disabled) $actif = $cpt;
		$res .= "<li$disabled><a rel='$cpt' href='#$id'><span>" . $label . "</span></a></li>";
	}
	$res = "<ul class='tabs-nav'>$res</ul>";
	foreach((_INTERFACE_ONGLETS ? array_keys($ordre):array_keys($onglets)) as $id){
		$res .= "<div id='$id' class='tabs-container'>" . $onglets[$id] . "<br class='nettoyeur' /></div>";
	}
	$onglet_compteur++;
	return "<div class='boite_onglets' id='boite_onglet_$onglet_compteur'>$res</div>"
	. (_INTERFACE_ONGLETS ?
	   http_script("$('#boite_onglet_$onglet_compteur').tabs(".($actif?"$actif,":"")."{ fxAutoHeight: true });
	 if (!$.browser.safari)
	 $('ul.tabs-nav li').hover(
	 	function(){
	 		\$('#boite_onglet_$onglet_compteur').triggerTab(parseInt(\$(this).attr('rel')));
	 		return false;
	 	}
	 	,
	 	function(){}
	 	);")
	   :"");
}


// Voir en ligne, ou apercu, ou rien (renvoie tout le bloc)
// http://doc.spip.org/@voir_en_ligne
function voir_en_ligne ($type, $id, $statut=false, $image='racine-24.png', $af = true, $inline=true) {

	$en_ligne = $message = '';
	switch ($type) {
	case 'article':
			if ($statut == "publie" AND $GLOBALS['meta']["post_dates"] == 'non') {
				$n = sql_fetsel("id_article", "spip_articles", "id_article=$id AND date<=NOW()");
				if (!$n) $statut = 'prop';
			}
			if ($statut == 'publie')
				$en_ligne = 'calcul';
			else if ($statut == 'prop')
				$en_ligne = 'preview';
			break;
	case 'rubrique':
			if ($id > 0)
				if ($statut == 'publie')
					$en_ligne = 'calcul';
				else
					$en_ligne = 'preview';
			break;
	case 'breve':
	case 'site':
			if ($statut == 'publie')
				$en_ligne = 'calcul';
			else if ($statut == 'prop')
				$en_ligne = 'preview';
			break;
	case 'mot':
			$en_ligne = 'calcul';
			break;
	case 'auteur':
			$n = sql_fetsel('A.id_article', 'spip_auteurs_liens AS L LEFT JOIN spip_articles AS A ON (L.objet=\'article\' AND L.id_objet=A.id_article)', "A.statut='publie' AND L.id_auteur=".sql_quote($id));
			if ($n) $en_ligne = 'calcul';
			else $en_ligne = 'preview';
			break;
	default: return '';
	}

	if ($en_ligne == 'calcul')
		$message = _T('icone_voir_en_ligne');
	else if ($en_ligne == 'preview'
	AND autoriser('previsualiser'))
		$message = _T('previsualiser');
	else
		return '';

	$h = generer_url_action('redirect', "type=$type&id=$id&var_mode=$en_ligne");

	return $inline
	  ? icone_inline($message, $h, $image, "", $GLOBALS['spip_lang_left'])
	: icone_horizontale($message, $h, $image, "",$af);

}

// http://doc.spip.org/@icone_inline
function icone_inline($texte, $lien, $fond, $fonction="", $align="", $ajax=false, $javascript=''){
	// cas d'ajax_action_auteur: faut defaire le boulot
	// (il faudrait fusionner avec le cas $javascript)
	if (preg_match(",^<a\shref='([^']*)'([^>]*)>(.*)</a>$,i",$lien,$r)) {
		list($x,$lien,$atts,$texte)= $r;
		$javascript .= $atts;
	}

	// l'ajax de l'espace prive made in php
	if ($ajax)
		$javascript .= ' onclick=' . ajax_action_declencheur($lien,$ajax);

	return icone_base($lien, $texte, $fond, $fonction,"verticale $align",$javascript);
}


?>