<?php

if (!function_exists('aligner')) {
	/**
	 * Alignements en HTML (Old-style, préférer CSS)
	 *
	 * Cette fonction ne crée pas de paragraphe
	 *
	 * @removed from SPIP 4.0
	 * @deprecated Utiliser CSS
	 * @param string $letexte
	 * @param string $justif
	 * @return string
	 */
	function aligner($letexte, $justif = '') {
		$letexte = trim($letexte);
		if (!strlen($letexte)) {
			return '';
		}

		// Paragrapher rapidement
		$letexte = "<div style='text-align:$justif'>"
			. $letexte
			. '</div>';

		return $letexte;
	}
}

if (!function_exists('justifier')) {
	/**
	 * Justifie en HTML (Old-style, préférer CSS)
	 *
	 * @removed from SPIP 4.0
	 * @deprecated Utiliser CSS
	 * @uses aligner()
	 * @param string $letexte
	 * @return string
	 */
	function justifier($letexte) {
		return aligner($letexte, 'justify');
	}
}

if (!function_exists('aligner_droite')) {
	/**
	 * Aligne à droite en HTML (Old-style, préférer CSS)
	 *
	 * @removed from SPIP 4.0
	 * @deprecated Utiliser CSS
	 * @uses aligner()
	 * @param string $letexte
	 * @return string
	 */
	function aligner_droite($letexte) {
 		return aligner($letexte, 'right');
	}
}

if (!function_exists('aligner_gauche')) {
	/**
	 * Aligne à gauche en HTML (Old-style, préférer CSS)
	 *
	 * @removed from SPIP 4.0
	 * @deprecated Utiliser CSS
	 * @uses aligner()
	 * @param string $letexte
	 * @return string
	 */
	function aligner_gauche($letexte) {
		return aligner($letexte, 'left');
	}
}

if (!function_exists('centrer')) {
	/**
	 * Centre en HTML (Old-style, préférer CSS)
	 *
	 * @removed from SPIP 4.0
	 * @deprecated Utiliser CSS
	 * @uses aligner()
	 * @param string $letexte
	 * @return string
	 */
	function centrer($letexte) {
		return aligner($letexte, 'center');
	}
}

if (!function_exists('style_align')) {
	/**
	 * Retourne un texte de style CSS aligné sur la langue en cours
	 *
	 * @removed from SPIP 4.0
	 * @deprecated
	 * @param mixed $bof Inutilisé
	 * @return string Style CSS
	 **/
	function style_align($bof) {
		return 'text-align: ' . $GLOBALS['spip_lang_left'];
	}
}
