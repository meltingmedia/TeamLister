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
 * Add snippets to build
 * 
 * @package teamlister
 * @subpackage build
 */
$snippets = array();

$snippets[0]= $modx->newObject('modSnippet');
$snippets[0]->fromArray(array(
    'id' => 0,
    'name' => 'getTeam',
    'description' => 'Displays teams details.',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.getteam.php'),
),'',true,true);
$properties = include $sources['build'].'properties/properties.getteam.php';
$snippets[0]->setProperties($properties);
unset($properties);

$snippets[1]= $modx->newObject('modSnippet');
$snippets[1]->fromArray(array(
    'id' => 1,
    'name' => 'teamLister',
    'description' => 'Displays members details.',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.teamlister.php'),
),'',true,true);
$properties = include $sources['build'].'properties/properties.teamlister.php';
$snippets[1]->setProperties($properties);
unset($properties);

return $snippets;