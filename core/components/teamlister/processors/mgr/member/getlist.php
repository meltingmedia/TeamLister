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
 * Get a list of Members
 *
 * @package teamlister
 * @subpackage processors
 */
$isLimit = !empty($_REQUEST['limit']);
$start = $modx->getOption('start',$_REQUEST,0);
$limit = $modx->getOption('limit',$_REQUEST,20);
$sort = $modx->getOption('sort',$_REQUEST,'lastname');
$dir = $modx->getOption('dir',$_REQUEST,'ASC');

$c = $modx->newQuery('TeamMember');
$c->select('TeamMember.*, Section.name');
$c->leftJoin('tmSection','Section');
$count = $modx->getCount('TeamMember',$c);

$c->sortby($sort,$dir);
if ($isLimit) $c->limit($limit,$start);

$members = $modx->getCollection('TeamMember',$c);

$list = array();
foreach ($members as $member) {
    $memberArray = $member->toArray();
    $list[]= $memberArray;
}

return $this->outputArray($list,$count);