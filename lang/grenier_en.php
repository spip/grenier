<?php
// This is a SPIP language file  --  Ceci est un fichier langue de SPIP
// extrait automatiquement de https://trad.spip.net/tradlang_module/grenier?lang_cible=en
// ** ne pas modifier le fichier **

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

$GLOBALS[$GLOBALS['idx_lang']] = array(

	// B
	'bouton_forum_petition' => 'FORUM & PETITION', # MODIF
	'bouton_radio_sauvegarde_compressee' => 'save as compressed in @fichier@', # MODIF
	'bouton_radio_sauvegarde_non_compressee' => 'save as uncompressed in @fichier@', # MODIF

	// F
	'forum_probleme_database' => 'Database problem, your message could not be recorded.', # MODIF

	// I
	'ical_lien_rss_breves' => 'Syndication of site news items', # MODIF
	'icone_creer_mot_cle_breve' => 'Create a new keyword and attach it to this news item', # MODIF
	'icone_forum_administrateur' => 'Administrators’ forum', # MODIF
	'icone_forum_suivi' => 'Manage forums', # MODIF
	'icone_publier_breve' => 'Publish this news item', # MODIF
	'icone_refuser_breve' => 'Reject this news item', # MODIF
	'info_base_restauration' => 'Restoration of the database in progress.', # MODIF
	'info_breves_03' => 'news items', # MODIF
	'info_breves_liees_mot' => 'News items with this keyword', # MODIF
	'info_breves_touvees' => 'News items found', # MODIF
	'info_breves_touvees_dans_texte' => 'News items found (in the text)', # MODIF
	'info_echange_message' => 'SPIP allows the exchange of messages and the creation of private
  discussion forums for site members. You can enable or
  disable this feature.', # MODIF
	'info_erreur_restauration' => 'Restoration error: file not found.', # MODIF
	'info_forum_administrateur' => 'administrators’ forum', # MODIF
	'info_forum_interne' => 'internal forum', # MODIF
	'info_forum_ouvert' => 'A forum is available to all
  registered editors in the site’s private area. You can enable an
  extra forum reserved for the administrators here.', # MODIF
	'info_gauche_suivi_forum' => 'The <i>forum management</i> page is a site management tool (not a discussion or editing area). It displays all the contributions to the public forum of this article and allows you to manage these contributions.', # MODIF
	'info_modifier_breve' => 'Modify the news item:', # MODIF
	'info_nombre_breves' => '@nb_breves@ news items,', # MODIF
	'info_option_ne_pas_faire_suivre' => 'Do not forward forum messages', # MODIF
	'info_restauration_sauvegarde_insert' => 'Inserting @archive@ in the database',
	'info_sauvegarde_articles' => 'Backup the articles',
	'info_sauvegarde_articles_sites_ref' => 'Backup articles of referenced sites',
	'info_sauvegarde_auteurs' => 'Backup the authors',
	'info_sauvegarde_breves' => 'Backup the news',
	'info_sauvegarde_documents' => 'Backup the documents',
	'info_sauvegarde_echouee' => 'If the backup fails ("Maximum execution time exceeded"),',
	'info_sauvegarde_forums' => 'Backup the forums',
	'info_sauvegarde_groupe_mots' => 'Backup keyword groups',
	'info_sauvegarde_messages' => 'Backup messages',
	'info_sauvegarde_mots_cles' => 'Backup keywords',
	'info_sauvegarde_petitions' => 'Backup petitions',
	'info_sauvegarde_refers' => 'Backup referrers',
	'info_sauvegarde_reussi_01' => 'Backup successful.',
	'info_sauvegarde_rubrique_reussi' => 'The tables of the @titre@ section have been saved to @archive@. You can',
	'info_sauvegarde_rubriques' => 'Backup sections',
	'info_sauvegarde_signatures' => 'Backup petition signatures',
	'info_sauvegarde_sites_references' => 'Backup referenced sites',
	'info_sauvegarde_type_documents' => 'Backup document types',
	'info_sauvegarde_visites' => 'Backup visitor statistics',
	'info_une_breve' => 'a news item,',
	'item_mots_cles_association_breves' => 'news items',
	'item_nouvelle_breve' => 'New news item',

	// L
	'lien_forum_public' => 'Manage the public forum for this article',
	'lien_reponse_breve' => 'Comment on this news item',

	// S
	'sauvegarde_fusionner' => 'Merge current database with the backup',
	'sauvegarde_fusionner_depublier' => 'Unpublish any merged objects',
	'sauvegarde_url_origine' => 'URL of the source site, if required:',

	// T
	'texte_admin_tech_03' => 'You can opt to save the file in compressed format, to
 reduce filesize and allow faster downloading or copying to a backup server.',
	'texte_admin_tech_04' => 'When merginge two databases, you can restrict the backup to one section: ',
	'texte_sauvegarde_compressee' => 'Backup will be stored in the uncompressed file @fichier@.',
	'titre_nouvelle_breve' => 'New news item',
	'titre_page_breves_edit' => 'Modify the news item: «@titre@»',
	'titre_page_forum' => 'Administrators forum',
	'titre_page_forum_envoi' => 'Send a message',
	'titre_page_statistiques_messages_forum' => 'Forum messages',

	// U
	'utf8_convert_attendez' => 'Wait a few seconds and then reload this page.',
	'utf8_convert_avertissement' => 'You are about to convert the contents of your database (articles, news items, etc) from the character set <b>@orig@</b> to the character set <b>@charset@</b>.',
	'utf8_convert_backup' => 'Don’t forget to first make a complete backup of your site. You need also to check that your templates and language files are compatible with @charset@.',
	'utf8_convert_erreur_deja' => 'Your site is already in @charset@, there is no point in converting.',
	'utf8_convert_termine' => 'Finished!',
	'utf8_convert_timeout' => '<b>Important:</b> If the server  indicates <i>timeout</i>, please continue to reload the page until you receive the message «Finished!».',
	'utf8_convert_verifier' => 'You now need to empty the site cache and then check if all is well on the public pages of the site. If you are stuck with a major problem, a backup of your original data (in SQL format) has been made in the @rep@ directory.',
	'utf8_convertir_votre_site' => 'Convert your site to utf-8'
);
