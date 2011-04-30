<?php
// This is a SPIP language file  --  Ceci est un fichier langue de SPIP
// extrait automatiquement de http://www.spip.net/trad-lang/
// ** ne pas modifier le fichier **

if (!defined('_ECRIRE_INC_VERSION')) return;

$GLOBALS[$GLOBALS['idx_lang']] = array(

	// B
	'bouton_radio_sauvegarde_compressee' => 'save as compressed in @fichier@', # NEW
	'bouton_radio_sauvegarde_non_compressee' => 'save as uncompressed in @fichier@', # NEW

	// I
	'info_base_restauration' => 'Tietokannan palautus käynnissä.',
	'info_erreur_restauration' => 'Restoration error: file not found.', # NEW
	'info_restauration_sauvegarde_insert' => 'Inserting @archive@ in the database', # NEW
	'info_sauvegarde_articles' => 'Varmistuskopioi artikkelit',
	'info_sauvegarde_articles_sites_ref' => 'Varmistuskopioi referoitujen  sivustojen artikkelit ',
	'info_sauvegarde_auteurs' => 'Varmistuskopioi kirjoittajat',
	'info_sauvegarde_breves' => 'Varmistuskopioi uutiset',
	'info_sauvegarde_documents' => 'Varmistuskopioi asiakirjat',
	'info_sauvegarde_echouee' => 'Jos varmistuskopionti epäonnistuu  («Pisin suoritusaika ylitetty»),',
	'info_sauvegarde_forums' => 'Varmistuskopioi foorumit',
	'info_sauvegarde_groupe_mots' => 'Varmistuskopioi hakusana-ryhmät',
	'info_sauvegarde_messages' => 'Varmistuskopioi viestit',
	'info_sauvegarde_mots_cles' => 'Varmistuskopioi hakusanat',
	'info_sauvegarde_petitions' => 'Varmistuskopioi vetoomukset',
	'info_sauvegarde_refers' => 'Varmistuskopioi viittaajat',
	'info_sauvegarde_reussi_01' => 'Varmistuskopionti onnistui.',
	'info_sauvegarde_rubrique_reussi' => 'The tables of the @titre@ section have been saved to @archive@. You can', # NEW
	'info_sauvegarde_rubriques' => 'Varmistuskopioi lohkot',
	'info_sauvegarde_signatures' => 'Varmistuskopioi vetoomusten allekirjoitukset',
	'info_sauvegarde_sites_references' => 'Varmistuskopioi viitatut sivustot',
	'info_sauvegarde_type_documents' => 'Varmistuskopioi asiakirjojen lajit',
	'info_sauvegarde_visites' => 'Varmistuskopioi käynnit',

	// S
	'sauvegarde_fusionner' => 'Merge the current database with the backup', # NEW
	'sauvegarde_fusionner_depublier' => 'Unpublish the merged objects', # NEW
	'sauvegarde_url_origine' => 'If necessary, the URL of the source site:', # NEW

	// T
	'texte_admin_tech_03' => 'You can choose to save the file in a compressed form, to 
	speed up its transfer to your machine or to a backup server and save some disk space.', # NEW
	'texte_admin_tech_04' => 'In order to merge with another database, you can restrict the backup to one section: ', # NEW
	'texte_sauvegarde_compressee' => 'Backup will be stored in the uncompressed file @fichier@.' # NEW
);

?>
