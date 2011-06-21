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
 * Properties for the TeamLister snippet.
 *
 * @package teamlister
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'tpl',
        'desc' => 'prop_teamlister.teamlister_tpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'teamlister:properties',
    ),
    array(
        'name' => 'sortBy',
        'desc' => 'prop_teamlister.teamlister_sortby_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '{"menuindex":"ASC","name":"ASC"}',
        'lexicon' => 'teamlister:properties',
    ),
    array(
        'name' => 'sortDir',
        'desc' => 'prop_teamlister.teamlister_sortdir_desc',
        'type' => 'textfield',
        'options' => array(
            array('text' => 'ASC', 'value' => 'ASC'),
            array('text' => 'DESC', 'value' => 'DESC'),
        ),
        'value' => 'ASC',
        'lexicon' => 'teamlister:properties',
    ),
    array(
        'name' => 'limit',
        'desc' => 'prop_teamlister.teamlister_limit_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'teamlister:properties',
    ),
    array(
        'name' => 'toPlaceholder',
        'desc' => 'prop_teamlister.teamlister_toplaceholder_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => false,
        'lexicon' => 'teamlister:properties',
    ),
    array(
        'name' => 'debug',
        'desc' => 'prop_teamlister.teamlister_debug_desc',
        'type' => 'textfield',
        'options' => array(
            array('text' => 'Yes', 'value' => '1'),
            array('text' => 'No', 'value' => ''),
        ),
        'value' => '',
        'lexicon' => 'teamlister:properties',
    ),
    array(
        'name' => 'idx',
        'desc' => 'prop_teamlister.teamlister_idx_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'teamlister:properties',
    ),
    array(
        'name' => 'offset',
        'desc' => 'prop_teamlister.teamlister_offset_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 0,
        'lexicon' => 'teamlister:properties',
    ),
    array(
        'name' => 'totalVar',
        'desc' => 'prop_teamlister.teamlister_totalVar_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'total',
        'lexicon' => 'teamlister:properties',
    ),
    array(
        'name' => 'where',
        'desc' => 'prop_teamlister.teamlister_where_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'teamlister:properties',
    ),
);

return $properties;