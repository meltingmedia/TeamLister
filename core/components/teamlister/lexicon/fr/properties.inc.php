<?php
/**
 * TeamLister
 *
 * Copyright 2011 by Romain Tripault // Melting Media <romain@melting-media.com>
 *
 * TeamLister is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * TeamLister is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * TeamLister; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package teamlister
 */
/**
 * Properties French Lexicon Entries for TeamLister snippets
 *
 * @package teamlister
 * @subpackage lexicon
 */
$_lang['prop_teamlister.getteam_debug_desc'] = 'Affiche la requête SQL dans le log d\'erreur.';
$_lang['prop_teamlister.getteam_idx_desc'] = 'You can define the starting idx of the teams, which is a property that is incremented as each team is rendered (default = 1).';
$_lang['prop_teamlister.getteam_limit_desc'] = 'Défini le nombre d\'équipes par page à afficher.';
$_lang['prop_teamlister.getteam_offset_desc'] = 'An offset of teams returned by the criteria to skip.';
//$_lang['prop_teamlister.getteam_outputseparator_desc'] = 'A string to separate each row with.';
$_lang['prop_teamlister.getteam_sortby_desc'] = 'Le(s) champ(s) à utiliser pour déterminer l\'affichage des résultats (ex. &sortBy=`champ` or &sortBy=`{"champ":"sort dir","champ":"DESC"}`).';
$_lang['prop_teamlister.getteam_sortdir_desc'] = 'L\'ordre dans lequel afficher les résultats (ASC ou DESC).';
$_lang['prop_teamlister.getteam_tpl_desc'] = 'Le chunk à utiliser pour chaque équipe.';
$_lang['prop_teamlister.getteam_toplaceholder_desc'] = 'Affiche les résultats dans le placeholder défini au lieu de les afficher directement.';
$_lang['prop_teamlister.getteam_totalVar_desc'] = 'Nom du placeholder pour afficher le "nombre total d\'équipes" (défaut = total).';
$_lang['prop_teamlister.getteam_where_desc'] = 'Critères au format JSON pour ajouter des conditions, ex. &where=`{{"name:LIKE":"foo%", "OR:name:LIKE":"%bar"},{"OR:firstname:=":"foobar", "AND:name:=":"raboof"}}`.';

$_lang['prop_teamlister.teamlister_debug_desc'] = 'Affiche la requête SQL dans le log d\'erreur.';
$_lang['prop_teamlister.teamlister_idx_desc'] = 'You can define the starting idx of the members, which is a property that is incremented as each member is rendered (default = 1).';
$_lang['prop_teamlister.teamlister_limit_desc'] = 'Défini le nombre de membres par page à afficher.';
$_lang['prop_teamlister.teamlister_offset_desc'] = 'An offset of members returned by the criteria to skip.';
//$_lang['prop_teamlister.teamlister_outputseparator_desc'] = 'A string to separate each row with.';
$_lang['prop_teamlister.teamlister_sortby_desc'] = 'Le(s) champ(s) à utiliser pour déterminer l\'affichage des résultats (ex. &sortBy=`champ` or &sortBy=`{"champ":"sort dir","champ":"DESC"}`).';
$_lang['prop_teamlister.teamlister_sortdir_desc'] = 'L\'ordre dans lequel afficher les résultats (ASC ou DESC).';
$_lang['prop_teamlister.teamlister_tpl_desc'] = 'Le chunk à utiliser pour chaque membre.';
$_lang['prop_teamlister.teamlister_toplaceholder_desc'] = 'Affiche les résultats dans le placeholder défini au lieu de les afficher directement.';
$_lang['prop_teamlister.teamlister_totalVar_desc'] = 'Nom du placeholder pour afficher le "nombre total de membres" (défaut = total).';
$_lang['prop_teamlister.teamlister_where_desc'] = 'Critères au format JSON pour ajouter des conditions, ex. &where=`{{"name:LIKE":"foo%", "OR:name:LIKE":"%bar"},{"OR:firstname:=":"foobar", "AND:name:=":"raboof"}}`.';
