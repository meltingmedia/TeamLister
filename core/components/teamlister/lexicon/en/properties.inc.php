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
 * Properties English Lexicon Entries for TeamLister snippets
 *
 * @package teamlister
 * @subpackage lexicon
 */
$_lang['prop_teamlister.teamlister_debug_desc'] = 'Outputs the SQL query to the error log if set to 1.';
$_lang['prop_teamlister.teamlister_idx_desc'] = 'You can define the starting idx of the members, which is a property that is incremented as each member is rendered (default = 1).';
$_lang['prop_teamlister.teamlister_limit_desc'] = 'The number of members to limit per page.';
$_lang['prop_teamlister.teamlister_offset_desc'] = 'An offset of members returned by the criteria to skip.';
//$_lang['prop_teamlister.teamlister_outputseparator_desc'] = 'A string to separate each row with.';
$_lang['prop_teamlister.teamlister_sortby_desc'] = 'Field(s) to sort by (ex. &sortBy=`fieldname` or &sortBy=`{"fieldname":"sort dir","fieldname":"DESC"}`).';
$_lang['prop_teamlister.teamlister_sortdir_desc'] = 'The direction to sort by (ASC or DESC).';
$_lang['prop_teamlister.teamlister_tpl_desc'] = 'The chunk to use for each member.';
$_lang['prop_teamlister.teamlister_toplaceholder_desc'] = 'If set, will output the content to the placeholder specified in this property, rather than outputting the content directly.';
$_lang['prop_teamlister.teamlister_totalVar_desc'] = 'Placeholder name for the "total number of members" (default = total).';
$_lang['prop_teamlister.teamlister_where_desc'] = 'A JSON expression of criteria to build any additional where clauses from, e.g. &where=`{{"name:LIKE":"foo%", "OR:name:LIKE":"%bar"},{"OR:firstname:=":"foobar", "AND:name:=":"raboof"}}`.';
