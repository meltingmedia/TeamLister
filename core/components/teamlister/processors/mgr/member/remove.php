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
 * Remove a member.
 * 
 * @package teamlister
 * @subpackage processors
 */
// get board
if (empty($scriptProperties['id'])) return $modx->error->failure($modx->lexicon('teamlister.member_err_ns'));
$member = $modx->getObject('TeamMember',$scriptProperties['id']);

if (!$member) return $modx->error->failure($modx->lexicon('teamlister.member_err_nf'));

if ($member->remove() == false) {
    return $modx->error->failure($modx->lexicon('teamlister.member_err_remove'));
}

// output
return $modx->error->success('',$member);